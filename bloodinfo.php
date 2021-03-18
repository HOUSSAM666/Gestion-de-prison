<?php 
  require 'file/connection.php';
  session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login.php');
  }
  else {
?>
<!DOCTYPE html>
<html>
<?php $title="Gestion de prison | Transfert dispo"; ?>
<?php require 'head.php'; ?>
<body>
  <?php require 'header.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
          
         <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card">
            <div class="card-header title">Ajouter les transferts disponible dans votre prison</div>
        <div class="card-body">
        <form action="file/infoAdd.php" method="post">
          <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" title="click to see">Termes & conditions. </a><br>
          <div class="collapse" id="collapseExample">
          
Le Maroc favorise la réinsertion des prisonniers en leur permettant de purger leur peine dans leur ville ou pays d’origine. Dans cet objectif, elle a mis en place un système pour retransférer les prisonniers dans la ville dont ils sont originaires, où ils vivent habituellement ou avec lequel ils ont des liens étroits.<br><br>
        </div>
          <input type="checkbox" name="condition" value="agree" required> Accepter<br><br>
          <select class="form-control" name="bg" required="">
                <option disabled selected>Durée de peine</option>
                <option>Entre 1 jour et 6 mois</option>
                <option>Entre 6 mois et 1 an</option>
                <option>Entre 1 an et 2 ans</option>
                <option>Entre 2 ans et 5 ans </option>
                <option>Entre 10 ans et 20 ans</option>
                <option>Entre 20 ans et 30 ans</option>
                <option>Indéterminé</option>
                <option>Perpétuité</option>
          </select><br>
          <input type="submit" name="add" value="Ajouter" class="btn btn-primary btn-block"><br>
          <a href="index.php" class="float-right" title="click here">Annuler</a>
        </form>
         </div>
       </div>
     </div>

<?php   if(isset($_SESSION['hid'])){
    $hid=$_SESSION['hid'];
    $sql = "select * from bloodinfo where hid='$hid'";
    $result = mysqli_query($conn, $sql);
  }
  ?>
    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <table class="table table-striped table-responsive">
            <th colspan="4" class="title">Gestion De Prison</th>
            <tr>
              <th>#</th>

              <th>Transfert Disponibles </th>
              <th>Action</th>
            </tr>
            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo ++$counter; ?></td>

              <td><?php echo $row['bg'];?></td>
              <td><a href="file/delete.php?bid=<?php echo $row['bid'];?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
            <?php } ?>
          </table>
      </div>

   </div>
</div>
<?php require 'footer.php' ?>
</body>
<?php } ?>