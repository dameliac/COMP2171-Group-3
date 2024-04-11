<!DOCTYPE html>
<html lang="en">
<head>
<title>Maintenance Request Form</title>
<link rel="stylesheet" href="../COMP2171-Group-3/css/Maintence Request.css">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<style>
  body{
    font-family: Poppins;
  }
</style>
<body>
 <div class="card">
  <div class="container">
    <!-- Card content goes here -->
   <header class="header">
   <!--<img src="../COMP2171-Group-3/img/laundry logo.png">--><h1>UniFresh Laundry Xpress</h1>
   <img id="banner" src="../COMP2171-Group-3/img/laundry.jpg">
   <div class = "heading"><h2>Maintenance Request Form</h2></div>
   </header>
   
    <div class="allforms">
      <div>
        <p><label for="fname">First name:</label></p>
        <input type="text" id="fname" name="fname" placeholder="First Name" required>
      </div>
       <div>
       <p><label for="lname">Last name:</label></p>
        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
       </div>
    </div> 
       
       <div class="wrapper2">
        <div>
         <form action="/action_page.php">
          <p><label for="problem">Type of Problem:</label></p>
          <select name="problem" id="problem"  required>
           <option value= "" disabled selected hidden>Type of Problem</option>
           <option value="WM" >Washing Machine Malfunction</option>
           <option value="DM">Dryer Malfunction</option>
           <option value="Plumb">Plumbing issues</option>
           <option value="Other">Other</option>
          </select>
         </form>
        </div>
        <div>
          <form action="/action_page.php">
            <p><label for="machine">Machine Type:</label></p>
              <select name="machine" id="machine"  required>
                <option value= "" disabled selected hidden>Machine Type</option>
                <option value="machine1">Machine 1</option>
                <option value="machine2">Machine 2</option>
                <option value="machine3">Machine 3</option>
                <option value="machine4">Machine 4</option>
                <option value="machine5">Machine 5</option>
                <option value="machine6">Machine 6</option>
                <option value="machine7">Machine 7</option>
                <option value="machine8">Machine 8</option>
                <option value="machine9">Machine 9</option>
                <option value="machine10">Machine 10</option>
                <option value="None">None</option>
                
              </select>
          </form>
        </div>
       </div>
     
        
        <div class="row">
             
          <form action="/action_page.php">
            <p><label for="description">Please describe the issue:</label></p>
            <textarea type="text" id="txt" name="txt"></textarea>
          </form>
          
          <div>
            <p><label for="evidence">Insert photo as supporting evidence:</label></p>
            <p><input type="file" id="evidence" name="evidence" accept="image/png, image/jpeg image/jpg"/></p>
          </div>
        </div>
  
       
       


        
      </div>
      <p id="Submit">
      <input id="submit" value ="SUBMIT" type="button">
      </p>
    </div>
   
   
      
  </div>
 </div>
</body>
</html>
