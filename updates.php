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
            font-size: 55px;
        }

        .login {
            margin-top: -32px;
            background-color: lightblue;
            border: 2px solid black;
            overflow: hidden;
        }

        img {
            height: 80%;
            float: left;
        }

        .v1 {
            border-left: 2px solid black;
            height: 401px;
            position: absolute;
            left: 41%;
            margin-left: -3px;
            top: 105px;
        }

        p {
            display: block;
            margin-left: 15px;
            margin: 2px 0 0 0;
        }

        h2 {
            text-align: center;
            margin-top: 8%;
            font-size: 35px;
        }

        /* .login_box{
            width: 280px;
            color: black;
            background-color: white;
            margin-left: 20px;
        } */
        /* .centre {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            object-fit: contain;
        } */
        /* .t {
            margin-left: 24%;
        } */

        .textbox {
            padding-bottom: 12px;
        }

        /* #btn {
            background-color: aqua;
            border-radius: 8px;
        } */

        input,label,button,select{
            width: 35%;
            padding: 8px 2px;
            margin: 8px 0 1% 15%;
            box-sizing: border-box;
        }

        input:focus{
            background-color:beige;
        }

        #btn:hover {
            background-color: rgb(76, 76, 250);
        }

    </style>

</head>

<body>
    <h1>FITNESS CLUB GYM</h1>
    <div class="login">
        <img src="76-766156_men-fitness-wallpaper-gym-workout-mens-images-hd.jpg" alt="This is an gym image">
        <!-- <div class="v1"></div> -->
        <p>
        <h2>MEMBERSHIP FORM</h2>
        <form action=" " method="post">
            <div class="centre">
                <?php
                $server = "localhost";
                $username = "root";
                $password = "";
            
                // Create a database connection
                $conn = mysqli_connect($server, $username, $password);
            
                // Check for connection success
                if(!$conn){
                    die("connection to this database failed due to" . mysqli_connect_error());
                }

                $ids=$_GET['rid'];
                $showquery="select * from `project`.`registered` where rid={$ids}";
                $showdata=mysqli_query($conn,$showquery);
                $arrdata=mysqli_fetch_array($showdata);
                if (isset($_POST['name'])){
                    $idupdate=$_GET['rid'];
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $dob = $_POST['dob'];
                    $email = $_POST['email'];
                    $course = $_POST['course'];
                    $contact = $_POST['contact'];
                    $sql="UPDATE `project`.`registered` SET rid=$idupdate,name='$name',gender='$gender',dob='$dob',email='$email',cousre='$course' contact='$contact' WHERE rid=$idupdate;";
                    if($conn->query($sql) == true){
                    ?><script>alert("You are successfully updated");</script><?php
                }
                else{
                    ?><script>alert("Data is not udated");</script><?php
                }
                }
                ?>
                <div class="textbox">
                    <input type="text" placeholder="Enter Your Name"  name="name" value="<?php echo $arrdata['name']; ?>" required />
                </div>
                <div class="textbox">
                    <input type="tel" placeholder="Mobile Number" name="contact" value="<?php echo $arrdata['contact']; ?>" maxlength="10" />
                </div>
                <div class="textbox">
                    <input type="email" placeholder="Your Email" name="email" value="<?php echo $arrdata['email']; ?>" required />
                </div>
                <div class="textbox">
                    <input type="radio" name="gender" value="<?php echo $arrdata['gender']; ?>" >
                    <input type="radio" name="gender" value="<?php echo $arrdata['gender']; ?>" >
                    <input type="radio" name="gender" value="<?php echo $arrdata['gender']; ?>" >
                </div>
                <div class="textbox">
                    <input type="email" placeholder="Your DOB" name="dob" value="<?php echo $arrdata['dob']; ?>" required />
                </div>
                <div class="textbox">
                    <label class="t">Course</label><br/>
                    <select name="course">
                        <option>----</option>
                        <option
                        <?php
                        if ($arrdata['course']=="Everyday Yoga"){
                            echo "selected";
                        }
                        ?>
                        >Everyday Yoga</option>
                        <option
                        <?php
                        if ($arrdata['course']=='Zumba'){
                            echo "selected";
                        }
                        ?>
                        >Zumba</option>
                        <option
                        <?php
                        if ($arrdata['course']=='CPT'){
                            echo "selected";
                        }
                        ?>
                        >CPT</option>
                        <option
                        <?php
                        if ($arrdata['course']=='Cycling'){
                            echo "selected";
                        }
                        ?>
                        >Cycling</option>
                        <option
                        <?php
                        if ($arrdata['course']=='HIIT'){
                            echo "selected";
                        }
                        ?>
                        >HIIT</option>
                    </select>
                    <option
                        <?php
                        if ($arrdata['course']=='Boxing'){
                            echo "selected";
                        }
                        ?>
                        >Boxing</option>
                    <option
                        <?php
                        if ($arrdata['course']=='Personal Training'){
                            echo "selected";
                        }
                        ?>
                        >Personal Training</option>
                    <option>
                        <?php
                        if ($arrdata['course']=='Dance Fitness Classes'){
                            echo "selected";
                        }
                        ?>
                        >Dance Fitness Classes</option>
                    <option
                        <?php
                        if ($arrdata['course']=='Weight Training'){
                            echo "selected";
                        }
                        ?>
                        >Weight Training</option>
                    <option
                        <?php
                        if ($arrdata['course']=='Private Lessons'){
                            echo "selected";
                        }
                        ?>
                        >Private Lessons</option>
                    </select>
                </div>
                <div class="textbox">
                    <input class="button" type="submit" name="submit" value="Update"
                        id="btn">
                </div>
            </div>

        </form>
        </p>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>