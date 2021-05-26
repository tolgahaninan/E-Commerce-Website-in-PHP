<?php

	$errRegister="";

	if(isset($_POST['submitReg'])){
		echo "SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS";

	if ((empty($_POST["name"])) || (empty($_POST["psw"])) || (empty($_POST["regMail"])) ) {
		$GLOBALS['registerErr'] = "Please fill all the blank";
	} 

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>