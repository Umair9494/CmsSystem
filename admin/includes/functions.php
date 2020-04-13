<?php
function insert_categories(){ 
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

function showCategories(){
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

function deleteCategories(){
        global $connection;
        //deleting categories
        if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories where cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location:categories.php");   //tells where the header is point after reloading
        }
}

function showPosts(){
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
        echo "<td> $post_category_id </td>";
        echo "<td> $post_status </td>"; 
        echo "<td> <img width='100' class='img-responsive' src='../images/$post_image' alt='image'> </td>";
        echo "<td> $post_tags </td>";
        echo "<td> $post_comment_count </td>";
        echo "<td> $post_date </td>";
    echo "</tr>";
    }

}
 ?>


