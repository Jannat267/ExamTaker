<?php
session_start();
require('functions.php');
$obj = new notes();
$result = $function->pending_exam();
$student_id = $_SESSION["data"]["student_id"];
//$sub = $function->button_disable($row['question_id'], $student_id);

$exam = "";
// if(isset($_POST['submit-ans']))
// {

// }
if (isset($_POST['ans_submit'])) {


    $question_id = $_POST['q_id'];
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $filefolder = "files/" . $file;
    date_default_timezone_set("Asia/Dhaka");
    //  $datetime=date("l jS \of F Y h:i:s A");
    $datetime = date("Y-m-d h:i:sa");
    if ($answer_insert = $function->answer_insert($student_id, $file, $datetime, $question_id)); {
        var_dump($file, $tmp);
        move_uploaded_file($tmp, $filefolder);
        echo " <div class='p-3 mb-2 bg-success text-white'> Your response has been recorded<a href='dashboard.php' style='color:white;'><u>Go back?</u></a></div>";
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Student</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
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
                <div class="container-fluid">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            <h3 class="text-info">Exam Question</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Question Name</th>
                                            <th>Question</th>
                                            <th>Submit Answer</th>
                                            <th>Upload Time</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <?= $id = $row['question_id']; ?>
                                        <tr>
                                            <td><?= $row['file_name']; ?> </td>
                                            <td>

                                                <a href="files/<?php echo $row['file_name'] ?>" download="<?php echo $row['file_name']; ?>">
                                                    <?php echo $row['file_name']; ?>
                                                </a>

                                            </td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button class="btn btn-info" type="submit" name="submit-ans" id="btn" data-toggle="modal" data-target="#exampleModalCenter-<?php echo $row['question_id']; ?>" <?php if ($function->button_disable($row['question_id'], $student_id) == 1) {  ?> disabled <?php  }   ?>>Attach File</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter-<?= $row['question_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                                                    <input type="text" value="<?= $row['question_id']; ?>" name="q_id">
                                                                    <div class="form-group col-md-6">
                                                                        <input class="" id="file" type="file" name="file">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                <button type="submit" class="btn btn-primary" name="ans_submit">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td> <?= date("l jS \of F Y h:i:s A", strtotime($row['created_at'])); ?>
                                            </td>

                                        </tr>
                                    <?php  }   ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="dashboard.php">Go Back</a></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>