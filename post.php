<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>
    <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>    
        <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php if(isset($_GET['p_id'])){ $p_id = $_GET['p_id']; } ?>
            <?php  
                $query = "SELECT * FROM posts WHERE post_id = $p_id ";
                $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
                while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
                    $post_title = $row['post_title']; 
                    $post_author = $row['post_author']; 
                    $post_date = $row['post_date']; 
                    $post_image = $row['post_image']; 
                    $post_content = $row['post_content']; 
                
            ?>
            
                  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
             <?php    }   ?>

            
             
                <!-- Blog Comments -->
                    <?php 
                    if(isset($_POST['create_comment'])){
                        $p_id = $_GET['p_id']; 
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        $queryInsertComment = "INSERT INTO comments 
                                                (comment_post_id,comment_author,
                                                comment_email,comment_content,
                                                comment_status,comment_date)";
                        $queryInsertComment .= "VALUES ($p_id,'{$comment_author}',
                                             '{$comment_email}','{$comment_content}',
                                                'unapproved', now())";
                        $createCommentQuery = mysqli_query($connection, $queryInsertComment);
                        // if($createCommentQuery){
                        // die('Query Failed1!' . mysqli_error($connection));
                        // }
                        $queryCommentCount = " UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $p_id ";
                        $updateCommentCount = mysqli_query($connection , $queryCommentCount);
                        if(!$queryCommentCount){
                            die('Query Failed2!' . mysqli_error($connection));
                        }
                       }
                    ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                        <label for="author">Author</label>
                             <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                             <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                        <label for="comment">Your Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                    <?php 
                    $query = " SELECT * FROM comments WHERE comment_post_id = {$p_id} AND comment_status = 'Approve' ORDER BY comment_id DESC ";
                    $selectComment = mysqli_query($connection, $query);
                     if(!$selectComment){
                        die('Query Failed!' . mysqli_error($connection));
                     }
                     while($row = mysqli_fetch_assoc($selectComment)){
                         $comment_author = $row['comment_author'];
                         $comment_content = $row['comment_content'];
                         $comment_date = $row['comment_date'];
                    ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?>
                        </h4>
                       <?php echo $comment_content; ?>
                    </div>
                </div>
                    <?php } ?>

                <!-- Comment -->
                 
            </div>
            <!-- Blog Sidebar Widgets Column -->

            <?php include 'includes/sidebar.php'; ?>


        </div>
        <!-- /.row -->

        <hr>
<?php include 'includes/footer.php';?>