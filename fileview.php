<?php 
session_start();
if (isset($_GET['file'])) {

	$_SESSION['file']=$_GET['file'];
	
    //$function->approve_note($id);
}
	$file=$_SESSION['file'];


?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
<body>
	<div class="container mt-5">
	
     
	<a href="files/<?php echo $file; ?>" download="<?php echo $file; ?>" class="btn btn-primary btn-lg" id="dbtn" >Download</a>

	
    </div>
</body>
</html>