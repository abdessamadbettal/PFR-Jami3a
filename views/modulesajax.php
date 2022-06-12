<?php
require_once "db.php";
// echo  " test" ;
$specialite_id = $_GET["specialite_id"];
// echo $specialite_id ;
$result = mysqli_query($conn,"SELECT * FROM modele where fk_specialite = $specialite_id");
?>
<option value="">Select Modele</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["modele_id"];?>"><?php echo $row["modele"];?></option>
<?php
}
?>