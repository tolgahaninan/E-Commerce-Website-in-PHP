<?php 


if(isset($_POST["addToCart"])){



    if(!empty($_SESSION["userSession"])){

      $db = Conn :: getInstance();  
      $query = $db->prepare("SELECT * FROM user where userEmail=:Email");
      $query->execute(array('Email'=>$_SESSION["userSession"])); 
      $user=$query->fetch(PDO::FETCH_ASSOC);    

      $userId= $user['userId'];
      $productId=$_POST["productId"];

      echo "UserId".$userId."productId:".$productId;

      $query3 = $db->prepare("SELECT * FROM cart WHERE userId=:Id and productId=:pId and productQuantity>0 ");
      $fetch = $query3->execute(array('Id' => $userId, 'pId' => $productId));
      $fetched = $query3->fetch(PDO::FETCH_ASSOC);

      $ifFetched=$query3->rowCount();


  		$priceQuery = $db->prepare("SELECT * FROM product WHERE productId=:prodId ");
		$priceQuery->execute(array('prodId'=>$productId));
		$forPrice=$priceQuery->fetch(PDO::FETCH_ASSOC); 


	  if( $ifFetched > 0){
	  
		

		  $updatedQuantity = $fetched['productQuantity'] + 1 ;
		  $price= $updatedQuantity * $forPrice['productPrice'];
		  echo "price=".$price;
	
	  	$query2 = $db->prepare("UPDATE cart SET productQuantity=:newProductQuantity , price=:newPrice where userId=:Id and productId=:pId");
		$insert=$query2->execute(array('newProductQuantity'=> $updatedQuantity,'newPrice'=> $price, 'Id' => $userId , 'pId' => $productId));

	  }
	  else{
	  	$query2 = "INSERT INTO cart (userId,productId,productQuantity,price) VALUES (?,?,?,?)";
		$db->prepare($query2)->execute([$userId, $productId ,1 ,$forPrice['productPrice']]);


	  }

    }

}

if(isset($_POST["deleteToCart"])){

	


      $db = Conn :: getInstance();  
      echo "UserId=".$_POST['userId'];
      echo "productId=".$_POST['productId'];
      $delete = $db->prepare("DELETE FROM cart where userId=:deleteId and productId=:deletePId");
      $delete->execute(array('deleteId'=> $_POST['userId'],'deletePId'=> $_POST['productId'])); 


	


	}

?>