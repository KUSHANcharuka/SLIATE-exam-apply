           // navigation bar profile menu dropdown
           let submenu = document.getElementById("sub-menu-wrap");

           function togglemenu() {
           submenu.classList.toggle("open-class");
           }

            //Created time table showing function
        function addToTimetable() {
            const date = document.getElementById('date').value;
            const division = document.getElementById('division').value;
            const subject = document.getElementById('subject').value;
            const startTime = document.getElementById('start-time').value;
            const endTime = document.getElementById('end-time').value;
   
            if (!date || !division || !subject || !startTime || !endTime) {
           alert('Please fill in all fields!');
           return;
            }
   
            const timetable = document.getElementById('timetable');
            const entry = document.createElement('div');
          entry.className = 'timetable-entry';
          entry.innerHTML = `
           <strong>Date:</strong> ${date} | 
           <strong>Division:</strong> ${division} | 
           <strong>Subject:</strong> ${subject} | 
           <strong>Time:</strong> ${startTime} - ${endTime}
       `;
       timetable.appendChild(entry);
   
       // Clear inputs
       document.getElementById('date').value = '';
       document.getElementById('division').value = '';
       document.getElementById('subject').value = '';
       document.getElementById('start-time').value = '';
       document.getElementById('end-time').value = '';
   }
   
   
   //to print the time table
   function printTimetable() {
       // Create a new window for the print preview
       const timetableContent = document.getElementById("timetable").innerHTML;
       const printWindow = window.open("", "_blank");
       
       // Add content to the new window
       printWindow.document.write(`
           <html>
               <head>
                   <title>Print Timetable</title>
                   <style>
                       body {
                           font-family: Arial, sans-serif;
                           margin: 20px;
                           padding: 0;
                       }
                       h2 {
                           text-align: center;
                           margin-bottom: 20px;
                       }
                       .timetable-entry {
                           margin-bottom: 15px;
                           border-bottom: 1px solid #ccc;
                           padding-bottom: 10px;
                       }
                   </style>
               </head>
               <body>
                   ${timetableContent}
               </body>
           </html>
       `);
   
       // Print the content
       printWindow.document.close();
       printWindow.print();
   }

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

