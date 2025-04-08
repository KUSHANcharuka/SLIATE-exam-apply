           // navigation bar profile menu dropdown
           let submenu = document.getElementById("sub-menu-wrap");

           function togglemenu() {
           submenu.classList.toggle("open-class");
           }

                // Function to set the current date and time
    window.onload = function() {
        const currentDate = new Date();

        // Set the current date in YYYY-MM-DD format
        const dateField = document.getElementById('issued_Date');
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const day = String(currentDate.getDate()).padStart(2, '0');
        dateField.value = `${year}-${month}-${day}`;

        // Set the current time in HH:MM format
        const timeField = document.getElementById('issued_time');
        const hours = String(currentDate.getHours()).padStart(2, '0');
        const minutes = String(currentDate.getMinutes()).padStart(2, '0');
        timeField.value = `${hours}:${minutes}`;
    };