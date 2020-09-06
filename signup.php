<!DOCTYPE html>
<?php
$username1="";
$password1="";
$fullname1="";
$phone1="";
$pin1="";
$add1="";
$city1="";
$state1="";
$temp1=0;
$symp1="";
$dob1;
if(isset($_POST['signup']))
{
    $con=mysqli_connect('localhost','root','','covid19_db');
    $username1=$_POST['username'];
    $password1=$_POST['password'];
    $fullname1=$_POST['fullname'];
    $phone1=$_POST['phone'];
    $pin1=$_POST['pin'];
    $add1=$_POST['add'];
    $city1=$_POST['city'];
    $state1=$_POST['state'];
    $temp1=$_POST['temp'];
    $symp1=$_POST['symp'];
    $dob1=$_POST['dob'];

    $query="INSERT into user(password,uname,full_name,phone_no,pin,house_address,city,state,temperature,symptoms,dob) 
    values('$password1','$username1','$fullname1','$phone1','$pin1','$add1','$city1','$state1','$temp1','$symp1','$dob1')";

    
    //echo $query;     

    if(mysqli_query($con,$query))
    {
        $uid=mysqli_insert_id($con);
        if($temp1 > 100 && $symp1=="Y")
        {
            
            $query1="INSERT into patient(pname,uname,phone_no,pin,house_address,city,state,temperature,dob,User_id) 
            values('$fullname1','$username1','$phone1','$pin1','$add1','$city1','$state1','$temp1','$dob1','$uid')";
           // echo $query1;
            mysqli_query($con,$query1);
            $patid=mysqli_insert_id($con);
            header("location:positive.php?patid=".$patid);
        }
        else
        {
            header("location:negative.php");
        }
    }
  else
    {
        header("location:error.php");
    }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COVID19 SIGNUP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">COVID19 Dashboard</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item">
            <form id="searchForm" class="ml-auto d-none d-lg-block">
              <div class="form-group position-relative mb-0">
                <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
              </div>
            </form>
          </li>
          <li class="nav-item dropdown mr-3"><a id="notifications" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a><a href="#" class="dropdown-item"> 
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 6 new messages</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">Server rebooted</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
            </div>
          </li>
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">Mark Stephen</strong><small>Web Developer</small></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
              <div class="dropdown-divider"></div><a href="login.html" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              
             
              
              
              <!-- Form Elements -->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Register</h3>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" action="signUp.php" method="POST">
                     
                     
                     
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter Username *</label>
                        <div class="col-md-3">
                          <input type="text" placeholder="username" name="username" id="username" class="form-control">
                        </div>
                        <label class="col-md-3 form-control-label">Create Password * </label>
                        <div class="col-md-3">
                        <input type="password"name="password" id="password" placeholder="Password" class="form-control">
                        </div>
                        
                        <div class="line"></div>
                      </div>

                     

                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter Full name </label>
                        <div class="col-md-9">
                          <input type="text" name="fullname" id="fullname" placeholder="fullname" class="form-control">
                        </div>
                      </div>
                       
                      <br>

                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter Phone No  </label>
                        <div class="col-md-9">
                          <input type="text" name="phone" id="phone" placeholder="Phone number" class="form-control">
                        </div>
                      </div>

                      <br>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter Pin  </label>
                        <div class="col-md-9">
                          <input type="text" name="pin" id="pin" placeholder="pin" class="form-control">
                        </div>
                      </div>
                      
                      <br>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter Address </label>
                        <div class="col-md-9">
                          <input type="text" name="add" id="add" placeholder="Address" class="form-control">
                        </div>
                      </div>

                      <br>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter City </label>
                        <div class="col-md-9">
                        <input type="text" name="city" id="city" placeholder="city" class="form-control">
                        </div>
                      </div>

                      <br>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter State </label>
                        <div class="col-md-9">
                        <input type="text" name="state" id="state" placeholder="state" class="form-control">
                        </div>
                      </div>

                      <br>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter Temperature </label>
                        <div class="col-md-9">
                        <input type="text" name="temp" id="temp" placeholder="Temperature" class="form-control">
                        </div>
                      </div>
                       

                      
                      <div class="line"></div>
                      
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Do you have Dry Cough?:</label>
                        <div class="col-md-9 select mb-3">
                          <select name="symp" class="form-control">
                          <option value="">--Select--</option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                          </select>
                        </div>
                        
                      </div>

                      <br>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Enter your date of birth </label>
                        <div class="col-md-9">
                        <input type="date" name="dob" id="dob" class="form-control">
                        </div>
                      </div>

                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <div class="col-md-9 ml-auto">
                          <button type="submit" class="btn btn-primary" name="signup">Register</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>