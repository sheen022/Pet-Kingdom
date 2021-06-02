    <!-- Navigation Bar -->
    <nav class="navbar bg-success navbar-expand-lg text-light shadow fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <button class="navbar-toggler btn btn-no-outline-orange" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bi bi-list"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto">
                            <li class="nav-item align-middle pt-2">
                                <a class="navbar-brand btn-success btn" href="index.php">
                                    <i class="bi bi-bootstrap-reboot"></i>
                                </a>
                            </li>

                            <?php 
                   $cat_nav = getCategories($conn); 
                   if(!empty($cat_nav) || $cat_nav !== false){
                       foreach($cat_nav as $cat_key => $cat_val){?>
                            <li class="nav-item">
                                <a href="index.php#cat<?php echo $cat_val['cat_id'];?>" class="nav-dark btn btn-success btn"> <?php echo $cat_val['cat_desc'];?> </a>
                            </li>
                            <?php }
                   }
                   ?>


                            <!--Navigation button to show the form to add item button--->

                        </ul>
                        <!--Search Bar-->
                        <a href="#" class="nav-link btn float-end" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="userprofile">
                            <i class="bi bi-person"></i> <?php echo getUserFullName($conn,$_SESSION['user_id']); ?>
                        </a>
                        <a href="../includes/processlogout.php" class="nav-link btn float-end">
                            <i class="bi bi-power"></i> Logout
                        </a>
                        <?php
                     if(isset($_GET['deletecartitem'])){
                         if(deleteCartItem($conn,htmlentities($_GET['deletecartitem']),$_SESSION['user_id']) !== false){ ?>
                        <div class="badge bg-danger">Cart Item Removed.</div>
                        <?php }
                     }
                     if(isset($_GET['confirmcartitem'])){
                         if(confirmCartItem($conn,htmlentities($_GET['confirmcartitem']),$_SESSION['user_id']) !== false){ ?>
                        <div class="badge bg-success">Cart Item Confirmed <i class="bi bi-check"></i> </div>
                        <?php }
                     }
                     if(isset($_GET['unconfirmcartitem'])){
                         if(unconfirmCartItem($conn,htmlentities($_GET['unconfirmcartitem']),$_SESSION['user_id']) !== false){ ?>
                        <div class="badge bg-success">Cart Item Unconfirmed<i class="bi bi-check"></i> </div>
                        <?php }
                     }
                       
                     if($page == 'index'){
                     ?>

                        <a href="#cartList" class="nav-link btn float-end" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="cartList">
                            <i class="bi bi-cart"></i> Cart
                            <span class="badge bg-danger">
                                <?php echo getCartCount($conn,$_SESSION['user_id']);?>
                            </span>

                        </a>
                        <a href="#" class="inline nav-link btn btn-no-border-orange float-end">
                            <i class="bi bi-app-indicator"></i>
                        </a>
                        <form action="index.php" method="GET">
                            <div class="input-group inline">
                                <input id="searchbar" name="searchkey" type="text" class="form-control" placeholder="search">
                                <button class="btn btn-no-outline-primary"> Search <i class="bi bi-search"></i> </button>
                            </div>
                        </form>

                        <?php } ?>
                        <!--Search Bar-->
                    </div>
                </div>
                <?php  if($page == 'index'){ ?>
                <div class="col-lg-12 border-top border-light">
                    <span class="badge bg-success text-light float-end fs-6">

                        <?php $summary = getCartSummary($conn, $_SESSION['user_id']); 
                                    if(!empty($summary)){
                                        foreach($summary as $key => $nval){
                                           echo "Cart: ". $nval['total_qty'] . " pcs (Php ". number_format($nval['total_price'],2) . ")";  
                                             ?>
                        <a href="checkout.php" class="btn btn-outline-dark border-1 text-light"> Checkout <i class="bi bi-chevron-right"></i> </a>
                        <?php 
                                        }
                                    }
                                    ?>
                    </span>
                </div>
                <?php } ?>
            </div>

        </div>
        <br>


    </nav>
    <!--end Navigation Bar -->
