<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secret = "0x4AAAAAAB2DebivXWiOTHl1NKf69bj2azk";
    $token  = $_POST["cf-turnstile-response"] ?? "";

    $verify = file_get_contents("https://challenges.cloudflare.com/turnstile/v0/siteverify", false, stream_context_create([
        "http" => [
            "method"  => "POST",
            "header"  => "Content-type: application/x-www-form-urlencoded\r\n",
            "content" => http_build_query([
                "secret" => $secret,
                "response" => $token,
                "remoteip" => $_SERVER['REMOTE_ADDR']
            ])
        ]
    ]));

    $result = json_decode($verify, true);

    if ($result["success"]) {
        echo "✅ Human verified. Form submitted successfully!";
        // process form...
    } else {
        echo "❌ CAPTCHA failed. Please try again.";
    }
}
