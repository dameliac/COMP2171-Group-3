<?php
session_start();
include "../Backend/RoleManagementData.php";
require_once("../storage/sql_connect.php");

$update =array();
$userid = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $id = !empty($_POST["id"]) ? $_POST["id"] : NULL;
        $email = !empty($_POST["email"]) ? $_POST["email"] : NULL;
        $firstName = !empty($_POST["fname"]) ? $_POST["fname"] : NULL;
        $middleName = !empty($_POST["mname"]) ? $_POST["mname"] : NULL;
        $lastName = !empty($_POST["lname"]) ? $_POST["lname"] : NULL;
        $dob = !empty($_POST["dob"]) ? $_POST["dob"] : NULL;
        $gender = !empty($_POST["gender"]) ? $_POST["gender"] : NULL;
        $primary = !empty($_POST["primary"]) ? $_POST["primary"] : NULL;
        $secondary = !empty($_POST["secondary"]) ? $_POST["secondary"] : NULL;
        $hall = !empty($_POST["hall"]) ? $_POST["hall"] : NULL;
        $block = !empty($_POST["block"]) ? $_POST["block"] : NULL;
        $apt = !empty($_POST["apt"]) ? $_POST["apt"] : NULL;
        $about = !empty($_POST["about"]) ? $_POST["about"] : NULL;

        // Prepare and execute the update query
        $stmt = $mysqli->prepare("UPDATE dorm SET username = COALESCE(?, username), firstname = COALESCE(?, firstname), middlename = COALESCE(?, middlename), lastname = COALESCE(?, lastname), dateofbirth = COALESCE(?, dateofbirth), gender = COALESCE(?, gender), email = COALESCE(?, email), primarynum = COALESCE(?, primarynum), secondarynum = COALESCE(?, secondarynum), hall = COALESCE(?, hall), block = COALESCE(?, block), aptnum = COALESCE(?, aptnum), about = COALESCE(?, about) WHERE username = ?");
        
       // $stmt = $mysqli->prepare("UPDATE dorms SET username ='test'");

        // Check if the prepare statement succeeded
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $mysqli->error);
        }
         //$stmt->bind_param("s",$id);
        
        // Bind parameters
         $stmt->bind_param("ssssssssssssss", $id, $firstName, $middleName, $lastName, $dob, $gender, $email, $primary, $secondary, $hall, $block, $apt, $about, $userid);
        
        // Execute the statement
        if ($stmt->execute()) {
            var_dump($stmt ->get_result());
            echo "Records updated successfully.";
        } else {
            throw new Exception("Error updating records: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
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
                <form method="POST" id="myform">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-username">School ID Number:</label>
                            <input type="number" id="input-username" class="form-control form-control-alternative" minlength="9" maxlength="9" pattern = "[0-9]{9}" placeholder="Identification Number" value="">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="example@update.com" value="" required>
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
                                <input type="text" id="input-first-name" class="form-control form-control-alternative"required placeholder="Firstname" value="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-middle-name">Middle name</label>
                                <input type="text" id="input-middle-name" class="form-control form-control-alternative" placeholder="Middlename" value="" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-last-name">Last name</label>
                                <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Lastname" value="" required>
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-lg-6">
                            <div class="form-group focused">
                            <label class="form-control-label" for="input-last-name">Date of Birth</label>
                            <input type="date" id="input-date-birth" class="form-control form-control-alternative" min ="2006-01-01" max= "1924-12-31" placeholder="yyyy-mm-dd" value="" required>
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
                            <input type="tel" id="input-postal-code" class="form-control form-control-alternative" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="1(876)-xxx-xxxx" value="" required>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Phone Number (Secondary)</label>
                            <input type="tel" id="input-postal-code-2" class="form-control form-control-alternative" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="1(878)-xxx-xxxx" value="" >
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
                            <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Ex: George Alleyne" value="" required>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-country">Block Name</label>
                            <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Ex: Attica" value="" required>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Apartment Number</label>
                            <input type="text" id="input-apt" class="form-control form-control-alternative" placeholder="Ex: A12345" value="" required>
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