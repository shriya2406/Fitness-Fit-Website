<?php
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $mbno = $_POST['mbno'];
    $email = $_POST['email'];
    $createdat = $_POST['createdat'];
    $sql = "INSERT INTO `project`.`member` (`name`, `mbno`, `email`, `createdat`) VALUES ('$name', '$mbno', '$email', '$createdat');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        ?><script>alert("You are successfully registered. We will contact you soon");</script><?php
        header("location:successful.html");
    }
    else{
        ?><script>alert("You are not registered yet.");</script><?php
        header("location:fail.html");
    }
    
    $con->close();
}
?>
