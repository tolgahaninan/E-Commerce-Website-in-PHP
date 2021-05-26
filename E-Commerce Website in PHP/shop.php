<?php include 'header.php'; ?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form method="get" action="shop.php"> 
                                <input class="form-control" placeholder="Search here..." type="text" name="search">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                   
   

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                   <div class="row">  

                                    <?php 
                                         $db = Conn :: getInstance();
                                        $query = $db->prepare("SELECT * FROM product");
                                        $query->execute();
                                        
                                        if(isset($_GET["category"])){
                                           
                                            $var = $_GET["category"] ;
                                      
                                            $query = $db->prepare("SELECT * FROM product where productCategory=:category");
                                            $query->execute(array('category' => $_GET["category"]));
                                        }
            
                                        else if(isset($_GET["search"])){

                                            $query = $db->prepare("SELECT * FROM product WHERE productName like ?");
                                            $query->execute(array("%$_GET[search]%"));

                                        }
                                        else{

                                            $query = $db->prepare("SELECT * FROM product");
                                            $query->execute();

                                        }
                                       


                                     ?>    

                                     <?php 

                                      while($products=$query->fetch(PDO::FETCH_ASSOC)){?>    

                                          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src= "images/products/<?php echo $products['productPhoto'];?>"class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="shop-detail.php?productId=<?php echo $products['productId'];?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                            <?php if(isset($_SESSION["userSession"])) { ?>
                                                        <a class="cart" href="">Add to Cart  <input type="hidden" name="productId" value="<?php echo $products['productId'];?>">
                                                         <input type="submit" name="addToCart" value="Submit"></a>
                                                        <?php } else{ ?>
                                                         <a class="cart" href="login.php"> Login to Add to Card  <input type="hidden" name="productId" value="<?php echo $products['productId'];?>">
                                                         </a>   
                                                         <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $products['productName'];  ?></h4>
                                                    <h5> <?php echo $products['productPrice'];  ?> </h5>
                                                </div>
                                            </div>
                                        </div>

                                <?php } ?>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- End Shop Page -->

    <?php include 'footer.php'; ?>