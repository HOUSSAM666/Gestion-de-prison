<?php 
session_start();
if (isset($_SESSION['hid'])) {
  header("location:bloodrequest.php");
}elseif (isset($_SESSION['rid'])) {
  header("location:sentrequest.php");
}else{
?>
<!DOCTYPE html>
<html>
<?php $title="Gestion de prison | Register"; ?>
<?php require 'head.php'; ?>
<body style="background-image: url('image/jail10.jpg')  ;background-size: cover;">
  <?php include 'header.php'; ?>

    <div class="container cont">

    <?php require 'message.php'; ?>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card rounded">
            <ul class="nav nav-tabs justify-content-center bg-light" style="padding: 20px">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#hospitals">Prisons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#receivers">Prisonniers</a>
              </li>
            </ul>

    <div class="tab-content">

       <div class="tab-pane container active" id="hospitals">

        <form action="file/hospitalReg.php" method="post" enctype="multipart/form-data">
          <input type="text" name="hname" placeholder="Nom de prison" class="form-control mb-3" required>
          <input type="text" name="hcity" placeholder="Ville de prison" class="form-control mb-3" required>
          <input type="tel" name="hphone" placeholder="Num tel de prison" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Password must have start from 0,6,7,8 or 9 and must have 10 to 12 digit">
          <input type="email" name="hemail" placeholder="Email de prison" class="form-control mb-3" required>
          <input type="password" name="hpassword" placeholder="Mot de passe" class="form-control mb-3" required minlength="6">
          <input type="submit" name="hregister" value="Register" class="btn btn-primary btn-block mb-4">
        </form>

       </div>


       <div class="tab-pane container fade" id="receivers">

         <form action="file/receiverReg.php" method="post" enctype="multipart/form-data">
          <input type="text" name="rname" placeholder="Nom du prisonnier" class="form-control mb-3" required>
          <select name="rbg" class="form-control mb-3" required>
                <option disabled="" selected="">Durée de la peine</option>
                <option value="A+">Entre 1 jour et 6 mois</option>
                <option value="A-">Entre 6 mois et 1 an</option>
                <option value="B+">Entre 1 an et 2 ans </option>
                <option value="B-">Entre 2 ans et 5 ans</option>
                <option value="AB+">Entre 10 ans et 20 ans</option>
                <option value="AB-">Entre 20 ans et 30 ans</option>
                <option value="O+">Indéterminé</option>
                <option value="O-">Perpétuité</option>
          </select>
          <input type="text" name="rcity" placeholder="Lieu de naissance" class="form-control mb-3" required>
          <input type="tel" name="rphone" placeholder="ID du prisonnier" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="ID must have start from 0,6,7,8 or 9 and must have 10 to 12 digit">
          <input type="email" name="remail" placeholder=" Email du prisonnier" class="form-control mb-3" required>
          <input type="password" name="rpassword" placeholder="Mot de passe" class="form-control mb-3" required minlength="6">
          <input type="submit" name="rregister" value="S'inscrire" class="btn btn-primary btn-block mb-4">
        </form>

       </div>
    </div>
    <a href="login.php" class="text-center mb-4" title="Click here">Vous avez déjà un compte ?</a>
</div>
</div>
</div>
</div>

</body>
</html>
<?php } ?>