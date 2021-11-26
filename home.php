<?php 
   require('functions.php');
   $result=$function->view_note();
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Dashboard -Admin</title>
      <link href="css/styles.css" rel="stylesheet" />
      <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
         <div class="container">
            <a class="navbar-brand" href="#">ExamTaker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Home
                     <span class="sr-only">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="register.php">Sign Up</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="login.php">Sign in</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="adminlogin.php">Admin</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- Page Content -->
      <div class="container">
         <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-table mr-1"></i>
               All Notes
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Note Name</th>
                           <th>Course Name</th>
                           <th>Depertment</th>
                           <th>Description</th>
                           <th>Upload Time</th>
                           <th>Image</th>
                           <th>File</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>Note Name</th>
                           <th>Course Name</th>
                           <th>Depertment</th>
                           <th>Description</th>
                           <th>Upload Time</th>
                           <th>Image</th>
                           <th>File</th>
                        </tr>
                     </tfoot>
                     <?php
                        while ($row = $result->fetch_assoc()) { ?>
                     <tr>
                        <td><?= $row['n_name']; ?> </td>
                        <td><?= $row['course']; ?> </td>
                        <td><?= $row['dept']; ?> </td>
                        <td><?= $row['description']; ?> </td>
                        <td><?= date("l jS \of F Y h:i:s A",strtotime($row['datetime'])); ?> 
                        </td>
                        <td>
                           
                           <img src="picture/<?php echo $row['n_image']; ?>" height=50rem; 
                              data-toggle="modal"
                              data-target="#exampleModal-<?php echo $row['n_name']; ?>">
                           
                              <div class="modal fade" id="exampleModal-<?php echo $row['n_name']; ?>"
                              tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Modal
                                          title
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <img src="picture/<?php echo $row['n_image']; ?>"
                                          height=350rem; width=450rem;>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">Close
                                       </button>
                                       <button type="button" class="btn btn-primary">Save changes
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>


                        </td>
                        <td>
                           <a href="" data-toggle="modal"
                              data-target="#exampleModalCenter-<?php echo $row['n_name']; ?>"
                              id="file">
                           <?php echo $row['n_file']; ?>
                           </a>

                           <div class="modal fade"
                              id="exampleModalCenter-<?php echo $row['n_name']; ?>"
                              tabindex="-1" role="dialog"
                              aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle">Modal
                                          title
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body" id="modalbody">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="col-7">
                                                   <img src="picture/<?php echo $row['n_image']; ?>" width="250rem" height="auto" style="border: 2px solid #2c3e50; border-radius: 5px">
                                                </div>
                                                <div class="col-5">
                                                   <ol style="list-style-type: none">
                                                      <li><span class="font-weight-bold">Note Name: </span><?= $row['n_name']; ?> </li>
                                                      <li><span class="font-weight-bold">Course Name: </span><?= $row['course']; ?> </li>
                                                      <li><span class="font-weight-bold">Department: </span><?= $row['dept']; ?> </li>
                                                      <li><span class="font-weight-bold">Description: </span><?= $row['description']; ?></li>
                                                      <li><span class="font-weight-bold">Upload Time: </span><?= $row['datetime']; ?></li>
                                                   </ol>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">Close
                                       </button>
                                       <a href="files/<?php echo $row['n_file'] ?>"
                                          download="<?php echo $row['n_file']; ?>"
                                          class="btn btn-primary">Download</a>
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </td>
                     </tr>
                     <?php   }  ?>
                    
                  </table>
               </div>
            </div>
         </div>
      </div>
      </main>
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
      </footer>

   </body>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/datatables-demo.js"></script>
</html>