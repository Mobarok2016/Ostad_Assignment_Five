<?php 
session_start();
    
$errormsg = "";  
        
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";
    
            $data = file_get_contents('./users.json');
            $data = json_decode($data,true);
            
        foreach($data as $row){
                
            if($row['email'] == $email && $row['password'] == sha1( $password )){
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    
                    header("Location: index.php");
                }
            else{
                    $errormsg = "wrong email or password";
                }
        }

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
    <div class="container py-5">
        <h1 class="text-center">Login to your account</h1>
        
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <form action="" method="POST" class="shadow p-5">
            <p class="text-danger"><?php echo $errormsg ?></p>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" name="email" class="form-control mb-3" placeholder="enter your email">
                   
          <label for="password">Password</label>
          <input type="password" name="password" id="password" name="password" class="form-control mb-3" placeholder="enter your password">
                   
          <button type="submit" class="btn btn-primary" name="login">Login</button>
          <p>Don't you have account? <a href="signup.php">Signup</a></p>
        </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    
<!-- bootstrap js  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>