<?php 
if(isset($_GET['edit_user'])){

    $user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $fetchAllusers = mysqli_query($connection , $query);   //execute the query 
    while($row = mysqli_fetch_assoc($fetchAllusers)){   //fetch records from db
    $user_id = $row['user_id']; 
    $username = $row['username'];  
    $user_firstname = $row['user_firstname']; 
    $user_lastname = $row['user_lastname']; 
    $user_email = $row['user_email']; 
    // $user_image = $row['user_image']; 
    $user_role = $row['user_role']; 
    $user_password = $row['user_password'];

    // move_uploaded_file($post_image_tmp,"../images/$post_image"); 
    }

}
if(isset($_POST['update_user'])){
    // $user_id = $_POST['user_id']; 
    $username = $_POST['username'];  
    $user_firstname = $_POST['user_firstname'];  
    $user_lastname = $_POST['user_lastname'];  
    $user_email = $_POST['user_email'];  
    // $post_image = $_FILES['image']['name']; 
    // $post_image_tmp = $_FILES['image']['tmp_name']; 
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y'); 

    // move_uploaded_file($post_image_tmp,"../images/$post_image"); 
    }
    $query = "UPDATE users SET ";
    $query.= "user_firstname = '{$user_firstname}' , ";
    $query.= "user_lastname = '{$user_lastname}' , ";
    $query.= "user_role = '{$user_role}' , ";
    $query.= "username = '{$username}' , ";
    $query.= "user_email = '{$user_email}' , ";
    $query.= "user_password = '{$user_password}' ";
    $query.= "WHERE user_id = {$user_id}";

    $editUserQuery = mysqli_query($connection , $query );
    if(!$editUserQuery){
        echo "Query Failed !" . mysqli_error($connection);
    }

?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="user_firstname">Firstname</label>
<input type="text" value= "<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
</div>
<div class="form-group">
<label for="user_lastname">Lastname</label>
<input type="text" value= "<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>
<label for="user_role">Role</label><br/>

<select name="user_role" id="">
<?php
    echo "<option value='subscriber'> $user_role </option>";
    // echo $user_role;  
    if($user_role=='admin'){
        echo "<option value='subscriber'>subscriber</option>";
    }else{
        echo "<option value='admin'>admin</option>";
    }
?>
       
</select>
<!-- <div class="form-group">
<label for="status">Post Status</label>
<input type="text" class="form-control" name="status">
</div> -->
<!-- <div class="form-group">
<label for="image">User Image</label>
<input type="file"value= "<?php echo $user_image; ?>"  name="image">
</div> -->

<div class="form-group">
<label for="username">Username</label>
<input type="text"value= " <?php echo $username; ?>"  class="form-control" name="username">
</div>
<div class="form-group">
<label for="email">User Email</label>
<input type="email" value= "<?php echo $user_email; ?>" class="form-control" name="user_email">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" value= "<?php echo $user_password; ?>" class="form-control" name="user_password">
</div>
<div>
<input type="submit"class="btn btn-primary" name="update_user" value="Update User">
</div>
</form>