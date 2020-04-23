<?php
function insert_categories(){  //insert categories 
        global $connection; 
        if(isset($_POST['submit']))
        {
        $cat_title = $_POST["cat_title"];
        if($cat_title == '' || empty($cat_title)){
        echo "Field should not be empty";
        }
        else
        {
        $queryInsert = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}') ";
        $queryCreateCategory = mysqli_query($connection , $queryInsert);
        if(!$queryCreateCategory){
        die('QUERY FAILED !' . mysqli_error($connection));
        }
        }
        }
        }

function showCategories(){   //showing categories
        global $connection;
        $query = "SELECT * FROM categories";
        $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
        while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
        $cat_id = $row['cat_id']; 
        $cat_title = $row['cat_title']; 
        echo "<li><td>{$cat_id}</td></li>";   //show the records in id
        echo "<li><td>{$cat_title}</td></li>";   //show the records in title
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";   //show the records
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>"; 
        echo "<tr>";
        }
        }

function deleteCategories(){  //deleting categories
        global $connection;
        //deleting categories
        if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories where cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location:categories.php");   //tells where the header is point after reloading
        }
}

function showPosts() //showing data of all posts 
{
    global $connection;
    $query = "SELECT * FROM posts";
    $fetchAllposts = mysqli_query($connection , $query);   //execute the query 
    while($row = mysqli_fetch_assoc($fetchAllposts)){   //fetch records from db
    $post_id = $row['post_id']; 
    $post_author = $row['post_author']; 
    $post_title = $row['post_title']; 
    $post_category_id = $row['post_category_id']; 
    $post_status = $row['post_status']; 
    $post_image = $row['post_image']; 
    $post_tags = $row['post_tags']; 
    $post_comment_count = $row['post_comment_count']; 
    $post_date = $row['post_date']; 

    echo "<tr>";
        echo "<td> $post_id </td>";
        echo "<td> $post_author </td>";
        echo "<td> $post_title </td>";
        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
        while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
        $cat_id = $row['cat_id']; 
        $cat_title = $row['cat_title']; 
        }
        echo "<td> {$cat_title} </td>";
        echo "<td> $post_status </td>"; 
        echo "<td> <img width='100' class='img-responsive' src='../images/$post_image' alt='image'> </td>";
        echo "<td> $post_tags </td>";
        echo "<td> $post_comment_count </td>";
        echo "<td> $post_date </td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";       
    echo "</tr>";
    }

    
}
function showComments() //showing data of all posts 
{
    global $connection;
    $query = "SELECT * FROM comments";
    $fetchComments = mysqli_query($connection , $query);   //execute the query 
    while($row = mysqli_fetch_assoc($fetchComments)){   //fetch records from db
    $comment_id = $row['comment_id']; 
    $comment_post_id = $row['comment_post_id']; 
    $comment_author = $row['comment_author']; 
    $comment_content = $row['comment_content'];
    $comment_email = $row['comment_email'];  
    $comment_status = $row['comment_status']; 
    $comment_date = $row['comment_date']; 
    
        echo "<tr>";
        echo "<td> $comment_id </td>";
        // echo "<td> $comment_post_id  </td>";
        echo "<td> $comment_author </td>";
        echo "<td> $comment_content </td>";
        // $query = "SELECT * FROM comments";
        // $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
        // while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
        // $cat_id = $row['cat_id']; 
        // $cat_title = $row['cat_title']; 
        // }
        echo "<td> $comment_email </td>";
        echo "<td> $comment_status </td>"; 

        $queryPostComment = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $queryComment = mysqli_query($connection,$queryPostComment);
        while($row = mysqli_fetch_assoc($queryComment)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }

        echo "<td> $comment_date </td>";
        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";       
        // echo "<td><a href='posts.php?source=edit_post&p_id='>Edit</a></td>";
        echo "<td><a href='comments.php?deleteComment=$comment_id'>Delete</a></td>";       
        echo "</tr>";
    }
}
function showUsers() //showing data of all posts 
{
    global $connection;
    $query = "SELECT * FROM users";
    $fetchAllusers = mysqli_query($connection , $query);   //execute the query 
    while($row = mysqli_fetch_assoc($fetchAllusers)){   //fetch records from db
    $user_id = $row['user_id']; 
    $username = $row['username'];  
    $user_firstname = $row['user_firstname']; 
    $user_lastname = $row['user_lastname']; 
    $user_email = $row['user_email']; 
    // $user_image = $row['user_image']; 
    $user_role = $row['user_role']; 

    echo "<tr>";
        echo "<td> $user_id </td>";
        echo "<td> $username </td>";
        echo "<td> $user_firstname </td>";
        // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        // $fetchAllRecords = mysqli_query($connection , $query);   //execute the query 
        // while($row = mysqli_fetch_assoc($fetchAllRecords)){   //fetch records from db
        // $cat_id = $row['cat_id']; 
        // $cat_title = $row['cat_title']; 
        // }
        echo "<td> $user_lastname </td>";
        echo "<td> $user_email </td>"; 
        // echo "<td> <img width='100' class='img-responsive' src='../images/$user_image' alt='image'> </td>";
        echo "<td> $user_role </td>";
        // echo "<td> $post_comment_count </td>";
        // echo "<td> $post_date </td>";
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?deleteUsers={$user_id}'>Delete</a></td>";       
    echo "</tr>";
    }   
}
 ?>


