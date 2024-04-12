<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','project');

$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if ($conn==false){
    dir('Error: Cannot connect',mysqli_connect_error());
}

$name=$mbno=$email=$createdat="";
$name_err=$email_err="";

if ($_SERVER['REQUEST_METHOD']=="post"){
    if (empty(trim($_POST['name']))){
        $name_err="Name cannot be blank";
    }
    else{
        $sql="SELECT id FROM member WHERE id=?";
        $stmt=mysqli_prepare($conn,$sql);
        if ($stmt){
            mysqli_stmt_bind_param($stmt ,"s",$param_name);
            $param_name=trim($_POST['name']);
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                $name=trim($POST['name']);
            }
        }else{
            echo "Something Went Wrong";
        }
    }
    mysqli_stmt_close($stmt);

    if (empty(trim($_POST["email"]))){
        $email_err="Email cannot be empty";
    }
    else{
        $sql="SELECT id FROM member WHERE email=?";
        $stmt=mysqli_prepare($conn,$sql);
        if ($stmt){
            mysqli_stmt_bind_param($stmt ,"s",$param_email);
            $param_email=trim($_POST['email']);
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                $name=trim($POST['email']);
            }
        }
        else{
            echo "Something Went Wrong";
        }
    }

if (empty($name_err) && empty($email_err)){
    $sql="Insert INTO member(name,mbno,email,createdat) VALUES(?,?,?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    if ($stmt){
        mysqli_stmt_bind_param($stmt,"siss");
        $param_name=$name;
        $param_mbno=$mbno;
        $param_email=$email;
        $param_createdat=$createdat;
        
        if (mysqli_stmt_execute($stmt)){
            header("location:welcome.php");
        }
        else{
            echo "Something went wrong";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}
?>


