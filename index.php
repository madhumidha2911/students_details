<?php 

	include('C:\xampp\htdocs\tuts\config\db_connect.php');

	$sql='SELECT name,rgnum,id FROM admission ORDER BY yoj';

	$result= mysqli_query($conn,$sql);

	$details = mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);


?>
<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Students</h4>
<div class="container">
	<div class="row">
		
		<?php foreach($details as $detail){ ?>
			<div class="col s6 md3">
				<div class="card">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($detail['name']); ?></h6>
						<h6><?php echo htmlspecialchars($detail['rgnum']); ?></h6>
					</div>
					<div class="card-action right-align">
						<a class="brand-text black-text" href="details.php?id=<?php echo $detail['id'] ?>">more info</a>
					</div>
				</div>
			</div>

		<?php } ?>

	</div>
	
</div>

<?php include('templates/footer.php'); ?>

</html>