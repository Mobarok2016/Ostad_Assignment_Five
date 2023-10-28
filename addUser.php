<?php 

if(isset($_POST["add"]) ){
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? '';

 $input= [
        "role"=>$role,
        "username"=> $username,
        "email"=> $email,
        "password"=> sha1($password)
    ];
    
    $data = file_get_contents("./users.json");
    $data = json_decode($data,true);
    
    $data[]=$input;
    
    $data = json_encode($data,JSON_PRETTY_PRINT);
    $data = file_put_contents("./users.json",$data);
    header("Location:home_admin.php");

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
        <h1 class="text-center">Add a New User</h1>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" name="username" class="form-control mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" name="email" class="form-control mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" name="password" class="form-control mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control mb-5">
                        <option value="user">User</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                    <a href="home_admin.php" class="btn btn-success">Back</a>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    
<!-- bootstrap js  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>