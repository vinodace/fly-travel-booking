<?php
// Replace with your Amadeus credentials
$client_id = "IMewQoGGzsLuxu2vR2r9ImKFeRVNbf4m";
$client_secret = "bLW0u8zhqigZYcaC";

// Get token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.com/v1/security/oauth2/token");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    "grant_type" => "client_credentials",
    "client_id" => $client_id,
    "client_secret" => $client_secret
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$auth = json_decode($response, true);

if (!isset($auth['access_token'])) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "Failed to get access token", "details" => $auth]);
    exit;
}

$access_token = $auth['access_token'];

// Get flight offers
$origin = $_GET['origin'] ?? "DEL";
$destination = $_GET['destination'] ?? "LHR";
$date = $_GET['date'] ?? "2025-09-10";
$adults = $_GET['adults'] ?? 1;

$url = "https://test.api.amadeus.com/v2/shopping/flight-offers?"
     . "originLocationCode=$origin"
     . "&destinationLocationCode=$destination"
     . "&departureDate=$date"
     . "&adults=$adults";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $access_token"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$offersResponse = curl_exec($ch);
curl_close($ch);

$offers = json_decode($offersResponse, true);

// If Amadeus returned an error, pass it back
if (isset($offers['errors'])) {
    header("Content-Type: application/json");
    echo json_encode($offers);
    exit;
}

// Safety check
if (!isset($offers['data']) || empty($offers['data'])) {
    header("Content-Type: application/json");
    echo json_encode(["data" => []]); // always return a data array
    exit;
}

// Collect carrier codes
$carrierCodes = [];
foreach ($offers['data'] as $offer) {
    foreach ($offer['itineraries'][0]['segments'] as $seg) {
        $carrierCodes[$seg['carrierCode']] = true;
    }
}
$carrierList = implode(",", array_keys($carrierCodes));

// Fetch airline names
$airlinesUrl = "https://test.api.amadeus.com/v1/reference-data/airlines?airlineCodes=$carrierList";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $airlinesUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $access_token"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$airlinesResponse = curl_exec($ch);
curl_close($ch);

$airlines = json_decode($airlinesResponse, true);
$airlineMap = [];
if (isset($airlines['data'])) {
    foreach ($airlines['data'] as $a) {
        $airlineMap[$a['iataCode']] = $a['commonName'] ?? $a['businessName'] ?? $a['iataCode'];
    }
}

// Attach airline names into offers
foreach ($offers['data'] as &$offer) {
    foreach ($offer['itineraries'][0]['segments'] as &$seg) {
        $seg['airlineName'] = $airlineMap[$seg['carrierCode']] ?? $seg['carrierCode'];
    }
}

// Return modified response
header("Content-Type: application/json");
echo json_encode($offers);

?>