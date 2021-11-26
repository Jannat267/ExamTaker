<?php

    require('functions.php');
    $s_name='';
    $s_id='';
    $u_name='';
    $dept='';
    $address='';
    $email='';
    $pass='';
    $conpass='';

 if (isset($_POST["register"])) {
    
     $s_name=$_POST['s_name'];
     $s_id=$_POST['s_id'];
     $u_name=$_POST['u_name'];
     $dept=$_POST['dept'];
     $address=$_POST['address'];
     $email=$_POST['email'];
     $pass=md5($_POST['pass']);
     $conpass=md5($_POST['conpass']);

      if ($pass != $conpass) {
            echo " <div class='p-3 mb-2 bg-danger text-white'>SORRY!!! Your password do not match!!!</div>"; 
        }
     else {
        $function->student_insert($s_name,$s_id,$dept,$u_name,$address,$email,$pass);  
         echo " <div class='p-3 mb-2 bg-success text-white'> !!! CONGRATS !!! You are all set.<a href='login.php' style='color:white;'><u>Go to login?</u></a>
             / <a href='home.php' style='color:white;'> <u>Go to home?</u></a></div>"; 
     }
      
     
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        Create Account</h3>        
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    
                                                    <label class="small mb-1" for="inputFirstName">Student Name</label>
                                                    <input class="form-control py-4" id="inputName" type="text" name="s_name" placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Student Id</label>
                                                    <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter your Id" name="s_id" >
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   
                                                    <label class="small mb-1" for="inputFirstName">University Name</label>
                                                    <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter University name" name="u_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Depertment</label>
                                                    <input class="form-control py-4" id="inputLastName" type="text" placeholder=" Depertment name" name="dept" >
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Address</label>
                                                    <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter your address" name="address">
                                                </div>
                                            </div>
                                            
                                       
                                        
                                          <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Email</label>
                                                    <input class="form-control py-4" id="inputFirstName" type="email" name="email" placeholder="Enter Your Email">
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="form-row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Password</label>
                                                    <input class="form-control py-4" id="inputLastName" type="password" placeholder=" Depertment name" name="pass" >
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Confirm Password</label>
                                                    <input class="form-control py-4" id="inputLastName" type="password" placeholder=" Depertment name" name="conpass" >
                                                    
                                                </div>
                                            </div>



                                        </div>
                                        <div class="form-group container row justify-content-md-center">
                                            
                                          <button type="submit" class="btn btn-warning" name="register">Submit</button>
                                            
                                        </div>
                                        
                                    </form>

                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
        <br>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>