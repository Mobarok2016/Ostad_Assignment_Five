<?php 
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
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
        <h1 class="text-center">Admin Panel</h1>
        <div class="add-btn mb-5">
            <a href="addUser.php" class="btn btn-primary">Add User</a>
        </div>
        <div class="table">
            <table class="table table-bordered table-stripped text-center">
                <thead>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                    $index=0;
                    $data = file_get_contents("./users.json");
                    $data = json_decode($data, true);
                    foreach($data as $row){

                    
                    
                    ?>
                    <tr>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['role'] ?></td>
                        <td>
                            <a href="edit.php?index=<?php echo $index?>" class="btn btn-success">Edit Role</a>
                            <a href="delete.php?index=<?php echo $index?>" class="btn btn-danger">Delete</a>
                        </td>
                        
                    </tr>

                    <?php $index++; } ?>
                </tbody>
            </table>
        </div>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>
<!-- bootstrap js  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>