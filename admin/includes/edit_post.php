<?php 
if(isset($_GET['p_id'])){
$edit_postid = $_GET['p_id'];
}
$query = "SELECT * FROM posts where post_id = $edit_postid ";
$fetchEditpost = mysqli_query($connection , $query);   //execute the query 
while($row = mysqli_fetch_assoc($fetchEditpost)){   //fetch records from db
      $post_id = $row['post_id']; 
      $post_author = $row['post_author']; 
      $post_title = $row['post_title']; 
      $post_category_id = $row['post_category_id']; 
      $post_status = $row['post_status']; 
      $post_image = $row['post_image']; 
      $post_content = $row['post_content']; 
      $post_tags = $row['post_tags']; 
      $post_comment_count = $row['post_comment_count']; 
      $post_date = $row['post_date']; 
      }
      if(isset($_POST['update_post'])){
      $post_id = $_POST['post_id']; 
      $post_title = $_POST['title'];  
      $post_author = $_POST['author'];  
      $post_category_id = $_POST['post_category'];  
      $post_status = $_POST['status'];  
      $post_image = $_FILES['image']['name']; 
      // $post_image_tmp = $_FILES['image']['tmp_name']; 
      $post_tags = $_POST['tags'];
      $post_content = $_POST['post_content'];
      $post_comment_count = $_POST['post_comment_count'];
      $post_date = date('d-m-y'); 

      move_uploaded_file($post_image_tmp,"../images/$post_image"); 

      $query = "UPDATE posts SET ";
      $query.= "post_title = '{$post_title}' , ";
      $query.= "post_author = '{$post_author}' , ";
      $query.= "post_category_id = '{$post_category_id}' , ";
      $query.= "post_status = '{$post_status}' , ";
      $query.= "post_image = '{$post_image}' , ";
      $query.= "post_tags = '{$post_tags}' , ";
      $query.= "post_content = '{$post_content}' , ";
      $query.= "post_comment_count = '{$post_comment_count}' , ";
      $query.= "post_date =  now()  ";
      $query.= "WHERE post_id = {$post_id} ";

      $updateQuery = mysqli_query($connection,$query);
      if(!$updateQuery){
        echo "Query ERROR!" . mysqli_error($connection);
      }
  }
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Title</label>
<input type="text" value= "<?php echo $post_title; ?>" class="form-control" name="title">
</div>
<div class="form-group">
<label for="post_category">Post Category Id</label><br/>
<select name="post_category" id="post_category">
                  <?php 
                  $query = "SELECT * FROM categories";
                  $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
                  if(!$fetchAllRecords){
                  echo "Query Failed!" . mysqli_error($connection);
                  }
                  while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
                  $cat_id = $row['cat_id']; 
                  $cat_title = $row['cat_title']; 
                  echo "<option value='{$cat_id}'>{$cat_title}</option>";
                  }
                  ?>
</select>
</div>
<div class="form-group">
<label for="author">Post Author</label>
<input type="text" value= "<?php echo $post_author; ?>" class="form-control" name="author">
</div>
<div class="form-group">
<label for="status">Post Status</label>
<input type="text" value= "<?php echo $post_status; ?>" class="form-control" name="status">
</div>
<div class="form-group">
<label for="image">Post Image</label>
<img width=100 type= "file" src="../images/<?php echo $post_image; ?>" alt="" name="image">
</div>
<div class="form-group">
<label for="tags">Post Tags</label>
<input type="text" value= "<?php echo $post_tags; ?>" class="form-control" name="tags">
</div>
<div class="form-group">
<label for="content">Post Content</label>
<textarea class="form-control"  name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
</div>
<div>
<input type="submit" class="btn btn-primary" name="update_post" value="Publish Post">
</div>
</form>