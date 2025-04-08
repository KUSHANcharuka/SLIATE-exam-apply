

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Your Password</title>
   
     <!-- bootstrap link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dst/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="../style.css">

</head>
<body>

<div class="container">
        <div class="form-box">
            <div class="icon-container">
                <img src="../Images/padlock.png" alt="Lock Icon">
            </div>
            <h2>Forgot Your Password?</h2>
            <form action="send-password-reset.php" method="post">
                <label for="email">Enter Your Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your Email" required>
                <div class="button-container">
                     <button type="button" onclick="window.location.href='admin_login.php'" class="button" id="fg_pw_back_btn">Back</button>
                     <button type="submit" class="button" id="fg_pw_continue_btn">Continue</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>






