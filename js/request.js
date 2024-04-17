document.addEventListener('DOMContentLoaded', function() {
    fetch('../Backend/request.php')
        .then(response => response.json())
        .then(data => {
            const reportBody = document.getElementById('reportBody');
            data.sort((a, b) => new Date(b.date) - new Date(a.date));
            data.forEach(report => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${report.date}</td>
                    <td>${report.machine}</td>
                    <td>${report.problemType}</td>
                    <td>${report.description}</td>
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
                            <p><strong>Date:</strong> ${report.date}</p>
                            <p><strong>Machine:</strong> ${report.machine}</p>
                            <p><strong>Problem Type:</strong> ${report.problemType}</p>
                            <p><strong>Description:</strong> ${report.description}</p>
                            <div class="modal-photo">
                                <img src="${report.photo}" alt="Maintenance Photo">
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
                            phoneNumber = ''; // Default phone number if problem type is not recognized
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