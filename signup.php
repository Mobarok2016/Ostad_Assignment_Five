<?php 


    if(isset($_POST["signup"]) ){
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $errormsg = "";
        
        $data = file_get_contents("./users.json");
        $data = json_decode($data,true);
        
        
        
        if(empty($username) || empty($email) || empty($password)){
            $errormsg = "please fill all the fields";
        
            
        }
        else{
           
            $input= [
                    "role"=>"user",
                    "username"=> $username,
                    "email"=> $email,
                    "password"=> sha1($password)
                ];
                
                $data[]=$input;
                
                $data = json_encode($data,JSON_PRETTY_PRINT);
                $data = file_put_contents("./users.json",$data);
                header("Location:login.php");
            
                
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
    <div class="container mt-5">
        <h1 class="text-center">Create a new account</h1>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="signup.php" method="POST" class="shadow p-5">
                   <p class="text-danger"> <?php echo $errormsg ?? ""; ?></p>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" name="username" class="form-control mb-3" placeholder="enter your username" >
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" name="email" class="form-control mb-3" placeholder="enter your email">
                   
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" name="password" class="form-control mb-3" placeholder="enter your password">
                   
                    <button type="submit" class="btn btn-primary" name="signup">Signup</button>
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    
<!-- bootstrap js  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>