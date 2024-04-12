<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $mbno = mysqli_real_escape_number($db, $_POST['mbno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $createdat = mysqli_real_escape_string($db, $_POST['createdat']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
//   if (empty($password_1)) { array_push($errors, "Password is required"); }
//   if ($password_1 != $password_2) {
// 	array_push($errors, "The two passwords do not match");
//   }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM member WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
//   if (count($errors) == 0) {
  	// $password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO member (name,mbno, email, createdat) 
  			  VALUES('$name', '$mbno', '$email','$createdat')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: welcome.php');
  }
}





<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['mbno']) && isset($_POST['email']) &&
        isset($_POST['createdat'])) {
        
        $name = $_POST['name'];
        $mbno = $_POST['mbno'];
        $email = $_POST['email'];
        $createdat = $_POST['createdat'];
        
        if (!empty($name)|| !empty($mbno) || !empty($email) || !empty($createdat)){
        $host = "localhost";
        $dbname = "root";
        $dbPassword = "";
        $dbName = "project";
        $conn = new mysqli($host, $dbname, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM member WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO member(name,mbno,email,createdat) values(?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("siss",$name,$mbno,$email,$createdat);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
}
?>