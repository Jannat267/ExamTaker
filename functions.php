<?php

class notes
{

	function __construct()
	{
		$this->open_db_connection();
	}

	public function open_db_connection()
	{
		$this->connection = new mysqli('localhost', 'root', '', 'notes_project');
		if ($this->connection->connect_errno) {
			die("database connection failed" . $this->connection->connect_error);
		}
	}

	public function view_student()
	{
		$sql = $this->connection->query("SELECT* FROM student WHERE approval=1 ") or die($this->connection->error);

		return $sql;
	}

	public function student_insert($s_name, $s_id, $dept, $u_name, $address, $email, $pass)
	{

		$sql = $this->connection->query("INSERT INTO `student`(`student_name`, `student_id`, `dept`, `u_name`, `address`, `email`,`password`) VALUES ('$s_name','$s_id','$dept','$u_name','$address','$email','$pass')") or die($this->connection->error);
	}

	public function pending_students()
	{

		$result = $this->connection->query("SELECT* FROM student WHERE approval=0 ") or die($this->connection->error);
		return $result;
	}

	public function approve_student($id)
	{

		if (($this->connection->query("UPDATE `student` SET `approval` = '1' WHERE `student`.`id` = $id") or die($this->connection->error)) == true) {
			echo " <div class='p-3 mb-2 bg-success text-white container mr-5' style='width: 1050px;'><marquee>Student Approved Successfully!!!</marquee></div>";
			header('Location: ' . $_SERVER['PHP_SELF']);
		}
	}
	public function delete_student($id)
	{

		if (($this->connection->query("DELETE FROM `student` WHERE  id =$id ") or die($this->connection->error)) == true) {
			header('Location: ' . $_SERVER['PHP_SELF']);
			echo " <div class='p-3 mb-2 bg-danger text-white container mr-5' style='width: 1050px;'><marquee>Account has been deleted!!!</marquee></div>";
		}
	}
	public function check_student($email, $pass)
	{
		if ($sql = $this->student_login($email, $pass)) {
			$_SESSION['data'] = mysqli_fetch_assoc($sql);
			$num_rows = mysqli_num_rows($sql);
			if ($num_rows == 1) {

				header("location:dashboard.php");
			} else {

				echo " <div class='p-3 mb-2 bg-danger text-white'>Wrong email or password !!! Or you are not approved yet!</div>";
			}
		}
	}
	public function student_login($email, $pass)
	{
		$sql = $this->connection->query("SELECT * FROM `student` WHERE email='$email' AND password='$pass' AND approval='1'") or die($this->connection->error);
		return $sql;
	}

	public function view_note()
	{
		$sql = $this->connection->query("SELECT* FROM notes WHERE approval=1 ") or die($this->connection->error);
		return $sql;
	}
	public function view_note_of_one_student($s_id)
	{
		$sql = $this->connection->query("SELECT* FROM notes WHERE s_id='$s_id' AND approval='1' ") or die($this->connection->error);
		return $sql;
	}

	public function note_insert($note_name, $log_id, $course, $dept, $description, $image, $file, $datetime)
	{
		$sql = $this->connection->query("INSERT INTO `notes`( `n_name`,`s_id`, `course`, `dept`, `description`, `n_image`, `n_file`, `datetime`) VALUES ('$note_name','$log_id','$course','$dept','$description','$image','$file','$datetime')") or die($this->connection->error);
	}
	public function pending_note()
	{
		$result = $this->connection->query("SELECT* FROM notes WHERE approval=0 ") or die($this->connection->error);
		return $result;
	}

	public function approve_note($id)
	{
		if (($this->connection->query("UPDATE `notes` SET `approval` = '1' WHERE `notes`.`n_id` = $id") or die($this->connection->error)) == true) {
			header('Location: ' . $_SERVER['PHP_SELF']);
			echo " <div class='p-3 mb-2 bg-success text-white container mr-5' style='width: 1050px;'><marquee>Note Approved Successfully!!!</marquee></div>";
		}
	}

	public function delete_note($id)
	{
		if (($this->connection->query("DELETE FROM `notes` WHERE  n_id =$id ") or die($this->connection->error)) == true) {
			header('Location: ' . $_SERVER['PHP_SELF']);
			echo " <div class='p-3 mb-2 bg-danger text-white container mr-5' style='width: 1050px;'><marquee>Note has been deleted!!!</marquee></div>";
		}
	}

	public function admin_login($email, $pass)
	{
		$sql = $this->connection->query("SELECT * FROM `admin` WHERE email='$email' AND password='$pass'") or die($this->connection->error);


		$_SESSION['ainfo'] = mysqli_fetch_assoc($sql);

		$num_rows = mysqli_num_rows($sql);
		if ($num_rows == 1) {
			//echo $num_row_pass."<br>";
			//$_SESSION['id']=$row['id'];
			header("location:admin.php");
		} else {

			echo " <div class='p-3 mb-2 bg-danger text-white'>Wrong email or password!!!</div>";
		}
	}
	public function logout()
	{
		// Initialize the session.
		session_start();
		// Unset all of the session variables.
		session_unset();
		// Finally, destroy the session.    
		session_destroy();

		// Include URL for Login page to login again.
		header('Location: login.php');
		exit;
	}
	public function admin_logout()
	{
		// Initialize the session.
		session_start();
		// Unset all of the session variables.
		session_unset();
		// Finally, destroy the session.    
		session_destroy();

		// Include URL for Login page to login again.
		header('Location: adminlogin.php');
		exit;
	}
	public function show_admin_name($name)
	{
		if (empty($name)) {
			header('Location: adminlogin.php');
		} else
			echo $name;
	}
	public function showname($name)
	{
		if (empty($name)) {
			header('Location: login.php');
		} else
			echo $name;
	}

	public function question_insert($file, $datetime)
	{
		$sql = $this->connection->query("INSERT INTO `exam_question`( `file_name`,`created_at`) VALUES ('$file','$datetime')") or die($this->connection->error);
	}
	public function all_exam()
	{
		$result = $this->connection->query("SELECT* FROM exam_question") or die($this->connection->error);

		return $result;
	}
	public function pending_exam()
	{
		$result = $this->connection->query("SELECT* FROM exam_question WhERE exam_status=1") or die($this->connection->error);

		return $result;
	}
	public function update_xm_status($question_id, $datetime)
	{
		if (($this->connection->query("UPDATE `exam_question` SET exam_status = 0, end_at = '$datetime'  WHERE `question_id` = '$question_id'")) == true) {
			header('Location: ' . $_SERVER['PHP_SELF']);
			echo " <div class='p-3 mb-2 bg-danger text-white container mr-5' style='width: 1050px;'><marquee>Exam has been closed!!!</marquee></div>";
		} else {
			die($this->connection->error);
		}
	}
	public function answer_insert($student_id, $answer, $datetime, $question_id)
	{
		$sql = $this->connection->query("INSERT INTO `students_answer`(`student_id`,`file_name`,`submitted_at`,`question_id`) VALUES ('$student_id','$answer','$datetime','$question_id')") or die($this->connection->error);
	}
	public function all_answerscript()
	{
		$result = $this->connection->query("SELECT* FROM students_answer") or die($this->connection->error);

		return $result;
	}

	public function button_disable($question_id, $student_id)
	{
		//var_dump($question_id, $student_id);

		$result = $this->connection->query("SELECT * FROM students_answer WHERE question_id = '$question_id' AND student_id= '$student_id'") or die($this->connection->error);

		if ($result->num_rows == 1) {
			return 1;
		}
	}
	public function xm_button_disable($question_id)
	{
		//var_dump($question_id, $student_id);

		$result = $this->connection->query("SELECT * FROM exam_question WHERE exam_status = 0 AND question_id = '$question_id'") or die($this->connection->error);

		if ($result->num_rows == 0) {
			return 1;
		} else {
			return 0;
		}
	}
	// public function show_file_name($question_id)
	// {
	// 	//var_dump($question_id, $student_id);

	// 	$result = $this->connection->query("SELECT 'file_name' FROM exam_question WHERE question_id = '$question_id'") or die($this->connection->error);
	// 	if ($result->num_rows == 1) {
	// 		return $result;
	// 	} else {
	// 		return 0;
	// 	}
	// }
}


$function = new notes();
?>