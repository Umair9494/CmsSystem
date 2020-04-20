<table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Author</td>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Status</td>
                    <td>Image</td>
                    <td>Tags</td>
                    <td>Comments</td>
                    <td>Date</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
            <?php showPosts(); ?>
            </tbody>
</table>
<?php 
if(isset($_GET['delete'])){
    $post_id = $_GET['delete'];
    $query = "DELETE FROM posts where post_id = $post_id";
    $queryDelete = mysqli_query($connection, $query);
    if(!$queryDelete){
        echo "Query Failed!" . mysqli_error($connection);
    }
}
?>
