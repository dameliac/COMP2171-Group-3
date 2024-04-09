<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="../COMP2171-Group-3/css/viewprofile.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<main>
<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="user icon" src="../COMP2171-Group-3/img/admin.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10" style="width: 800px;">
          <?php
            session_start();
              include "../COMP2171-Group-3/RoleManagementData.php";
              require_once ("../COMP2171-Group-3/storage/sql_connect.php");

              $username = $_SESSION['userName'];
              //get the usertype as well as firstname and lastname of current user

              $userInfo = getTyped($mysqli,$username);

              if($userInfo['type']=="resident"):
                echo "<h1 class='display-2 text-white';>Hello ". $userInfo['first'] . " " . $userInfo['last']."</h1>";
              elseif ($userInfo['type']=="staff"):
                echo "<h1 class='display-2 text-white'>Hello ". $userInfo['first'] . " " . $userInfo['last']."</h1>";
              endif;?>
            
            <p class="text-white mt-0 mb-5">This is your profile. You can view your personal information below</p>
            <a href="#!" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <!--<div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="/img/profile.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="Account.html" class="btn btn-sm btn-info mr-4">My Account</a>
                <a href="login.html" class="btn btn-sm btn-default float-right">Log Out</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading"></span>
                      <span class="description"> </span>
                      <span class="heading">
                        NOTIFICATIONS
                        <button type="button" class="icon-button">
                            <span class="icon-button__badge">2</span>
                        </button>
                    </span>
                      <hr class="my-4">
                      <span class="description"> [Check your messages/No new messages]</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  Notification: <span class="font-weight-light">[insert notif details]</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>[DATE/TIME]
                </div>
                <hr class="my-4">
                <a href="#">Show more notifications</a>
                <a href="#">Go to Forum</a>
              </div>
            </div>
          </div>-->
        </div>
        <div class="col-xl-8 order-xl-1" style="justify-content: center;">
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
                        <input type="number" id="input-username" class="form-control form-control-alternative" minlength="9" maxlength="9" pattern = "[0-9]{9}"value="6201*****" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" value="myemail@gmail.com" required>
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
                              <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="John" required>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="form-group focused">
                              <label class="form-control-label" for="input-middle-name">Middle name</label>
                              <input type="text" id="input-middle-name" class="form-control form-control-alternative" placeholder="Josh" required>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="form-group focused">
                              <label class="form-control-label" for="input-last-name">Last name</label>
                              <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Doe" required>
                          </div>
                      </div>
                  </div>
                  
                    <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-last-name">Date of Birth</label>
                          <input type="date" id="input-date-birth" class="form-control form-control-alternative" min ="2006-01-01" max= "1924-12-31" value="dd/mm/yyyy" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                          <label class="form-control-label" for="input-gender">Gender</label>
                          <select id="input-gender" class="form-control form-control-alternative" required>
                              <option value="">Select Gender</option>
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
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>&copy; 2024 UniFresh Laundry Xpress. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</main>