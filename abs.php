<?php 
session_start();
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg LIKE '%$searchKey%'";
}else{
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Gestion de prison | Transfert des prisonniers disponibles"; ?>
<?php require 'head.php'; ?>
<body >
    <?php require 'header.php'; ?>
    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
            <label class="font-weight-bolder">La durée de peine:</label>
               <select name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>
               <option value="Entre 1 jour et 6 mois">Entre 1 jour et 6 mois</option>
                <option value="Entre 1 jour et 6 mois">Entre 6 mois et 1 an</option>
                <option value="Entre 1 an et 2 ans">Entre 1 an et 2 ans</option>
                <option value="Entre 2 ans et 5 ans">Entre 2 ans et 5 ans</option>
                <option value="Entre 10 ans et 20 ans">Entre 10 ans et 20 ans</option>
                <option value="Entre 20 ans et 30 ans">Entre 20 ans et 30 ans</option>
                <option value="Indéterminé">Indéterminé</option>
                <option value="Perpétuité">Perpétuité</option>
               </select><br>
               <a href="abs.php" class="btn btn-info mr-4"> Réinitialiser</a>
               <input type="submit" name="submit" class="btn btn-info" value="search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="7" class="title">Transfert des prisonniers disponibles</th></tr>
            <tr>
                <th>#</th>
                <th>Nom de prison</th>
                <th>Ville de prison</th>
                <th>Email de prison</th>
                <th>Num tel de prison</th>
                <th>Duree de peine</th>
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
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['hname'];?></td>
                <td><?php echo ($row['hcity']); ?></td>
                <td><?php echo ($row['hemail']); ?></td>
                <td><?php echo ($row['hphone']); ?></td>
                <td><?php echo ($row['bg']); ?></td>

                <?php $bid= $row['bid'];?>
                <?php $hid= $row['hid'];?>
                <?php $bg= $row['bg'];?>
                <form action="file/request.php" method="post">
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                <?php if (isset($_SESSION['hid'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info hospital">Demander</a></td>
                <?php } else {(isset($_SESSION['rid']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Demander"></td>
                <?php } ?>
                
                </form>
            </tr>

        <?php } ?>
        </table>
    </div>
    <?php require 'footer.php' ?>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Utilisateur de prison ne peut pas demander un transfert.");
    });
</script>