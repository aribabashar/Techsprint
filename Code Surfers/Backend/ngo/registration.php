<?php
    $showAlert = false;
    $showError = false;
if ($_SERVER['REQUEST_METHOD']=='POST'){

    // Database file being included
    include "../partials/_dbconnect.php";

    // Taking in variables
    $username = $_POST["username"];
    $username = mysqli_real_escape_string($conn, $username);
    $roll = $_POST['roll'];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // SQL query to be executed
    $existSql="SELECT * FROM `ngo` WHERE username= '$username'";
    $result=mysqli_query($conn, $existSql);
    $numExistRows= mysqli_num_rows($result);


    if(strlen($password)<5){
        echo '<div class="alert alert-danger alert-success fade show" role="alert">
        <strong>Error! </strong>Password too Short <br>Click <a href="index.php">here</a> to try again
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
    if ($numExistRows>0){
        $showError = "Username already exists";
    }
    else{
    if(($password==$cpassword)){
        // $hash=password_hash($password, PASSWORD_DEFAULT);

        // Inserting into databse
        $sql="INSERT INTO ngo (username, password, sem) VALUES ('$username', '$password', '$roll')";
        
        $result=mysqli_query($conn, $sql);
        if ($result){
            $_SESSION['username'] = $username;
            
            // header('location: timetable.php');
            $showAlert = true;
        }
    } 
    else{
        $showError = "Passwords do not match";
    }
}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <!-- JavaScript Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3'
        crossorigin='anonymous'></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

if ($showAlert){
    echo '<div class="alert alert-success alert-success fade show" role="alert">
    <strong>Success!</strong> Your account has been created. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($showError){
    echo '<div class="alert alert-danger alert-success fade show" role="alert">
    <strong>Error!</strong>'. $showError.' <br>Click <a href="index.php">here</a> to try again
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>