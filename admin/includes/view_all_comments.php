<table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <!-- <td>Comment ID</td> -->
                    <td>Author</td>
                    <td>Comment</td>
                    <td>Email</td>
                    <td>Status</td>
                    <td>In Response to</td>
                    <td>Date</td>
                    <td>Approve</td>
                    <td>Unapprove</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
            <?php showComments(); ?>
            </tbody>
</table>
<?php 
if(isset($_GET['deleteComment'])){
    $comment_Delete = $_GET['deleteComment'];
    $query = "DELETE FROM comments WHERE comment_id = $comment_Delete";
    $queryDelete = mysqli_query($connection, $query);
    // if(!$queryDelete){
    //     echo "Query Failed!" . mysqli_error($connection);
    // }
    header("Location:comments.php");
}
if(isset($_GET['unapprove'])){
    $commentUnapprove = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = $commentUnapprove ";
    $unapproveComment = mysqli_query($connection, $query);
    // if(!$queryDelete){
    //     echo "Query Failed!" . mysqli_error($connection);
    // }
    header("Location:comments.php");
}

if(isset($_GET['approve'])){
    $commentApprove = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approve' WHERE comment_id = $commentApprove ";
    $approveComment = mysqli_query($connection, $query);
    // if(!$queryDelete){
    //     echo "Query Failed!" . mysqli_error($connection);
    // }
    header("Location:comments.php");
}
?>
