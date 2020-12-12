<?php

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}


//FUNCTION FOR DISPLAY ERROR
function display_error() {
	global $errors;
        global $errors1;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

?>
