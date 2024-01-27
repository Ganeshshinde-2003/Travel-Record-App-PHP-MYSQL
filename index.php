<?php
$submit = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con) {
        die("Connection is failed dur to". mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `us_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `message`, `dt`) VALUES ('$name','$age','$gender','$email','$phone','$message', current_timestamp());";

    // echo $sql;

    if($con->query($sql) == true){
        $submit = true;
    } else {
        // echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel To USA</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1>Welcome to IIT Kharagpur US Trip Form</h1>
      <p>
        Enter your detials and submit this form to confirm your partiipation in
        the trip
      </p>
      <?php 
      if($submit == true) {
      echo "<p class='submitmsg'>Thanks for submitting your form. We are happy to see you joingin us for the US trip</p>";
    }
      ?>
      <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="id" id="id" placeholder="Enter your id">
        <input type="number" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="number" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter the message"></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="./index.js"></script>
  </body>
</html>
