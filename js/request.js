const { request } = require("http");
let data = document.getElementById("reportBody")
document.addEventListener('DOMContentLoaded', function() {
    fetch('../json/viewrequest.json')
        .then(response => response.json())
        .then(data => {
            var reportBody = document.getElementById('requests');
            data.sort((a, b) => $submissionTime(b.date) - new Date(a.date));
            data.forEach(requests => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${requests.submissionTime}</td>
                    <td>${requests.machine}</td>
                    <td>${requests.problem}</td>
                    <td>${requests.description}</td>
                    <td><a href="#" class="details-link">View Details</a></td>
                    <td><button class="call-button"><i class="fas fa-phone icon fa-flip-horizontal" style="font-size:24px;color:blue"></i></button></td>
                `;

                // Add event listener for details link
                row.querySelector('.details-link').addEventListener('click', function(event) {
                    event.preventDefault();
                    const modalBackdrop = document.getElementById('modalBackdrop');
                    const modalContent = document.getElementById('modalContent');
                    const modal = document.getElementById('myModal');

                    // Display the modal and backdrop
                    modalBackdrop.style.display = 'block';
                    modal.style.display = 'block';

                    // Fetch and display details in the modal
                    modalContent.innerHTML = `
                        <div class="modal-details">
                            <h2>Maintenance Report Details</h2>
                            <p><strong>Date:</strong> ${requests.submissionTime}</p>
                            <p><strong>Machine:</strong> ${requests.machine}</p>
                            <p><strong>Problem Type:</strong> ${requests.problem}</p>
                            <p><strong>Description:</strong> ${requests.description}</p>
                            <div class="modal-photo">
                                <img src="${requests.photo}" alt="Maintenance Photo">
                            </div>
                        </div>
                    `;
                });

                // Add event listener for call button
                row.querySelector('.call-button').addEventListener('click', function() {
                    let phoneNumber;
                    switch (report.problemType) {
                        case 'Washing Machine':
                        case 'Dryer':
                            phoneNumber = '8768209568';
                            break;
                        case 'Plumbing':
                            phoneNumber = '8764404752';
                            break;
                        default:
                            break
                            //phoneNumber = ''; // Default phone number if problem type is not recognized
                    }
                    window.location.href = 'tel:' + phoneNumber;
                });

                reportBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching data:', error));

    // Close the modal when the close button is clicked
    document.getElementById('closeModal').addEventListener('click', function() {
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modal = document.getElementById('myModal');

        // Hide the modal and backdrop
        modalBackdrop.style.display = 'none';
        modal.style.display = 'none';
    });
});