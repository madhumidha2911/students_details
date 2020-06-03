<?php

	include('C:\xampp\htdocs\tuts\config\db_connect.php');

	if(isset($_GET['id'])){

		$id=mysqli_real_escape_string($conn,$_GET['id']);

		$sql="SELECT * FROM admission WHERE id=$id";

		$result= mysqli_query($conn,$sql);

		$detail = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);
	}


?>
<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

<div class="container center">
	<?php if($detail): ?>
		<h3><?php echo htmlspecialchars($detail['name']); ?></h3>
		<h4><?php echo htmlspecialchars($detail['rgnum']); ?></h4>
		<p>Department: <?php echo htmlspecialchars($detail['dept']); ?></p>
		<p>Year of Joining: <?php echo htmlspecialchars($detail['yoj']); ?></p>
		<p>Year of graduation: <?php echo htmlspecialchars($detail['yog']); ?></p>
		<p>Email ID: <?php echo htmlspecialchars($detail['email']); ?></p>
		<p>Phone Number: <?php echo htmlspecialchars($detail['phno']); ?></p>
		<p><?php echo date($detail['created_at']); ?></p>
		<p id='one' class="purple-text">All the best for your wounderful career!!!</p>

	<?php else: ?>

	<?php endif; ?>

</div>

<?php include('templates/footer.php'); ?>

</html>