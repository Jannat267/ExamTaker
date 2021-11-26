<?php
session_start();
require('functions.php');
$tmp_name = '';
$file_name = '';

if (isset($_POST["submit"])) {


    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $filefolder = "files/" . $file;
    date_default_timezone_set("Asia/Dhaka");
    //  $datetime=date("l jS \of F Y h:i:s A");
    $datetime = date("Y-m-d h:i:sa");



    if ($question_insert = $function->question_insert($file, $datetime)); {

        move_uploaded_file($tmp, $filefolder);
        echo " <div class='p-3 mb-2 bg-success text-white'> Your question has been inserted<a href='admin.php' style='color:white;'><u>Go back?</u></a></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <title>Exam Question</title>
</head>

<body class="bg-dark sb-nav-fixed ">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <h2 class="navbar-brand">Welcome</h2>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
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
            $name = $_SESSION["ainfo"]["name"];
            // $name="Admin";
            $function->show_admin_name($name);
            ?>
        </ul>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="adminlogout.php">Logout</a>
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
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i>
                            </div>Home
                        </a>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePending" aria-expanded="false" aria-controls="collapsePending">
                            <div class="sb-nav-link-icon"><i class="fas fa-exclamation-square"></i></div>
                            Pending Requests
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePending" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav" id="sidenavAccordionPending">
                                <a class="nav-link" href="pendingStudent.php">Pending Students </a>
                                <a class="nav-link" href="pendingNote.php">Pending Notes</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Examination
                            <div class="sb-sidenav-collapse-arrow"> <i class="fas fa-angle-down"></i> </div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="exam.php">Create Exam</a>
                                <a class="nav-link" href="allexam.php">Exam History</a>
                                <a class="nav-link" href="allanswer.php">Check Answerscript</a>

                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="allstudents.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            All Students
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        Upload Exam Question</h3>
                                </div>
                                <div class="card-body mx-auto">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-row ">
                                            <div class="">
                                                <label class="small mb-1" for="inputFirstName">
                                                    <h6>Upload File</h6>
                                                </label>
                                            </div>
                                            <div class="form-group ml-4">
                                                <input class="" type="file" name="file">
                                            </div>
                                            <br>
                                        </div>

                                        <div class="form-group container row justify-content-md-center">

                                            <button type="submit" class="btn btn-info" value="ok" name="submit">Create</button>

                                        </div>

                                    </form>

                                    <div class="card-footer text-center">
                                        <div class="small"><a href="admin.php">Go Back</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>

        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>