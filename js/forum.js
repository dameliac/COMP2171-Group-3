document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('btn');
    var popup = document.getElementById('popup');
    var backdrop = document.getElementById('backdrop');
    var goback = document.getElementById('btn1');

    btn.addEventListener('click', function () {
        popup.style.display = 'block';
        backdrop.style.display = 'block';
    });

    // Close pop-up when backdrop is clicked
    backdrop.addEventListener('click', function () {
        popup.style.display = 'none';
        backdrop.style.display = 'none';
    });
    goback.addEventListener('click', function () {
        popup.style.display = 'none';
        backdrop.style.display = 'none';
    });

    function showMessage(message) {
        alert(message);
    }

    window.Bold = function() {
        var fontWeight = document.getElementById("message").style.fontWeight;
        if (fontWeight === 'normal' || fontWeight === '') {
            document.getElementById("message").style.fontWeight = 'bold';
        } else {
            document.getElementById("message").style.fontWeight = 'normal';
        }
    }

    window.makeItalic = function() {
        var fontStyle = document.getElementById("message").style.fontStyle;
        if (fontStyle === 'italic') {
            document.getElementById("message").style.fontStyle = 'normal';
        } else {
            document.getElementById("message").style.fontStyle = 'italic';
        }
    }
     
    window.makeUnderline = function() {
        var textDecoration = document.getElementById("message").style.textDecoration;
        if (textDecoration === 'none' || textDecoration === '') {
            document.getElementById("message").style.textDecoration = 'underline';
        } else {
            document.getElementById("message").style.textDecoration = 'none';
        }
    }


    
    function clearAll() {
        document.getElementById("title").value = ""; // Clear the title input field
        document.getElementById("highPriority").checked = false; // Uncheck the checkbox
        document.getElementById("message").value = ""; // Clear the message text area
    }

    function validateForm() {
        // Check if the title and message fields are empty
        var title = document.getElementById("title").value.trim();
        var message = document.getElementById("message").value.trim();
        if (title === "") {
            showMessage("Please enter a subject.");
            return false;
        } else if (message === "") {
            showMessage("Please enter a message.");
            return false;
        }
        return true;
    }
    
    
    document.getElementById("btn2").addEventListener("click", clearAll);
    document.getElementById("boldBtn").addEventListener("click", Bold);
    document.getElementById("italicBtn").addEventListener("click", makeItalic);
    document.getElementById("underlineBtn").addEventListener("click", makeUnderline);

    document.getElementById("btn3").addEventListener("click", function() {
        event.preventDefault();
        if (validateForm()) {
            var confirmation = confirm("Would you like to proceed with posting this message?");
            document.querySelector("form").submit(); // Submit the form
            if (confirmation) {
                showMessage("Your post has been successfully submitted!");
                // Add your post submission logic here
                document.querySelector("form").submit(); // Submit the form
            }
        }
    });
});
