<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Validation</title>
    <style>
        #emailerror {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="input-row">
        <label for="email">Email Address:</label>
        <input type="email" id="email" placeholder="Enter Your E-mail Address" onkeyup="showerror()" required>
        <span id="emailerror"></span>
    </div>  

    <script>
        // Email validation function
        function showerror() {
            var emailError = document.getElementById("emailerror"); // Corrected the ID
            var emailField = document.getElementById("email"); // Corrected the ID

            // Regular expression to validate email format
            var emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$/;

            // Check if the email field value matches the pattern
            if (!emailField.value.match(emailPattern)) {
                emailError.innerHTML = "Enter a valid email";
            } else {
                emailError.innerHTML = ""; // Clear error message if valid
            }
        }
    </script>
</body>
</html>
