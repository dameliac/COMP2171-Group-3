


function Update(){
    const updateProfile = document.querySelector('.btn.btn-info');
    updateProfile.addEventListener("click", function() {
        // Make an AJAX request
       var xhr = new XMLHttpRequest();
       xhr.open("GET", "../Backend/updateprofile.php", true);
       xhr.onreadystatechange = function() {
           if (xhr.readyState == 4 && xhr.status == 200) {
               // If request is successful, display response in a popup
               var popup = window.open("", "Update Profile", "width=max-content,height=max-content");
              popup.document.write('<html><head><script src = "../js/profile.js"></script><link rel="stylesheet" type="text/css" href="../css/viewprofile.css"><title>Update Profile</title></head><body>' + xhr.responseText + '</body></html>');
           }
       };
       xhr.send();
   });

}


function Save(){
    var save =document.getElementsByClassName("save");
    for (var i = 0; i < save.length; i++) {
        save[i].addEventListener("click", function() {
          
             // Collect form data
             var id = document.getElementById("input-username");
             var email = document.getElementById("input-email");
             var firstName = document.getElementById("input-first-name");
             var middleName = document.getElementById("input-middle-name");
             var lastName = document.getElementById("input-last-name");
             var dob = document.getElementById("input-date-birth");
             var gender = document.getElementById("input-gender");
             var primary = document.getElementById("input-postal-code");
             var secondary = document.getElementById("input-postal-code-2");
             var hall = document.getElementById("input-city");
             var block = document.getElementById("input-country");
             var apt = document.getElementById("input-apt");
             var about = document.getElementById("about");

            // Create a FormData object
            var formData = new FormData();
            formData.append('fname', firstName);
            formData.append('mname', middleName);
            formData.append('lname', lastName);
            formData.append('id', id);
            formData.append('email', email);
            formData.append('dob', dob);  
            formData.append('gender', gender);
            formData.append('primary', primary);
            formData.append('secondary', secondary);
            formData.append('hall', hall);
            formData.append('block', block);
            formData.append('apt', apt);
            formData.append('about', about);

            // Create XMLHttpRequest object
            const formalRequest = new XMLHttpRequest();
            formalRequest.open('POST', '../Backend/updateprofile.php', true);

            // Set up onload and onerror handlers
            formalRequest.onload = function () {
                if (formalRequest.status == 200) {
                    alert("Form Submitted");
                } else {
                    alert("ERROR: Form submission failed. Please try again.");
                }
            };

            formalRequest.onerror = function () {
                alert("Request failed");
            };

            // Send the FormData object
            formalRequest.send(formData);

            var forms = document.getElementsByClassName("allforms");
            var fields = forms.elements;
            for (var i = 0; i < fields.length; i++) {
            fields[i].value="";
            }
              // Close the popup window
            window.close();
        });
    }
}