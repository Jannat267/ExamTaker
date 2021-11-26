<?php
//include('sidenav.php');
require('action.php');

$note_name = '';
$course = '';
$dept = '';
$description = '';
$n_image = '';
$temp_name = '';
$n_file = '';


if (isset($_POST["submit"])) {


    $note_name = $_POST['note_name'];
    $s_id = $_SESSION['data']['student_id'];
    $course = $_POST['course'];
    $dept = $_POST['dept'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $tmp2 = $_FILES['file']['tmp_name'];
    $imgfolder = "picture/" . $image;
    $filefolder = "files/" . $file;
    date_default_timezone_set("Asia/Dhaka");
    //  $datetime=date("l jS \of F Y h:i:s A");
    $datetime = date("Y-m-d h:i:sa");

    //$n_file=$_POST['n_file'];

    if ($note_insert = $function->note_insert($note_name, $s_id, $course, $dept, $description, $image, $file, $datetime)); {
        move_uploaded_file($tmp, $imgfolder);
        move_uploaded_file($tmp2, $filefolder);
        echo " <div class='p-3 mb-2 bg-success text-white'> Your note has been submitted.Please wait for the approval.<a href='dashboard.php' style='color:white;'><u>Go back?</u></a></div>";
    }
    // else{
    //    echo " doesnt upload";
    // }
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
    <title>Share Your Notes</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <nav class=" sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Welcome</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>

                </div>
            </div>
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0" style="color: white;">
            <?php
            $name = $_SESSION["data"]["student_name"];
            $function->showname($name);

            ?>
        </ul>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.php">Logout</a>
                </div>
            </li>
        </ul>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="shareNote.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Share Notes

                        </a>
                        <a class="nav-link" href="pendingExam.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Examination

                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="login.php">Login</a>
                                <a class="nav-link" href="register.php">Register</a>


                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>

                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="small">Logged in as:</div>
                    Student
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
        <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">
                                        Notes Request Form</h3>
                    </div>
                    <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-row ">
                    <div class="col-md-4"><label class="small mb-1" for="inputFirstName">Note Name</label></div>
                    <div class="form-group col-md-8">
                    <input class="form-control py-6" id="inputFirstName" type="text" name="note_name" placeholder="Enter a notes name" required>
                    </div>
                    </div>
                    <div class="form-row ">
                    <div class="col-md-4">
                     <label class="small mb-1" for="inputFirstName">Course Name</label>
                     </div>
                     <div class="form-group col-md-8">
                    <input class="form-control py-6" id="inputFirstName" type="text" name="course" placeholder="Enter your course name" required>
                    </div>
                    </div>
                    <div class="form-row ">
                     <div class="col-md-4">
                      <label class="small mb-1" for="inputFirstName">Depertment</label>
                      </div>
                       <div class="form-group col-md-8">
                        <input class="form-control py-6" id="inputFirstName" type="text" name="dept" placeholder="Enter your depertment name" required>
                        </div>
                        </div>
                         <div class="form-row ">
                         <div class="col-md-4">
                         <label class="small mb-1" for="inputFirstName">Description</label>
                         </div>
                         <div class="form-group col-md-8">
                         <input class="form-control py-4" id="inputFirstName" type="text" name="description" placeholder="write a description" required>
                        </div>
                        </div>
                        <div class="form-row ">
                        <div class="col-md-4">
                        <label class="small mb-1" for="inputFirstName">Upload Image</label>
                        </div>
                        <div class="form-group col-md-8">
                        <input class="" id="inputFirstName" type="file" name="image" required>
                        </div>
                        </div>
                        <div class="form-row ">
                        <div class="col-md-4">
                        <label class="small mb-1" for="inputFirstName">Upload File</label>
                        </div>
                        <div class="form-group col-md-8">
                        <input class="" type="file" name="file">
                        </div>
                        <br>
                        </div>
                        <div class="form-group container row justify-content-md-center">

                        <button type="submit" class="btn btn-info" value="ok" name="submit">Submit</button>
                        </div>
                        </form>
                        <div class="card-footer text-center">
                        <div class="small"><a href="dashboard.php">Go Back</a></div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
            </main>

        </div>
</main>
    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>