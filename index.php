<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Database connection failed! " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `contact`.`contact` (`name`, `age`, `gender`, `email`, `tel`, `message`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$tel', '$message', current_timestamp());";
    if($con->query($sql) == true){
        $insert = true;

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="icon.jpg">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <h1>Contact Form</h1>
        <p>Enter your details below</p>
        <?php
        if($insert==true){
         echo "<p class='response'>Your response has been recorded successfully!</p>";
        }
        ?>
        <div class="input-class">
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="number" name="tel" id="tel" placeholder="Enter your number"><br>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message"></textarea><br>
        <button class="btn">Submit</button>
        </form>
        </div>
    </div>

</body>
</html>