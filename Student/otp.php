<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dst/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style5.css">
</head>
<body>

    <div class="container">
        <h2>OTP Verification</h2>
        <p>Enter OTP code sent to <span id="email">a*****@gmail.com</span></p>
        
        <!-- OTP Input Fields -->
        <div class="otp-input">
            <input type="text" id="otp1" maxlength="1" oninput="moveFocus(this, 'otp2')">
            <input type="text" id="otp2" maxlength="1" oninput="moveFocus(this, 'otp3')">
            <input type="text" id="otp3" maxlength="1" oninput="moveFocus(this, 'otp4')">
            <input type="text" id="otp4" maxlength="1">
        </div>

        <!-- Resend OTP Code Link -->
        <p class="resend">
            Didn't receive OTP Code? <a href="#" onclick="resendOtp()">Resend Code</a>
        </p>

        <!-- Verify OTP Button -->
        <button onclick="verifyOtp()">Verify</button>
    </div>

    <!-- JavaScript file -->
    <script src="script.js"></script>

</body>
</html>
