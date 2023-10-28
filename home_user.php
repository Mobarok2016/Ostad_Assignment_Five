<?php 
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!='user'){
    header('Location: login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup form</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <h1 class="text-center">welcome! <span class="text-success"><?php echo $_SESSION['username'] ?></span></h1>
        <h3 class="text-center">You are a <?php echo $_SESSION['role']  ?></h3>
        <div class="logout text-center">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>
    
<!-- bootstrap js  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>