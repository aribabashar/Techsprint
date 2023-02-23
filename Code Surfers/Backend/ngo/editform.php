<?php

include '../partials/_dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['ngoname'];
    $ownername = $_POST['ownername-'];
    $companyid = $_POST['companyid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $date = $_POST['date'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postal = $_POST['postal'];
    $description = $_POST['description'];
    
    
    $sql = "INSERT INTO `ngo` (`n_id`, `name`, `username`, `password`, `ownername`, `companyid`, `email`, `phone`, `add1`, `add2`, `country`, `region`, `postal`, `description`, `makingtime`) VALUES ('$name', '$ownername', '$companyid', '$email', '$phone', '$add1', '$add2', '$country', '$city', '$region', '$postal', '$description', 'current_timestamp()');";
    $res = mysqli_query($conn, $sql);

    if($res){
        echo "done";
    }
    else{
        echo "error";
    }
}


?>