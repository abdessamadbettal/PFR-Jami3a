
       <option value="">Module</option>
<?php
    foreach($modules as $modele) :
?>
<option value="<?php echo $modele["modele_id"];?>"><?php echo $modele["modele"];?></option>
<?php
    endforeach;
?>