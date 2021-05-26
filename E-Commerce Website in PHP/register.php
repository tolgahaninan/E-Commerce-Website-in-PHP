<?php include 'header.php';

 ?>

<?php

	$errRegister="";
	$checkUname = $checkPassword =$checkMail="";
	$flag=true;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["uname"])){
			$errRegister="Please fill all the blanks";
			$flag=false;
		}
		else{
			$checkUname = test_input($_POST["uname"]);
		}

		if(empty($_POST["psw"])){
			$errRegister="Please fill all the blanks";
			$flag=false;
		}
		else{
			$checkPassword = test_input($_POST["psw"]);
		}

		if(empty($_POST["regMail"])){
			$errRegister="Please fill all the blanks";
			$flag=false;
		}
		else{
			$checkMail = test_input($_POST["regMail"]);
			if (!filter_var($checkMail, FILTER_VALIDATE_EMAIL)) {
     		 $errRegister = "Invalid email format";
     		 $flag=false;
    		}
		}


		if($flag){

			$db = Conn :: getInstance();

			$query = $db->prepare("INSERT INTO USER SET userUsername=?, userPassword=? , userEmail=?");
			$insert = $query->execute(array($checkUname,$checkPassword,$checkMail));

		}


	}																	
	
	

		
					

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}






?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  <div class="containerReg" style="Border:2px solid blue;height: 30; width: 40%; margin: 0 auto;">
    <label for="uname"><b>Username</b></label></br>
    <input type="text" placeholder="Enter Username" name="uname" > </br></br>

    <label for="psw"><b>Password</b></label></br>
    <input type="password" placeholder="Enter Password" name="psw" ></br></br>

    <label for="psw"><b>E-Mail</b></label></br>
    <input type="E-Mail" placeholder="Enter E-Mail" name="regMail" ></br></br>
    <span class="errRegister"> <?php echo $errRegister;?> </span>
    <button type="submit" name="submitReg">Register</button> <a href="#"> </a>
   </br></br> 
   
  </div>


</form>




<?php include'footer.php'; ?>