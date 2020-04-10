<?php include 'includes/header.php'; ?>
    <div id="wrapper">
        <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">CMS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Home Feed</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Categories </a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Comments </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
           
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome to Admin
                            <small>Umair</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <div class="col-xs-6"> 
                    <?php 
                    if(isset($_POST['submit'])){
                    $cat_title = $_POST["cat_title"];
                        if($cat_title == '' || empty($cat_title)){
                            echo "Field should not be empty";
                        }

                    }
                    
                    ?>

                    <form action="categories.php" method= "post">
                          <div class="form-group">
                          <label for="cat-title">Enter a Category</label>
                               <input type="text" class="form-control name="cat_title">
                               <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                               <br/><br/>
                          </div>
                    </form>
                </div> 
                <div class="col-xs-6">
                <?php  
                    $query = "SELECT * FROM categories";
                    $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
                ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Title</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
                    $cat_id = $row['cat_id']; 
                    $cat_title = $row['cat_title']; 
                    echo "<li><td>{$cat_id}</td></li>";   //show the records
                    echo "<li><td>{$cat_title}</td></li>";   //show the records
                    echo "<tr>";
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/footer.php'; ?>