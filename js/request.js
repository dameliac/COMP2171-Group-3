document.addEventListener('DOMContentLoaded', function () {


    //listen for the content change on page
    document.addEventListener('DOMSubtreeModified', function () {
        //check if reportTable class exists. If it does, then add event listener to the page
        //load once

        if (document.querySelector('#reportTable')) {
            // console.log("reportTable exists")

            console.log('DOM loaded Request.js');
            var modal = document.getElementById('myModal');
            var modalContent = document.getElementById('modalContent');
            var modalBackdrop = document.getElementById('modalBackdrop');
            var closeModal = document.getElementById('closeModal');

            var detailsLink = document.querySelectorAll('.details-link');
            var callButton = document.querySelectorAll('.call-button');

            detailsLink.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    var details = link.getAttribute('data-details').toString();

                    details = JSON.parse(details);


                    console.log("details", details);
                    modalContent.innerHTML = `
        <h2>Details</h2>
        <p>Submission Time: ${details.submission_time}</p>
        <p>Machine: ${details.machine}</p>
        <p>Problem: ${details.typeofissue}</p>
        <p>Description: ${decodeURIComponent(details.description)}</p>
       
        `;
                    modal.style.display = 'block';
                    modalBackdrop.style.display = 'block';
                });
            });



            callButton.forEach(function (button) {
                button.addEventListener('click', function () {
                    alert('Calling...');
                });
            });

            closeModal.addEventListener('click', function () {
                modal.style.display = 'none';
                modalBackdrop.style.display = 'none';
            });

            window.addEventListener('click', function (e) {
                if (e.target === modalBackdrop) {
                    modal.style.display = 'none';
                    modalBackdrop.style.display = 'none';
                }
            });

            //stop listening for changes
            document.removeEventListener('DOMSubtreeModified', function () {
                console.log('stopped listening for changes');
            });
        }

    });


});
