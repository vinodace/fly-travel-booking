<?php
session_start();

// Helper: Currency Symbols
function getCurrencySymbol($currency) {
    $symbols = [
        "USD" => "$", "EUR" => "€", "GBP" => "£", "INR" => "₹",
        "AED" => "د.إ", "JPY" => "¥", "CNY" => "¥", "CAD" => "C$",
        "AUD" => "A$", "CHF" => "CHF",
    ];
    return $symbols[$currency] ?? $currency;
}

// 1) Validate offerId
$offerId = $_GET['offerId'] ?? null;
if (!$offerId) {
    http_response_code(400);
    die('<div class="alert alert-danger">Missing offerId. Please go back and select a flight.</div>');
}

// 2) Fetch selected offer from session
$selectedOffer = $_SESSION['flights'][$offerId] ?? null;
if (!$selectedOffer) {
    http_response_code(410);
    die('<div class="alert alert-danger">Selected flight not found (session expired). Please search again.</div>');
}

// 3) Get dictionaries
$dictionaries = $_SESSION['dictionaries'] ?? [];

// 4) Passenger counts from GET or default
$adults   = isset($_GET['adults']) ? (int)$_GET['adults'] : 1;
$children = isset($_GET['children']) ? (int)$_GET['children'] : 0;
$infants  = isset($_GET['infants']) ? (int)$_GET['infants'] : 0;
$travel_class = strtoupper($_GET['travel_class'] ?? 'Economy');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Passenger Details</title>
    <?php include("header.php"); ?>
</head>

<body>
<section class="flight-result_bg_web2 pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <!-- Flight Card -->
          <div class="flight-result_box_web2 mb-3 p-3 border rounded">
            <div class="row">
              <div class="col-md-9">
                <?php foreach ($selectedOffer["itineraries"] as $itinIndex => $itinerary): ?>
                  <?php
                    $segments = $itinerary["segments"];
                    $firstSeg = $segments[0];
                    $lastSeg  = end($segments);

                    $depTime = date("h:i A", strtotime($firstSeg["departure"]["at"]));
                    $arrTime = date("h:i A", strtotime($lastSeg["arrival"]["at"]));
                    $depAirport = $firstSeg["departure"]["iataCode"];
                    $arrAirport = $lastSeg["arrival"]["iataCode"];

                    $durationMin = round((strtotime($lastSeg["arrival"]["at"]) - strtotime($firstSeg["departure"]["at"])) / 60);
                    $hrs = floor($durationMin / 60);
                    $mins = $durationMin % 60;
                    $duration = "{$hrs}h {$mins}m";

                    $airlineCode = $firstSeg["carrierCode"];
                    $airlineName = $_SESSION['flights']['dictionaries']['carriers'][$airlineCode] ?? $airlineCode;
                    $logoUrl = "https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/" . strtolower($airlineCode) . ".webp";

                    $stops = count($segments) - 1;
                  ?>
                  <div class="row align-items-center mb-3">
                    <div class="col-md-3">
                      <div class="d-flex align-items-center gap-3 mb-2 mb-md-0">
                        <img src="<?= $logoUrl ?>" width="50" alt="<?= $airlineCode ?>">
                        <p class="flight-logo_name_web2"><?= ucwords(strtolower($airlineName)) ?></p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row text-center">
                        <div class="col-4">
                          <h5 class="flight-time_web2"><?= $depTime ?></h5>
                          <p class="flight-location_web2"><?= $depAirport ?></p>
                        </div>
                        <div class="col-4">
                          <div class="flight-result_duration_web2">
                            <?= $duration ?>
                            <div class="flight-duration_line_web2"></div>
                            <?php if ($stops > 0): ?>
                              <small class="text-muted"><?= $stops ?> Stop<?= $stops > 1 ? "s" : "" ?></small>
                            <?php else: ?>
                              <small class="text-muted">Non-stop</small>
                            <?php endif; ?>
                          </div>    
                        </div>
                        <div class="col-4">
                          <h5 class="flight-time_web2"><?= $arrTime ?></h5>
                          <p class="flight-location_web2"><?= $arrAirport ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php if (count($selectedOffer["itineraries"]) > 1 && $itinIndex == 0): ?>
                    <hr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>

              <div class="col-md-3 d-lg-flex flex-column justify-content-center text-center">
                <div>
                  <span class="flight-price_web2">
                    <?= getCurrencySymbol($selectedOffer["price"]["currency"]) . " " . $selectedOffer["price"]["total"] ?>
                  </span>
                  <p class="wrap_prgh_web2 text-muted"><?= ucfirst($selectedOffer["type"]) ?> Ticket</p>
                </div>
              </div>
            </div>
          </div>

      </div>
      <div class="col-sm-12">
        <form action="confirm-booking.php" method="post">
            <input type="hidden" name="offerId" value="<?= htmlspecialchars($offerId) ?>">
            <input type="hidden" name="adults" id="adults" value="<?= $adults ?>">
            <input type="hidden" name="children" id="children" value="<?= $children ?>">
            <input type="hidden" name="infants" id="infants" value="<?= $infants ?>">
            <input type="hidden" name="travel_class" id="cabin_class" value="<?= $travel_class ?>">

          <!-- Passenger Info -->
          <div class="flight-result_box_web2">
              <h1 class="wrap_subhding_web2 pb-4">Passenger Information</h1>
              <p class="note"><strong>Important</strong>: Each passenger's full name must be entered as it appears on their passport or government ID.</p>

                <div  id="traveller-table">
                      <?php 
                        // Adults
                        for ($i = 1; $i <= $adults; $i++): ?>
                        <div class="row align-items-center">
                          <div class="col-12 col-sm-12 col-md col-lg-2 mb-2"><strong>Adult <?= $i ?></strong></div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">First Name<span class="red">*</span></label>
                              <input type="text" name="first-name[]" class="form_field_web2 alphabet" placeholder="eg.John" required>
                              <div class="errmsg"></div>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">Last Name</label>
                              <input type="text" name="last-name[]" class="form_field_web2 alphabet" placeholder="eg.Williams" >
                              <div class="errmsg"></div>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">Gender<span class="red">*</span></label>
                              <select name="gender[]" class="form_field_web2">
                                  <option>Male</option>
                                  <option>Female</option>
                              </select>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">DOB<span class="red">*</span></label>
                              <input type="text" name="dob[]" class="form_field_web2 dob_datepicker" placeholder="Select Date" required>
                              <input type="hidden" name="age[]" class="age_hidden">
                          </div>

                          <!-- <div class="col-6 col-sm-2 col-md-auto mb-2">
                            <button class="remove-traveller_tr_web2" style="visibility: hidden;"><i class="fa-solid fa-minus"></i></button>    
                          </div> -->
                        </div>  
                      <?php endfor; ?>  

                      <!-- Children -->
                      <?php for ($i = 1; $i <= $children; $i++): ?>
                        <div class="row align-items-center">
                          <div class="col-12 col-sm-12 col-md col-lg-2 mb-2"><strong>Child <?= $i ?></strong></div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">First Name<span class="red">*</span></label>
                              <input type="text" name="first-name[]" class="form_field_web2 alphabet" required>
                              <div class="errmsg"></div>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">Last Name</label>
                              <input type="text" name="last-name[]" class="form_field_web2 alphabet">
                              <div class="errmsg"></div>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">Gender<span class="red">*</span></label>
                              <select name="gender[]" class="form_field_web2">
                                  <option>Male</option>
                                  <option>Female</option>
                              </select>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">DOB<span class="red">*</span></label>
                              <input type="text" name="dob[]" class="form_field_web2 dob_datepicker" required>
                          </div>
                        </div>  
                      <?php endfor; ?>

                      <!-- Infants -->
                      <?php for ($i = 1; $i <= $infants; $i++): ?>
                        <div class="row align-items-center">
                          <div class="col-12 col-sm-12 col-md col-lg-2 mb-2"><strong>Infant <?= $i ?></strong></div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">First Name<span class="red">*</span></label>
                              <input type="text" name="first-name[]" class="form_field_web2 alphabet" required>
                              <div class="errmsg"></div>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">Last Name</label>
                              <input type="text" name="last-name[]" class="form_field_web2 alphabet">
                              <div class="errmsg"></div>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">Gender<span class="red">*</span></label>
                              <select name="gender[]" class="form_field_web2">
                                  <option>Male</option>
                                  <option>Female</option>
                              </select>
                          </div>
                          <div class="col-6 col-sm-2 col-md mb-2">
                              <label class="traveller-form_lbl_web2">DOB<span class="red">*</span></label>
                              <input type="text" name="dob[]" class="form_field_web2 dob_datepicker" required>
                          </div>
                        </div>  
                      <?php endfor; ?>

                </div>
                <!-- <div class="d-flex justify-content-end">
                  <button type="button" class="add-traveller_btn_web2">
                    <i class="fa-solid fa-plus"></i>
                  </button>
                </div> -->
          </div>

          <!-- Billing Info -->
          <div class="flight-result_box_web2">
              <h1 class="wrap_subhding_web2 pb-4">Billing Information</h1>
              <div class="row">
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                      <label class="traveller-form_lbl_web2">Address 1<span class="red">*</span></label><input type="text" name="address1" class="form_field_web2" required>
                    </div>  
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                      <label class="traveller-form_lbl_web2">Address 2</label><input type="text" name="address2" class="form_field_web2">
                    </div>  
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                      <label class="traveller-form_lbl_web2">Country<span class="red">*</span></label>
                      <input type="text" name="country" class="form_field_web2 alphabet" required>
                      <div class="errmsg"></div>
                    </div>  
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                      <label class="traveller-form_lbl_web2">State<span class="red">*</span></label>
                      <input type="text" name="state" class="form_field_web2 alphabet" required>
                      <div class="errmsg"></div>
                    </div>  
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                      <label class="traveller-form_lbl_web2">City<span class="red">*</span></label>
                      <input type="text" name="city" class="form_field_web2 alphabet" required>
                      <div class="errmsg"></div>
                    </div>  
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                      <label class="traveller-form_lbl_web2">Zip Code<span class="red">*</span></label>
                      <input type="text" name="zip" maxlength="6" inputmode="numeric" class="form_field_web2 number" required>
                      <div class="errmsg"></div>
                    </div>  
                  </div>
              </div>
          </div>

          <!-- Contact Info -->
          <div class="flight-result_box_web2">
              <h1 class="wrap_subhding_web2 pb-4">Contact Information</h1>
              <div class="row">
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label class="traveller-form_lbl_web2">Phone<span class="red">*</span></label><input type="text" name="phone" maxlength="10" inputmode="numeric" class="form_field_web2 number" required>
                        <div class="errmsg"></div>
                    </div>
                  </div>   
                  <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label class="traveller-form_lbl_web2">Email<span class="red">*</span></label><input type="email" name="email" class="form_field_web2" required>
                    </div>
                  </div>  
              </div>
          </div>

          <div class="text-center mt-3">
              <button type="submit" class="wrap-comman-btn bg-success border-success">Proceed to Confirmation</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
const counts = {
    adult: <?= $adults ?>,
    child: <?= $children ?>,
    infant: <?= $infants ?>
};

// Update hidden inputs and display
function updateDisplay() {
    const total = counts.adult + counts.child + counts.infant;
    const travelClass = document.getElementById('travelClass')?.value || 'ECONOMY';

    document.getElementById('adults').value = counts.adult;
    document.getElementById('children').value = counts.child;
    document.getElementById('infants').value = counts.infant;
    document.getElementById('cabin_class').value = travelClass;

    const displayBox = document.getElementById('passengerClassDisplay');
    if(displayBox) {
        displayBox.textContent = `${total} Passenger${total>1?'s':''} - ${travelClass}`;
    }
}

// Increment/decrement passenger counts
function changeCount(type, delta) {
    if(counts[type]+delta >=0){
        counts[type]+=delta;
        const counter = document.getElementById(type+'Count');
        if(counter) counter.textContent = counts[type];
        updateDisplay();
    }
}

// Initialize
updateDisplay();

// DOB picker
$(function(){
    $(".dob_datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "-90:+0"
    });
});
</script>
</body>
</html>
