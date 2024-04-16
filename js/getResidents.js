// Load the contacts table when the page loads

var addButtons = document.getElementsByClassName("add-button");
var okBtn = document.getElementById("resident");




document.addEventListener("DOMContentLoaded", function() {
    filterContacts('all');
    
    
});

function Search(){
    for (var i = 0; i < addButtons.length; i++) {
        addButtons[i].addEventListener("click", function() {
        document.getElementById("overlay").style.display="block";
        //document.body.classList.add("blur"); // Add blur effect to body
      });}
}

function CloseSearch(){
    document.getElementById("closeBtn").addEventListener("click", function() {
        document.getElementById("overlay").style.display = "none";
        document.body.classList.remove("blur"); // Remove blur effect from body
      });
}




async function filterContacts(filterType) {
    try {
        const response = await fetch(`SearchTickets.php?filter=${filterType}`);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const html = await response.text();
        document.getElementById('residentsTable').innerHTML = html;
    } catch (error) {
        console.error('Error fetching filtered residents:', error);
    }
}

async function LookUp(query) {

    
    try {
        const response = await fetch(`SearchTickets.php?search=${query}`);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const html = await response.text();
        document.getElementById('results').innerHTML = html;
        //document.getElementById("overlay").style.display = "none";
    } catch (error) {
        console.error('Error fetching filtered residents:', error);
    }
}
   
  
  

function LookupResident() {
    var okBtn = document.getElementById("resident");
        okBtn.addEventListener('click',function(){
            let searchQuery = document.getElementById("search-ipt").value;
            console.log(searchQuery);
            LookUp(searchQuery);

        
        });

   
}