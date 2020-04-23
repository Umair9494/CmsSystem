<?php 
if(isset($_POST['create_user'])){
    $user_firstname = $_POST['user_firstname']; 
    $user_lastname = $_POST['user_lastname']; 
    $user_role = $_POST['user_role']; 

    $post_image = $_FILES['image']['name'];
    $post_image_tmp = $_FILES['image']['tmp_name']; 

    $username = $_POST['username']; 
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y'); 

    move_uploaded_file($post_image_tmp,"../images/$post_image"); //move upload function from temporary location to the stored locationed file
    // post_tags,post_status  
    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password)";
    $query .= "VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";
    // echo $query;
    $addUser = mysqli_query($connection,$query);
    if(!$addUser){
        echo "Query Failed" . mysqli_error($connection);
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="user_firstname">Firstname</label>
<input type="text" class="form-control" name="user_firstname">
</div>
<div class="form-group">
<label for="user_lastname">Lastname</label>
<input type="text" class="form-control" name="user_lastname">
</div>
<label for="user_role">Role</label><br/>
<select name="user_role" id="">
        <option value="subscriber">Select Option</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
</select>
<!-- <div class="form-group">
<label for="status">Post Status</label>
<input type="text" class="form-control" name="status">
</div> -->
<div class="form-group">
<label for="image">User Image</label>
<input type="file" name="image">
</div>

<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" name="username">
</div>
<div class="form-group">
<label for="email">User Email</label>
<input type="email" class="form-control" name="user_email">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" name="user_password">
</div>
<div>
<input type="submit"class="btn btn-primary" name="create_user" value="Create User">
</div>
</form>