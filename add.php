<?php

	include('C:\xampp\htdocs\tuts\config\db_connect.php');

	$name=$rgnum=$dept=$yoj=$yog=$email=$phno='';

	$errors=array('name'=>'', 'rgnum'=>'', 'dept'=>'', 'yoj'=>'', 'yog'=>'', 'email'=>'', 'phno'=>'');

	if(isset($_POST['submit'])){
		if(empty($_POST['name'])){
			$errors['name'] = "Name is Required";
		}else{
			$name=$_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = "Letters and spaces are only allowed<br />";

			}
		}
		//check register number
		if(empty($_POST['rgnum'])){
			$errors['rgnum']= 'Register Number is required<br />';
		}else{
			$rgnum =$_POST['rgnum'];
			if(!preg_match('/^[0-9\s]+$/', $rgnum)){
				$errors['rgnum']= "valid number is required";
			}
		}
		//check department
		if(empty($_POST['dept'])){
			$errors['dept']= 'Department name is required<br />';
		}else{
			$dept =$_POST['dept'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $dept)){
				$errors['dept']= "valid Department name is required";
			}
		}
		//year of joining
		if(empty($_POST['yoj'])){
			$errors['yoj']= 'year is required<br />';
		}else{
			$yoj =$_POST['yoj'];
			if(!preg_match('/^[0-9\s]+$/', $yoj)){
				$errors['yoj']= "valid number is required";
			}
		}
		//year of graduation
		if(empty($_POST['yog'])){
			$errors['yog']= 'year is required<br />';
		}else{
			$yog =$_POST['yog'];
			if(!preg_match('/^[0-9\s]+$/', $yog)){
				$errors['yog']= "valid number is required";
			}
		}
		//check email
		if(empty($_POST['email'])){
			$errors['email'] = "An email is required<br />";
		}else{
			$email=$_POST['email'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'email must be a valid email address<br />';
			}
		}
		//check phone number
		if(empty($_POST['phno'])){
			$errors['phno']= 'phone number is required<br />';
		}else{
			$phno =$_POST['phno'];
			if(!preg_match('/^[0-9\s]+$/', $phno)){
				$errors['phno']= "valid number is required";
			}
		}
		if(array_filter($errors)){

		}else{

			$name=mysqli_real_escape_string($conn, $_POST['name']);
			$rgnum=mysqli_real_escape_string($conn, $_POST['rgnum']);
			$dept=mysqli_real_escape_string($conn, $_POST['dept']);
			$yoj=mysqli_real_escape_string($conn, $_POST['yoj']);
			$yog=mysqli_real_escape_string($conn, $_POST['yog']);
			$email=mysqli_real_escape_string($conn, $_POST['email']);
			$phno=mysqli_real_escape_string($conn, $_POST['phno']);

			//create sql
			$sql="INSERT INTO admission(name,rgnum,dept,yoj,yog,email,phno) VALUES('$name', '$rgnum', '$dept', '$yoj', '$yog', '$email', '$phno')";

			if(mysqli_query($conn, $sql)){

				header('Location: index.php');

			}else{
				echo "query error:" .mysqli_error($conn);
			}

		}


	}


?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>
	<section class="container blue-text">
		<h4 class="center">Add a Student</h4>
		<form class="white" action="add.php" method="POST">
			<label>Student Name:</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Register Number:</label>
			<input type="text" name="rgnum" value="<?php echo htmlspecialchars($rgnum) ?>">
			<div class="red-text"><?php echo $errors['rgnum']; ?></div>
			<label>Department:</label>
			<input type="text" name="dept" value="<?php echo htmlspecialchars($dept) ?>">
			<div class="red-text"><?php echo $errors['dept']; ?></div>
			<label>Year of joining:</label>
			<input type="text" name="yoj" value="<?php echo htmlspecialchars($yoj) ?>">
			<div class="red-text"><?php echo $errors['yoj']; ?></div>
			<label>Year of graduation:</label>
			<input type="text" name="yog" value="<?php echo htmlspecialchars($yog) ?>">
			<div class="red-text"><?php echo $errors['yog']; ?></div>
			<label>Email ID:</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Phone Number:</label>
			<input type="text" name="phno" value="<?php echo htmlspecialchars($phno) ?>">
			<div class="red-text"><?php echo $errors['phno']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>
</html>