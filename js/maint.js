function submitForm() {
    // Collect form data
    var firstName = document.getElementById("fname").value;
    var lastName = document.getElementById("lname").value;
    var problemType = document.getElementById("problem").value;
    var machineType = document.getElementById("machine").value;
    var description = document.getElementById("txt").value;
    var evidenceFile = document.getElementById("evidence").files[0]; // Get the first selected file

    // Create FormData object to send form data through AJAX
    var formData = {
        firstName: firstName,
        lastName: lastName,
        problemType: problemType,
        machineType: machineType,
        description: description,
        evidenceFile: evidenceFile
    };

    console.log(formData);

    // Create XMLHttpRequest object
    const formalRequest = new XMLHttpRequest();
    formalRequest.open('POST', '../Backend/maintenance_request.php', true);

    // Set up onload and onerror handlers
    formalRequest.onload = function () {
        if (formalRequest.status === 200) {
            let formResponse = formalRequest.responseText;
            if (formResponse.includes("success")) {
                document.getElementById('requestForm').style.display = 'none';
                document.getElementById('confirmationMessage').style.display = 'block';
            } else {
                console.log(formResponse);
                alert("Request not submitted");
            }
        } else {
            alert("Error occurred: " + formalRequest.status);
        }
    };

    formalRequest.onerror = function () {
        alert("Request failed");
    };

    // Send the FormData object
    formalRequest.send(formData);
}