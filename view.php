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

                $ids=$_GET['id'];
                $showquery="select * from `project`.`member` where id={$ids}";
                $showdata=mysqli_query($conn,$showquery);
                $arrdata=mysqli_fetch_array($showdata);
                // if (isset($_POST['name'])){
                //     $idupdate=$_GET['id'];
                //     $name = $_POST['name'];
                //     $mbno = $_POST['mbno'];
                //     $email = $_POST['email'];
                //     $createdat = $_POST['createdat'];
                //     $sql="UPDATE `project`.`member` SET id=$idupdate,name='$name',mbno='$mbno',email='$email',createdat='$createdat' WHERE id=$idupdate;";
                //     if($conn->query($sql) == true){
                    // 
                // }
                // else{
                //     
                // }
                // }
                ?>
                <div class="textbox">
                    <p><?php echo $arrdata['name']; ?></p>
                </div>
                <div class="textbox">
                    <p><?php echo $arrdata['mbno']; ?>"</p>
                </div>
                <div class="textbox">
                    <p><?php echo $arrdata['email']; ?>"</p>
                </div>
                <div class="textbox">
                    <label class="t">Select Time</label><br/>
                    <select name="createdat">
                        <option>----</option>
                        <option
                        <?php
                        if ($arrdata['createdat']=="10am to 12pm"){
                            echo "selected";
                        }
                        ?>
                        >10am to 12pm</option>
                        <option
                        <?php
                        if ($arrdata['createdat']=='12pm to 2pm'){
                            echo "selected";
                        }
                        ?>
                        >12pm to 2pm</option>
                        <option
                        <?php
                        if ($arrdata['createdat']=='2pm to 4pm'){
                            echo "selected";
                        }
                        ?>
                        >2pm to 4pm</option>
                        <option
                        <?php
                        if ($arrdata['createdat']=='4pm to 6pm'){
                            echo "selected";
                        }
                        ?>
                        >4pm to 6pm</option>
                        <option
                        <?php
                        if ($arrdata['createdat']=='6pm to 8pm'){
                            echo "selected";
                        }
                        ?>
                        >6pm to 8pm</option>
                    </select>
                </div>
            </div>

        </form>
        </p>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>