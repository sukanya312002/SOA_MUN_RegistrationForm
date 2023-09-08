
<?php
$insert=false;
if(isset($_POST['name'])){
     //Set Connection variables
     $server= "localhost";
     $username= "root";
     $password= "";
//Create a database connection
     $con = mysqli_connect($server,$username,$password);
//Check for connection success
     if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
     }
    //echo "Success connecting to the db";

//Collect post variables
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $other=$_POST['other'];

    $sql = "INSERT INTO `soa`.`soa` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    //echo $sql;


    //Execute the query
    if($con->query($sql)==true){
      //echo "Successfully inserted"


      //Flag for successful insertion
      $insert=true;
    }
    else{
      echo "ERROR: $sql <br> $con->error";
    }


    //Close the database connection
    $con->close();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOA MUN</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Merriweather&family=Roboto&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="background.jpg" alt="SOA" >
    <div class="container">
        <h1>Welcome to Siksha 'O' Anusandhan MUN</h1>
        <p>Enter your details and submit this form to confirm your participation in the event.</p>
      <?php
      if($insert==true){
       echo " <p class='submitmsg'>Thanks for submitting the form. We are waiting for you on the other side. </p>";
      }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="other" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>

