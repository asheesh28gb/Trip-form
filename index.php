<?php
$insert = false;
if(isset($_POST['name'])) {
   // Ste coonection variables 
   $server ='localhost';
   $username = 'root';
   $password = '';

   // Create a database connection
   $con = mysqli_connect($server, $username, $password);

    // Check for connection success
   if(!$con){
      die("connecton to this database is failed due to" . mysqli_connect_error());
   }
   //echo 'success connectiong to the db';

   // Collect post variables
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $comments = $_POST['comments'];

   $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Comment`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$comments', current_timestamp());";

   //echo $sql;

   // Execute the query
   if($con->query($sql) == true) {  //-> its a object operator
        //echo "Successfully Inserted";

        //Flage for successful insertion
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
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <img class="bg" src="image.jpg" alt=" IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true) {
        echo  "<p class= 'SubmitMsg'>Thanks for  submitting form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Comment here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>