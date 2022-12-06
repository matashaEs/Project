<?php

?>

<div>Input number and names (2 - 20)</div>
<form method="post">
    <input type="text" name="number">
    <input type="submit" name="setNumber"
           value="Go">
</form>
<?php

if ( isset( $_POST['setNumber'] ) ) { ?>
    <h3>Name of Criteria</h3>
    <form method="post">
		<?php for ( $i = 0; $i < $_POST['number']; $i ++ ) {
			echo $i + 1 ?> <input type="text" name="criteria<?= $i ?>"><br>
		<?php } ?>
        <input type="submit" name="setCriteria"
               value="Ok">
    </form>
<?php }

if ( isset( $_POST['setCriteria'] ) ) { ?>
    <h3>List</h3>
	<?php
     for ( $i = 0; $i < $_POST['number']; $i ++ ) {
			echo $_POST['setCriteria' . $i];
     }
} ?>



