<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title> Moda Kundura </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">





    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
ob_start();
include 'conn.php';
$db = Conn :: getInstance();


?>

<?php include 'cart.php';?>


    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo2.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.html">Ana Sayfa</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">Hakkımızda</a></li>
                           <li class="dropdown">
                            <a href="shop.php" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.php?category=women">Kadın</a></li>
                                <li><a href="shop.php?category=man">Erkek</a></li>
                            </ul>
                        </li>

                        </li> 
                  
                        <li class="nav-item"><a class="nav-link" href="iletişim.html">İletişim</a></li>
                        <?php if(isset($_SESSION["userSession"])) { ?>

                        <li class="nav-item"><a class="nav-link" href="logout.php"> <?php echo $_SESSION['userSession']; ?> </br> Çıkış Yap  </a></li>
                         <?php } else{ ?>

                            <li class="nav-item"><a class="nav-link" href="login.html">  Giris / Kayıt  </a></li>
                        

                       <?php  }  ?>
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa-2x fa fa-shopping-bag"></i>

					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php 
                    $db = Conn :: getInstance();  
                      $query = $db->prepare("SELECT * FROM user where userEmail=:Email");
                      $query->execute(array('Email'=>$_SESSION["userSession"])); 
                      $user=$query->fetch(PDO::FETCH_ASSOC);   


                      $carts = $db->prepare("SELECT * FROM cart WHERE userId=:Id");
                      $fetch = $carts->execute(array('Id' => $user['userId']));

                      ?>

                        <?php   while($fetched = $carts->fetch(PDO::FETCH_ASSOC))   {?>

                        <?php 

                        $product = $db->prepare("SELECT * FROM product where productId=:pId");
                        $product->execute(array('pId'=>$fetched['productId'])); 
                        $selectedProduct=$product->fetch(PDO::FETCH_ASSOC);   
                         ?>
                     
                        <li>
                            
                            <a href="#" class="photo"><img src="images/products/<?php echo $selectedProduct['productPhoto'];?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo $selectedProduct['productName'];?> </a></h6>
                            <p> <?php echo $fetched['productQuantity']."x";?><span class="price"> <?php echo $fetched['price']."TL";?></span></p>
                            <form  method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="productId" value="<?php echo $selectedProduct['productId'];?>">
                            <input type="hidden" name="userId" value="<?php echo $user['userId'];?>">
                            <input  type="submit" name="deleteToCart" value="Delete Item"></a> 
                            </form>
                        </li>
                    
                      <?php $totalPrice = $totalPrice+$fetched['price'] ?> 
                     <?php  }  ?>


                      <?php  if(!isset($_SESSION["userSession"])) { ?>
                      <li class="total">
                            <a href="login.php" class="btn btn-default hvr-hover btn-cart">Please Login To Show Cards</a>
                          
                        </li>
                    <?php } else { ?>
                      <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">BUY</a>
                            <span class="float-right"><strong>Total</strong><?php echo " ".$totalPrice." TL";?></span>
                        </li>

                      <?php  }  ?>    

                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <form method="get" action="shop.php">  
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <button type="submit">Search</button> <a href="#"> </a>
                <!--<span class="input-group-addon"><i class="fa fa-search"></i></span> -->
                <input type="text" name="search" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span> 
               
                
            </div>
        </div>
    </div>
     </form>
    <!-- End Top Search -->