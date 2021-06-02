<?php
include_once "../includes/db_conn.php";
include_once "../includes/utilities.inc.php";
include_once "../includes/func.inc.php";
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pet Kingdom</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font/bootstrap-icons.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">


    <link href="../css/sidebars.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
</head>

<body>
    <!-- <div class="container-fluid">
        <div class="row">
            <main>  -->
            <div class="row" id="NavigationPanel">
            <!-- Navigation Bar -->
            <nav class="navbar fixed-top navbar-expand-lg bg-success text-white shadow-sm">
                <div class="container-fluid">
                    <a href="index.php" class="navbar-brand btn btn-success pb-3D">
                        <i class="bi bi-house"></i>
                    </a>
                    <button class="navbar-toggler btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bi bi-list"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <!--Navigation button to show the form to add item button-->
                                <a class="nav-link btn btn-success" data-bs-toggle="collapse" href="#addItemForm" role="button" aria-expanded="false" aria-controls="addItemForm">
                                    Add Item <i class="bi bi-plus-circle"></i>
                                </a>
                            </li>
                           <!--  <li class="nav-item"> -->
                                <!--Navigation button to show the form to add item button-->
                                <!-- <a class="nav-link btn btn-no-border-orange" data-bs-toggle="collapse" href="#addCategory" role="button" aria-expanded="false" aria-controls="addCategory">
                                    New Category <i class="bi bi-plus-circle"></i>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <!--Navigation button to show the form to add item button-->
                                <a class="nav-link btn btn-success" href="SalesDashboard.php">
                                    Sales Dashboard <i class="bi bi-graph-up"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <!--Navigation button to show the form to add item button-->
                                <a class="nav-link btn btn-success" href="orders.php">
                                    Orders <i class="bi bi-person-lines-fill"></i>
                                </a>
                            </li>
                            <!-- <li class="nav-item"> -->
                                <!--Navigation button to show the form to add item button-->
                                <!-- <a class="nav-link btn btn-no-border-orange" data-bs-toggle="collapse" href="#addCategoryForm" role="button" aria-expanded="false" aria-controls="SalesDashboard">
                                    Customers <i class="bi bi-person-lines-fill"></i>
                                </a>
                            </li> -->
                            <li class="nav-item"></li>
                        </ul>
                        <!--Search Bar-->
                        <a href="../includes/processlogout.php" class="nav-link btn float-end">
                            <i class="bi bi-power"></i> Logout
                        </a>

                        <form action="index.php" method="GET">
                            <div class="input-group">
                                <input id="searchbar" name="searchkey" type="text" class="form-control" placeholder="search">
                                <button class="btn btn-outline-primary"> Search <i class="bi bi-search"></i> </button>
                            </div>
                        </form>
                        <!--Search Bar-->
                    </div>
                </div>
            </nav>
            <!--end Navigation Bar -->
        </div>

                <div class="container">
                    <div class="row">
                <div class="flex-shrink-0 p-3 bg-white col-2">
                    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <svg class="bi me-2" width="30" height="24">
                            <use xlink:href="#bootstrap" />
                        </svg>
                        <!-- <li><a href="index.php" class="link-dark rounded">Orders</a></li> -->
                    </a> 
                </div>

        <div class="container-fluid">
            <div class="row">
                <main>
                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white col-3">
                    <span class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-4 fw-semibold"> Pending Orders</span>
                        <?php
                if(isset($_GET['confirm_order'])){
                    $ord_num = cleanstr($_GET['confirm_order']);
                    update($conn, 'cart', 
                           array('status'=>'W','last_update_date'=> date("Y-m-d")),
                           array('order_ref_num' => $ord_num, 'status' => 'C' ),
                           array('AND')
                          );
                }
                
                if(isset($_GET['deliver_order'])){
                    $ord_num = cleanstr($_GET['deliver_order']);
                    update($conn, 'cart', 
                           array('status'=>'X','last_update_date'=> date("Y-m-d")),
                           array('order_ref_num' => $ord_num, 'status' => 'W' ),
                           array('AND')
                          );
                }
                ?>
                    </span>
                    <div class="list-group list-group-flush border-bottom scrollarea">
                        <?php 
            $orders = getOrderList($conn,'C');
            foreach($orders as $ko => $or) { ?>

                        <span class="list-group-item list-group-item-action  py-3 lh-tight" aria-current="true">
                            <div class="d-flex w-100 align-items-center justify-content-between">

                                <strong class="mb-1">
                                    <a href="?confirm_order=<?php echo $or['order_ref_num'] ; ?>" class="btn  btn-outline-success btn-sm"><i class=" bi bi-check"></i></a>
                                    <?php echo $or['order_ref_num'];?>
                                    <span class="badge rounded-pill bg-secondary"><?php echo nf2($or['total_amt_to_pay']);?></span>

                                </strong>
                                <small><?php echo $or['date_ordered'];?></small>
                            </div>
                            <div class="col-12 mb-1 small">
                                <div class="list-group">

                                    <?php
                            $order_details = getCartList($conn, $or['order_ref_num'],'C');
                            foreach($order_details as $odK => $or_d){ ?>
                                    <span class="list-group-item">
                                        <span class="badge rounded-pill bg-danger"><?php echo $or_d['total_item_qty']; ?></span>

                                        <?php echo $or_d['item_name']; ?>
                                    </span>
                                    <?php }
                            ?>

                                </div>
                            </div>
                        </span>

                        <?php }
            ?>

                    </div>
                </div>


                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white col-3">
                    <span class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-4 fw-semibold">Processing Orders</span>
                    </span>
                    <div class="list-group list-group-flush border-bottom scrollarea">
                        <?php 
            $orders = getOrderList($conn,'W');
            foreach($orders as $ko => $or) { ?>

                        <span class="list-group-item list-group-item-action  py-3 lh-tight" aria-current="true">
                            <div class="d-flex w-100 align-items-center justify-content-between">

                                <strong class="mb-1">
                                    <a href="?deliver_order=<?php echo $or['order_ref_num'] ; ?>" class="btn  btn-outline-primary btn-sm"><i class=" bi bi-check"></i></a>
                                    <?php echo $or['order_ref_num'];?>
                                    <span class="badge rounded-pill bg-info"><?php echo nf2($or['total_amt_to_pay']);?></span>

                                </strong>
                                <small><?php echo $or['last_update_date'];?></small>
                            </div>
                            <div class="col-12 mb-1 small">
                                <div class="list-group">

                                    <?php
                            $order_details = getCartList($conn, $or['order_ref_num'],'W');
                            foreach($order_details as $odK => $or_d){ ?>
                                    <span class="list-group-item">
                                        <span class="badge rounded-pill bg-info"><?php echo $or_d['total_item_qty']; ?></span>

                                        <?php echo $or_d['item_name']; ?>
                                    </span>
                                    <?php }
                            ?>

                                </div>
                            </div>
                        </span>

                        <?php }
            ?>

                    </div>
                </div>



                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white col-3 shadow">
                    <span class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-4 fw-semibold">Delivered Orders</span>
                    </span>
                    <div class="list-group list-group-flush border-bottom scrollarea">
                        <?php 
                        $orders = getOrderList($conn,'X');
                        foreach($orders as $ko => $or) { ?>
                        <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class=""><span class="text-light fw-bold badge bg-secondary"><?php echo nf2($or['total_amt_to_pay']);?></span></strong>
                                <?php echo $or['order_ref_num'];?>
                                <small><?php echo $or['last_update_date'];?></small>
                            </div>
                            <div class="col-12 small collapse show">
                                <div class="list-group">
                                    <?php
                                    $order_details = getCartList($conn, $or['order_ref_num'],'X');
                                    foreach($order_details as $odK => $or_d){ ?>
                                    <span class="list-group-item">
                                        <span class="text-success"> <i class="bi bi-check"></i></span> <span class="badge bg-success"><?php echo $or_d['total_item_qty']; ?></span>
                                        <?php echo $or_d['item_name']; ?>
                                    </span>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
</div>
</div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../css/sidebars.js"></script>
</body>

</html>
