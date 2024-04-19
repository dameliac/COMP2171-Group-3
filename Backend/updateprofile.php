<?php
session_start();
include "../Backend/RoleManagementData.php";
require_once("../storage/sql_connect.php");

$username = $_SESSION['userName']; //get the usertype as well as firstname and lastname of current user

  $userInfo = getTyped($mysqli,$username);
 
  $_SESSION['id'] = $userInfo['id'];
  $userid = $userInfo['id'];

  $updateFields = [];
  $types = "";
  $values = [];
  
  foreach ($_POST as $key => $value) {
      if (!empty($value)) {
          $updateFields[] = "$key = ?";
          $types .= "s"; // Assuming all values are strings, adjust as necessary
          $values[] = $value;
      }
  }
  
  if (!empty($updateFields)) {
      $updateParams = implode(", ", $updateFields);
      $stmt = $mysqli->prepare("UPDATE dorms SET $updateParams WHERE username = $userid");
      if (!$stmt) {
          echo "ERROR: Could not prepare statement: " . $mysqli->error;
      } else {
          // Bind parameters and execute
          $stmt->bind_param($types, ...$values); // No need to bind $id
          $stmt->execute();
  
          if ($stmt->errno) {
              echo "ERROR: Could not execute statement: " . $stmt->error;
          } else {
              echo "Data updated successfully.";
          }
      }
  } else {
      echo "No data to update.";
  }

?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                    <h3 class="mb-0">My account</h3>
                    </div>
                    <div class="col-4 text-right">
                    <a href="javascript:void(0)" class="save btn-sm btn-primary" onclick="Save()">Save</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                <form method="POST" action="../Backend/updateprofile.php" id="myform">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-username">School ID Number:</label>
                            <input type="number" id="input-username" class="form-control form-control-alternative" minlength="9" maxlength="9" pattern = "[0-9]{9}" placeholder="Identification Number" required>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="example@update.com" required>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                        <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-first-name">First name</label>
                                <input type="text" id="input-first-name" class="form-control form-control-alternative"required placeholder="Firstname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-middle-name">Middle name</label>
                                <input type="text" id="input-middle-name" class="form-control form-control-alternative" placeholder="Middlename" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-last-name">Last name</label>
                                <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Lastname" required>
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-lg-6">
                            <div class="form-group focused">
                            <label class="form-control-label" for="input-last-name">Date of Birth</label>
                            <input type="date" id="input-date-birth" class="form-control form-control-alternative" min ="2006-01-01" max= "1924-12-31" placeholder="yyyy-mm-dd" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-gender">Gender</label>
                            <select id="input-gender" class="form-control form-control-alternative" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                        
                    </div>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Phone Number (Primary)</label>
                            <input type="tel" id="input-postal-code" class="form-control form-control-alternative" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="1(876)-xxx-xxxx" required>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Phone Number (Secondary)</label>
                            <input type="tel" id="input-postal-code-2" class="form-control form-control-alternative" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="1(878)-xxx-xxxx">
                        </div>
                        </div>
                    </div>
                    </div>
                    <br>
                    <hr class="my-4">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group focused">
                            <h6 class="heading-small text-muted mb-4">Address</h6>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-city">Hall of Residence</label>
                            <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Ex: George Alleyne" required>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-country">Block Name</label>
                            <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Ex: Attica" required>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Apartment Number</label>
                            <input type="text" id="input-apt" class="form-control form-control-alternative" placeholder="Ex: A12345" required>
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">About me</h6>
                    <div class="pl-lg-4">
                    <div class="form-group focused">
                        <label>About Me</label>
                        <textarea rows="4" class="form-control form-control-alternative" id="about" placeholder="Write anything wonderful about yourself..."></textarea>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
</body>
<script src="../js/profile.js"></script>
</html>