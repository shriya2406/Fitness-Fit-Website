<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn){
    //     echo "success";
    // }
    // else{
        die("Error". mysqli_connect_error());
    }
    
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from admin where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        session_start();
        header("location: admin_update.php");

    } 
    else{
        echo "Invalid Credentials";
    }
}
    
?>
