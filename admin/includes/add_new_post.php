<?php 
if(isset($_POST['create_post'])){
    $post_title = $_POST['title']; 
    $post_author = $_POST['author']; 
    $post_category_id = $_POST['post_category_id']; 
    $post_status = $_POST['status']; 
    $post_image = $_FILES['image']['name'];
    $post_image_tmp = $_FILES['image']['tmp_name']; 
    $post_tags = $_POST['tags']; 
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y'); 

    move_uploaded_file($post_image_tmp,"../images/$post_image"); //move upload function from temporary location to the stored locationed file
    
    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
    $query.= "VALUES ({$post_category_id},'{$post_title}','{$post_author}', now() ,'{$post_image}','{$post_content}', '{$post_tags}','{$post_status}')";
    $addPost = mysqli_query($connection,$query);
    if(!$addPost){
        echo "Query Failed !" . mysqli_error($connection);
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Title</label>
<input type="text" class="form-control" name="title">
</div>
<div class="form-group">
<label for="post_category">Post Category Id</label>
<input type="text" class="form-control" name="post_category_id">
</div>
<div class="form-group">
<label for="author">Post Author</label>
<input type="text" class="form-control" name="author">
</div>
<div class="form-group">
<label for="status">Post Status</label>
<input type="text" class="form-control" name="status">
</div>
<div class="form-group">
<label for="image">Post Image</label>
<input type="file" name="image">
</div>
<div class="form-group">
<label for="tags">Post Tags</label>
<input type="text" class="form-control" name="tags">
</div>
<div class="form-group">
<label for="content">Post Content</label>
<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>
<div>
<input type="submit"class="btn btn-primary" name="create_post" value="Publish Post">
</div>
</form>