document.addEventListener('DOMContentLoaded', function() {
  
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
        if (validateForm()) {
            showMessage("Your post has been submitted!");
            document.querySelector("form").submit(); // Submit the form
        }
    });
    
});


