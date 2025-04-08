function validatePasswords() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const passwordError = document.getElementById('passwordError');

    // Regular expression for high-security password
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;

    // Clear previous error message
    passwordError.textContent = "";

    // Check if the password meets security requirements
    if (!passwordRegex.test(password)) {
        passwordError.textContent =
            "Password must be at least 8 characters long, contain uppercase, lowercase, a number, and a special character.";
        return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        passwordError.textContent = "Passwords do not match!";
        return;
    }
}

//validate form before submitting
function validateForm() { 
validatePasswords(); 

if (document.getElementById("passwordError").innerHTML !== "") {
    return false; // Stop form submission if errors have
}

return true; // Submit form - no errors
}
       
          

    //  auto-populating the date and time
    const now = new Date();
    document.getElementById('issued_Date').value = now.toISOString().split('T')[0]; // Set today's date
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    document.getElementById('issued_time').value = `${hours}:${minutes}`; // Set current time