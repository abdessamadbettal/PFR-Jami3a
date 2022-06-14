
<option value="">Select Modele</option>
<?php
    foreach($modules as $modele) :
?>
<option value="<?php echo $modele["modele"];?>"><?php echo $modele["modele"];?></option>
<?php
    endforeach;
?>