<?php
/*
 * Check validation
 * @param array $validations
 * @param array $params
 * @return bool or array
 */
 function validate($validations, $params) {
	$errors = array ('total_errors' => 0);
	foreach ($validations as $field => $validation){
		if(!preg_match($validation, $params[$field])){
			$errors['total_errors']++;
			$errors[$field] = true;
		}
	}
	
	if($errors['total_errors'] > 0){
		return $errors;
	}else{
		return false;
	}
}

?>