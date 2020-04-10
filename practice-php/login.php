<?php
include "db.php";
include "functions.php";
if(isset($_POST['submit'])){    
    createRows();   
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
</head>
<body>

<div class="container">
 <div class="col-xs-6">
     <div class="align-center"><h2>Login Page</h2></div>
     <form action="login.php" method="post">
         <div class="form-group">
             <label for="Username">Username</label><input type="text" name="user" class= "form-control"><br/><br/>
         </div>
         <div class="form-group">
             <label for="Username">Password</label><input type="password" name="password" class= "form-control">
         </div>
         <input type="submit" class="btn btn-primary" name="submit" value="Create">
     </form>
 </div>
</div>
</body>
</html>