<?php include 'header.php'; ?>
   
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
 <?php 
                                         $db = Conn :: getInstance();
                                         $query = $db->prepare("SELECT * FROM product where productId=:selectedId");
                                         $query->execute(array('selectedId'=>$_GET["productId"])); 
                                         $product=$query->fetch(PDO::FETCH_ASSOC);
                    
                                
                                      {?>


    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="images/products/<?php echo $product['productPhoto'];?>" alt="First slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                  
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $product['productName'];?></h2>
                        <h5> <?php echo $product['productPrice'];?></h5>
                        
                            <p>
                                <h4>Short Description:</h4>
                                <p><?php echo $product['productExp'];?> </p>
                             

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                           <?php if(isset($_SESSION["userSession"])) { ?>
                                          <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                          <a class="btn hvr-hover" data-fancybox-close="" href="">Add to Cart  <input type="hidden" name="productId" value="<?php echo $product['productId'];?>">
                                          <input type="submit" name="addToCart" value="Submit"></a>
                                          </form>
                                          <?php } else{ ?>
                                         <a class="btn hvr-hover" data-fancybox-close="" href="login.php"> Login to Add to Card  <input type="hidden" name="productId" value="<?php echo $recomends['productId'];?>">  </a>   
                                        <?php } ?>
                                
                                    </div>
                                </div>

                    </div>
                </div>
            </div>

 <?php } ?>

  <?php 
                                         $db = Conn :: getInstance();

                                         $query = $db->prepare("SELECT * FROM product where productId=:selectedId");
                                         $query->execute(array('selectedId'=>$_GET["productId"])); 
                                         $product=$query->fetch(PDO::FETCH_ASSOC);
                                         $type = $product['productCategory'];
                                         $alreadySelected = $product['productId'];
                                        

                                         $query2 = $db->prepare("SELECT * FROM product where productCategory=:type AND productId!=:selectedId");
                                         $query2->execute(array('type'=>$type , 'selectedId' => $alreadySelected)); 
                                     
                    
                                
              ?>
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        <?php 
                             while($recomends=$query2->fetch(PDO::FETCH_ASSOC)){?>    
                        <div class="item">
                            
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/products/<?php echo $recomends['productPhoto'];?>" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop-detail.php?productId=<?php echo $recomends['productId'];?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                         
                                          <?php if(isset($_SESSION["userSession"])) { ?>
                                          <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                          <a class="cart" href="">Add to Cart  <input type="hidden" name="productId" value="<?php echo $recomends['productId'];?>">
                                          <input type="submit" name="addToCart" value="Submit"></a>
                                          </form>
                                          <?php } else{ ?>
                                         <a class="cart" href="login.php"> Login to Add to Card  <input type="hidden" name="productId" value="<?php echo $recomends['productId'];?>">  </a>   
                                        <?php } ?>
                                      
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4><?php echo $recomends['productName'];?></h4>
                                    <h5> <?php echo $recomends['productPrice'];?></h5>
                                </div>

                            </div>

                        </div>
                         <?php } ?>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
       

    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <?php include 'footer.php'; ?>