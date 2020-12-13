<?php

$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("failed due to connection lost" . mysqli_connect_errno());
    }
    // else {
    //     echo "Sucess"; 
    // }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    //echo "$sql";
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="travel.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to Trip form </h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="int" name="age" id="age" placeholder="Enter your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>