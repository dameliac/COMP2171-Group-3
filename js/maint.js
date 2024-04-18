function submitForm() {
    // Collect form data
    var firstName = encodeURIComponent(document.getElementById("fname").value);
    var lastName = encodeURIComponent(document.getElementById("lname").value);
    var problemType = encodeURIComponent(document.getElementById("problem").value);
    var machineType = encodeURIComponent(document.getElementById("machine").value);
    var description = encodeURIComponent(document.getElementById("txt").value);
    var evidenceFile = document.getElementById("evidence").files[0]; // Get the first selected file

    // Create a FormData object
    var formData = new FormData();
    formData.append('fname', firstName);
    formData.append('lname', lastName);
    formData.append('problem', problemType);
    formData.append('machine', machineType);
    formData.append('txt', description);
    formData.append('evidence', evidenceFile);

    // Create XMLHttpRequest object
    const formalRequest = new XMLHttpRequest();
    formalRequest.open('POST', '../Backend/maintenance_request.php', true);

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
    console.log(formData);
    // Send the FormData object
    formalRequest.send(formData);
    

    var forms = document.getElementsByClassName("allforms");
    var fields = forms.elements;
    for (var i = 0; i < fields.length; i++) {
    fields[i].value="";
    }
}
