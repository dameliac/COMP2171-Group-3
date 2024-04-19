


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
               popup.document.write('<!DOCTYPE html><html><head><link rel="stylesheet" type="text/css" href="../css/viewprofile.css"><title>Update Profile</title></head><body>' + xhr.responseText + '<script src="../js/profile.js"></script></body></html>');
                //document.getElementById("dynamic").innerHTML =  xhr.responseText;
           }
       };
       xhr.send();
   });

}


function Save(){
    var save =document.querySelector(".save");
        save.addEventListener("click", function() {
          
             // Collect form data
             var id = document.getElementById("input-username").value;
             var email = document.getElementById("input-email").value;
             var firstName = document.getElementById("input-first-name").value;
             var middleName = document.getElementById("input-middle-name").value;
             var lastName = document.getElementById("input-last-name").value;
             var dob = document.getElementById("input-date-birth").value;
             var gender = document.getElementById("input-gender").value;
             var primary = document.getElementById("input-postal-code").value;
             var secondary = document.getElementById("input-postal-code-2").value;
             var hall = document.getElementById("input-city").value;
             var block = document.getElementById("input-country").value;
             var apt = document.getElementById("input-apt").value;
             var about = document.getElementById("about").value;

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
                    console.log(formalRequest.responseText);
                    alert("Form Submitted");
                } else {
                    console.log(formalRequest.responseText);
                    alert("ERROR: Form submission failed. Please try again.");
                }
            };

            formalRequest.onerror = function () {
                alert("Request failed");
            };

            // Send the FormData object
            console.log(id,email,firstName,middleName,lastName,dob,gender,primary,secondary,hall,block,apt,about);
          
                console.log(formData);
           

            formalRequest.send(formData);
           

            
          
        });
    }