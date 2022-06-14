<?php
require_once "db.php";
// echo  " test" ;
$specialite = $_GET["specialite_id"];
// echo $specialite_id ;
$result = mysqli_query($conn,"SELECT * FROM modele INNER JOIN specialite
ON modele.fk_specialite = specialite.specialite_id where specialite = '$specialite' ;");
?>
<option value="">Select Modele</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["modele"];?>"><?php echo $row["modele"];?></option>
<?php
}
?>