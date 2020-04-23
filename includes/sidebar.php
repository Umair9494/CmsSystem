<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </form>
    </div>
    <!-- /.input-group -->
</div>


<!-- Login -->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
        </div>  
        <div class="form-group">
          <span class="input-group-btn">
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
            <input name="login" class="btn btn-primary" type="submit">Submit</input>
          </span>
        </div>   
    </form>
</div>
    <!-- /.input-group -->

<!-- Blog Categories Well -->
<div class="well">


    <?php  
        $query = "SELECT * FROM categories";
        $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
    ?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                 while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
                    $cat_title = $row['cat_title']; 
                    $cat_id = $row['cat_id']; 
                    echo "<li><a href=' category.php?category= $cat_id'>{$cat_title}</a></li>";   //show the records
                    }
                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include 'includes/widget.php';?>

</div>
