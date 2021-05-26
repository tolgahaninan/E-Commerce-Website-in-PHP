<?php include 'header.php'; ?>

<?php

  $errLogin="";
  $checkPasswordLogin = $checkMailLogin="";
  $flag=true;

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["mailLogin"])){
      $errLogin="Please fill all the blanks";
      $flag=false;
    }
    else{
      $checkMailLogin = test_input($_POST["mailLogin"]);
      if (!filter_var($checkMailLogin, FILTER_VALIDATE_EMAIL)) {
         $errLogin = "Invalid email format";
         $flag=false;
        }
    }

    if(empty($_POST["pswLogin"])){
      $errLogin="Please fill all the blanks";
      $flag=false;
    }
    else{
      $checkPasswordLogin = test_input($_POST["pswLogin"]);
    }

  }



      if(($flag==true) && (isset($_POST['loginButton']))){

      $db = Conn :: getInstance();
      $redirecter = null;

    echo $redirecter;

      $query = $db->prepare("SELECT * FROM USER WHERE userEmail=:mail and userPassword=:password ");
      $fetch = $query->execute(array('mail' => $checkMailLogin, 'password' => $checkPasswordLogin));

      $ifMatch=$query->rowCount();

      if($ifMatch == 1){

       $_SESSION["loggedin"]=true; 


      }
      else if ($ifMatch!=1){
      $_SESSION["loggedin"]=false; 
      }

      $redirecter = $_SESSION["loggedin"];
      echo $redirecter;

      if($redirecter==true){
        $_SESSION["userSession"]=$checkMailLogin;
        Header("Location:../PROJECT/");
        
      }
      else if($redirecter==false){

      Header("Location:../PROJECT/?durum=basarisizgiris");
      echo "Başarısız Giriş";
       
      }



    }
       /*$_SESSION["userSession"]=$checkMailLogin; 

       $var = $_SESSION["userSession"] ;
       echo $var;
       */

                                 
  
  

    
          

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  <div class="containerReg" style="Border:2px solid blue;height: 30; width: 40%; margin: 0 auto;">
    <label for="mailLogin"><b>Mail</b></label></br>
    <input type="text" placeholder="Enter Mail" name="mailLogin" > </br></br>

    <label for="psw"><b>Password</b></label></br>
    <input type="password" placeholder="Enter Password" name="pswLogin" ></br></br>
    <span class="errLogin"><?php echo $errLogin; ?></span>

    <button type="submit" name="loginButton">Login</button> <a href="#"><span class="submitLogin">Forgot password?</span> </a>
   </br></br> 
   <a href="register.php"> <span class="psw">Hemen üye ol?</span> </a>
  </div>


</form>


<?php include'footer.php'; ?>