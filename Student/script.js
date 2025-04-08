const subjectsDropdown = document.getElementById("Subjects");
const selectedSubjectsList = document.getElementById("selected-subjects");

subjectsDropdown.addEventListener("change", function () {
    const selectedValue = this.value;
    const selectedText = this.options[this.selectedIndex].text;

    const existingSubjects = Array.from(selectedSubjectsList.children).map(item => item.querySelector("span").textContent);
    if (existingSubjects.includes(selectedText)) {
        alert("This subject is already selected!");
        return;
    }

    // Add Subject (AJAX)
    const data = {
        registration_number: document.getElementById("reg_number").value,
        subject: selectedValue,
        action: "add"
    };

    fetch("update_subjects.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    }).then(response => response.text())
      .then(data => console.log(data));

    // Update UI
    const listItem = document.createElement("li");
    listItem.className = "list-group-item d-flex justify-content-between align-items-center";

    const subjectName = document.createElement("span");
    subjectName.textContent = selectedText;

    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.className = "btn btn-danger btn-sm";
    removeButton.addEventListener("click", function () {
        selectedSubjectsList.removeChild(listItem);

        // Remove Subject (AJAX)
        const removeData = { ...data, action: "remove" };
        fetch("update_subjects.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(removeData)
        }).then(response => response.text())
          .then(data => console.log(data));
    });

    listItem.appendChild(subjectName);
    listItem.appendChild(removeButton);
    selectedSubjectsList.appendChild(listItem);
});



                   // email validation
                   function showerror() {
                    var emailError = document.getElementById("emailError");
                    var emailField = document.getElementById("emailField");
        
                    // Regular expression to validate email format
                   var emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
        
                    // Check if the email field value matches the pattern
                    if (!emailField.value.match(emailPattern)) {
                        emailError.innerHTML = "Enter a valid email";
                    } else {
                        emailError.innerHTML = ""; // Clear error message if valid
                    }
                }
        
                // Password validation
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
                showerror(); 
                validatePasswords(); 
        
                if (document.getElementById("emailError").innerHTML !== "" || document.getElementById("passwordError").innerHTML !== "") {
                    return false; // Stop form submission if errors have
                }
        
                return true; // Submit form - no errors
                }

                // navigation bar profile menu dropdown
                let submenu = document.getElementById("sub-menu-wrap");

                function togglemenu() {
                submenu.classList.toggle("open-class");
                }

                

        // //applying subject selecting 
        // const subjectsDropdown = document.getElementById("Subjects");
        // const selectedSubjectsList = document.getElementById("selected-subjects");

        // // Event listener for adding a subject
        // subjectsDropdown.addEventListener("change", function () {
        //     const selectedValue = this.value;
        //     const selectedText = this.options[this.selectedIndex].text;

        //     // Check if the subject is already in the list
        //     const existingSubjects = Array.from(selectedSubjectsList.children).map(item => item.querySelector('span').textContent);
        //     if (existingSubjects.includes(selectedText)) {
        //         alert("This subject is already selected!");
        //         return;
        //     }

        //     // Create a new list item
        //     const listItem = document.createElement("li");

        //     // Add subject name
        //     const subjectName = document.createElement("span");
        //     subjectName.textContent = selectedText;

        //     // Add a remove button
        //     const removeButton = document.createElement("button");
        //     removeButton.textContent = "Remove";
        //     removeButton.addEventListener("click", function () {
        //         selectedSubjectsList.removeChild(listItem);
        //     });

        //     // Append subject name and button to the list item
        //     listItem.appendChild(subjectName);
        //     listItem.appendChild(removeButton);

        //     // Append the list item to the selected subjects list
        //     selectedSubjectsList.appendChild(listItem);
        // });



        
       

        // Validate function for password reset page
                        //validate form before submitting
                        function validatethisForm(){
                            validatePasswords(); 
                    
                            if (document.getElementById("passwordError").innerHTML !== "") {
                                return false; // Stop form submission if errors have
                            }
                    
                            return true; // Submit form - no errors
                            }

        