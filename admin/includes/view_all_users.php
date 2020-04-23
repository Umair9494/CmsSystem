<table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <!-- <td>Date</td> -->
                </tr>
            </thead>
            <tbody>
            <?php showUsers(); ?>
            </tbody>
</table>
<?php 
if(isset($_GET['deleteUsers'])){
    $deleteUsers = $_GET['deleteUsers'];
$query = "DELETE FROM users WHERE user_id = {$deleteUsers}";
    $queryDelete = mysqli_query($connection, $query);
    // if(!$queryDelete){
    //     echo "Query Failed!" . mysqli_error($connection);
    // }
    header("Location:users.php");
}
if(isset($_GET['change_to_admin'])){
    $changeAdmin = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $changeAdmin ";
    $changeAdminQuery = mysqli_query($connection, $query);
    // if(!$queryDelete){
    //     echo "Query Failed!" . mysqli_error($connection);
    // }
    header("Location:users.php");
}

if(isset($_GET['change_to_subscriber'])){
    $change_to_subscriber = $_GET['change_to_subscriber'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $change_to_subscriber";
    $change_to_subscriberQuery = mysqli_query($connection, $query);
    // if(!$queryDelete){
    //     echo "Query Failed!" . mysqli_error($connection);
    // }
    header("Location:comments.php");
}
?>
