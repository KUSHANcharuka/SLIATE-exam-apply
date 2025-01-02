

// Current Year In the Heading
document.getElementById("currentYear").textContent = new Date().getFullYear();

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

        const subjectsDropdown = document.getElementById("Subjects");
        const selectedSubjectsList = document.getElementById("selected-subjects");

        // Event listener for adding a subject
        subjectsDropdown.addEventListener("change", function () {
            const selectedValue = this.value;
            const selectedText = this.options[this.selectedIndex].text;

            // Check if the subject is already in the list
            const existingSubjects = Array.from(selectedSubjectsList.children).map(item => item.querySelector('span').textContent);
            if (existingSubjects.includes(selectedText)) {
                alert("This subject is already selected!");
                return;
            }

            // Create a new list item
            const listItem = document.createElement("li");

            // Add subject name
            const subjectName = document.createElement("span");
            subjectName.textContent = selectedText;

            // Add a remove button
            const removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.addEventListener("click", function () {
                selectedSubjectsList.removeChild(listItem);
            });

            // Append subject name and button to the list item
            listItem.appendChild(subjectName);
            listItem.appendChild(removeButton);

            // Append the list item to the selected subjects list
            selectedSubjectsList.appendChild(listItem);
        });