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
<?php $title="Bloodbank | Login"; ?>
<?php require 'head.php'; ?>
<body style="background-image: url('image/jail10.jpg')  ;background-size: cover;">
  
  <?php require 'header.php'; ?>

    <div class="container cont">
      
      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          
          
          <div class="card rounded">
            <ul class="nav nav-tabs justify-content-center bg-light" style="padding: 20px;">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#hospitals">Prisons</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#receivers">Prisonniers</a>
     </li>
    </ul>

    <div class="tab-content">
       <div class="tab-pane container active" id="hospitals">
        <form action="file/hospitalLogin.php" method="post">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Prison Email</label>
          <input type="email" name="hemail" placeholder="Prison Email" class="form-control mb-4">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Prison Mot de passe</label>
          <input type="password" name="hpassword" placeholder="Prison Mot de passe" class="form-control mb-4">
          <input type="submit" name="hlogin" value="Login" class="btn btn-primary btn-block mb-4">
        </form>
       </div>


      <div class="tab-pane container fade" id="receivers">
         <form action="file/receiverLogin.php" method="post">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Prisonnier Email</label>
          <input type="email" name="remail" placeholder="Prisonnier Email" class="form-control mb-4">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Prisonnier Mot de passe</label>
          <input type="password" name="rpassword" placeholder="Prisonnier Mot de passe" class="form-control mb-4">
          <input type="submit" name="rlogin" value="Login" class="btn btn-primary btn-block mb-4">
        </form>
      </div>

    </div>
    <a href="register.php" class="text-center mb-4" title="Click here">Inscrivez-vous si vous n'avez pas de compte</a>
</div>
</div>
</div>
</div>

</body>
</html>
<?php } ?>