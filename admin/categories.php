<?php ob_start();  //functionality for starting or reloading a page    ?> 
<?php include 'includes/header.php'; ?>
    <div id="wrapper">
        <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

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
                   <?php insert_categories(); ?>
                    <form action="categories.php" method= "post">
                          <div class="form-group">
                          <label for="cat-title">Enter a Category</label>
                               <input type="text" name="cat_title" class="form-control" >
                               <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                               <br/><br/>
                          </div>
                    </form>

                    <?php 
                    if(isset($_GET['edit']))
                    {
                        $cat_id = $_GET['edit'];
                        include "includes/update_categories.php";
                    }
                    ?>
                </div> 
                <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Title</th>
                            <th>Operations</th>
                            <th>Updation</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php showCategories(); ?>
                    <?php deleteCategories(); ?>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/footer.php'; ?>