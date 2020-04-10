<?php
include 'db.php';
?>
<?php
function showAllData()
{
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection , $query);
    if(!$result){
        die('Query FAILED!'. mysqli_error());
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

function createRows(){
    global $connection;
    $username = $_POST['user'];
    $password = $_POST['password'];

    $username = mysqli_escape_string($connection,$username);   ///prevention of SQL injection
    $password = mysqli_escape_string($connection,$password);
    $password_encryption = password_hash( $password , PASSWORD_BCRYPT );    ///encryption of a password
    password_verify($password,$password_encryption);

    $query = "INSERT INTO users(username , password)";
    $query.= "VALUES ('$username' ,'$password_encryption')";
    $result = mysqli_query($connection , $query);
    if(!$result){
        die('Query FAILED!'. mysqli_error());
    }
    else{
        echo 'Record Inserted!';
    }
}
?>

