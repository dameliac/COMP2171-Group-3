function submitForm() {
    // Collect form data
    const firstName = document.getElementById('fname').value;
    const lastName = document.getElementById('lname').value;
    const problemType = document.getElementById('problem').value;
    const machineType = document.getElementById('machine').value;
    const issueDescription = document.getElementById('description').value;
    const imageFile = document.getElementById('evidence').files[0]; // Get the first selected file

    // Create FormData object to send form data through AJAX
    const formData = new FormData();
    formData.append('fname', firstName);
    formData.append('lname', lastName);
    formData.append('problem', problemType);
    formData.append('machine', machineType);
    formData.append('issue', issueDescription);
    formData.append('evidence', imageFile); // Append the image file to the FormData object

    // Create XMLHttpRequest object
    const formalRequest = new XMLHttpRequest();
    formalRequest.open('POST', 'Backend/maintenance_request.php', true);

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