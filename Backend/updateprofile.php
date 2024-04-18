<?php
require_once ("../storage/sql_connect.php");

$user = $mysqli ->query('INSERT ');

if($result = mysqli_query($mysqli, $user)){
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

    }
    mysqli_free_result($result);
  } else{
    echo "NOT FOUND";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
?>


<div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Save</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">School ID Number:</label>
                        <input type="number" id="input-username" class="form-control form-control-alternative" minlength="9" maxlength="9" pattern = "[0-9]{9}"value="<?php echo $id; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $email; ?>" required>
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
                              <input type="text" id="input-first-name" class="form-control form-control-alternative"required value= "<?php echo $fname; ?>">
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="form-group focused">
                              <label class="form-control-label" for="input-middle-name">Middle name</label>
                              <input type="text" id="input-middle-name" class="form-control form-control-alternative" value="<?php echo $mname;?>" required>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="form-group focused">
                              <label class="form-control-label" for="input-last-name">Last name</label>
                              <input type="text" id="input-last-name" class="form-control form-control-alternative" value="<?php echo $lname;?>" required>
                          </div>
                      </div>
                  </div>
                  
                    <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-last-name">Date of Birth</label>
                          <input type="date" id="input-date-birth" class="form-control form-control-alternative" min ="2006-01-01" max= "1924-12-31" value="<?php echo $dob; ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                          <label class="form-control-label" for="input-gender">Gender</label>
                          <select id="input-gender" class="form-control form-control-alternative" required>
                              <option value="">Select Gender</option>
                              <option value=""><?php echo $gender; ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Female">Prefer not to say</option>
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
                        <input type="tel" id="input-postal-code" class="form-control form-control-alternative" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" value="1(876)-xxx-xxxx" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Phone Number (Secondary)</label>
                        <input type="tel" id="input-postal-code" class="form-control form-control-alternative" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="1(878)-xxx-xxxx">
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
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="George Alleyne" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Block Name</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Attica" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Apartment Number</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" placeholder="A12345" required>
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
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="Write anything wonderful about yourself..."></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>