<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Gym login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            background-color: rgb(76, 76, 250);
            font-size: 50px;
        }
        .login {
            margin-top: -32px;
            background-color: lightblue;
            border: 2px solid black;
            overflow: hidden;
            font-size:initial;
        }
        h2 {
            text-align: center;
            background-color: rgb(76, 76, 250);
            font-size: 33px;
            margin-top:-2.5%;
            margin-bottom:3%;
        }
        table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;
}
td{
    font-size:initial;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: blue;
  color: white;
}
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}

.tooltip {
  position: relative;
  display: inline-block;
/* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 90px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 8px 0;
  border-radius: 6px;
 
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}

    </style>

</head>

<body>
    <h1>FITNESS CLUB GYM</h1>
    <h2>Registered Member Table<h2>
    <div class="login">
    <table>
  <tr>
    <th>Register_ID</th>
    <th>NAME</th>
    <th>Gender</th>
    <th>DOB</th>
    <th>EMAIL</th>
    <th>COURSE_ID</th>
    <th>COURSE</th>
    <th>CONTACT</th>
    <th>REGISTER_AT</th>
  </tr>
  <tbody>
    <?php
    $sql = "SELECT * FROM `registered`";
    $result = mysqli_query($conn, $sql);
    


    // Display the rows returned by the sql query
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['rid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['cid']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['registered_at']; ?></td>
            
        </tr>
        <?php
        }
    ?> 
    </tbody>  
  </table>
  <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<footer><?php $sql="SELECT COUNT(DISTINCT rid) as c FROM `registered`;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);?>
<p>COUNT: <?php echo $row['c']; ?></p>
<?php $sql="SELECT SUM(price) as s FROM `registered` ,`course` WHERE registered.cid=course.cid;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);?>
<p>TOTAL INCOME TILL NOW: Rs. <?php echo $row['s']; ?></p>
<?php $sql="SELECT AVG(price) as a FROM `registered` ,`course` WHERE registered.cid=course.cid;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);?>
<p>AVERAGE EARNING: Rs. <?php echo $row['a']; ?></p>
<?php $sql="SELECT MAX(price) as max FROM `registered` ,`course` WHERE registered.cid=course.cid;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);?>
<p>MAXIMUM PRICE: Rs. <?php echo $row['max']; ?></p>
<?php $sql="SELECT MIN(price) as max FROM `registered` ,`course` WHERE registered.cid=course.cid;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);?>
<p>MINIMUM PRICE: Rs. <?php echo $row['max']; ?></p>

</footer>

</body>
</html>

