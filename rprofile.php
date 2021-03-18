<?php
require 'file/connection.php';
session_start();
if(!isset($_SESSION['rid']))
{
  header('location:login.php');
}
else {
	if(isset($_SESSION['rid'])){
		$id=$_SESSION['rid'];
		$sql = "SELECT * FROM receivers WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Receiver Profile"; ?>
<?php require 'head.php';?>
<body>
	<?php require 'header.php'; ?>

	<div class="container cont">

		<?php require 'message.php'; ?>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-8 mb-5">
				<div class="card">
					<div class="media justify-content-center mt-1">
						<img src="image/user.png" alt="profile" class="rounded-circle" width="60" height="60">
					</div>
					<div class="card-body">
					   <form action="file/updateprofile.php" method="post">
					   	<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">	Nom du prisonnier</label>
						<input type="text" name="rname" value="<?php echo $row['rname']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Email</label>
						<input type="email" name="remail" value="<?php echo $row['remail']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Mot de passe</label>
						<input type="text" name="rpassword" value="<?php echo $row['rpassword']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Id du prisonnier</label>
						<input type="text" name="rphone" value="<?php echo $row['rphone']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Lieu de naissance</label>
						<input type="text" name="rcity" value="<?php echo $row['rcity']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Durée de la peine</label>
						<select class="form-control mb-3" name="bg" required>
                             <option selected><?php echo $row['rbg']; ?></option>
                             <option>Entre 1 jour et 6 mois</option>
                             <option>Entre 6 mois et 1 an</option>
                             <option>Entre 1 an et 2 ans</option>
                             <option>Entre 2 ans et 5 ans</option>
                             <option>Entre 10 ans et 20 ans</option>
                             <option>Entre 20 ans et 30 ans</option>
                             <option>Indéterminé</option>
                             <option>Perpétuité</option>
                        </select>
						<input type="submit" name="update" class="btn btn-block btn-primary" value="Mettre à jour">
					   </form>
					</div>
					<a href="index.php" class="text-center">Annuler</a><br>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>