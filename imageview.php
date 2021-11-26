<?php 
session_start();
//include('sidenav.php');
if (isset($_GET["image"])) {

	$image=$_GET['image'];
	$_SESSION['image']=$image;
    //$function->approve_note($id);
}
	$image=$_SESSION['image'];


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

	<div class="container">
	
	<img src="picture/<?php echo $image; ?>" height=550rem;><br><br>
	<a href="picture/<?php echo $image; ?>" download="<?php echo $image; ?>" class="btn btn-primary btn-lg">Download</a>
	</div>

	

</body>
</html>