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
            margin-top: 6%;
            font-size: 35px;
        }

        .textbox {
            padding-bottom: 12px;
        }

        .button {
        background-color: #1c87c9;
        border: none;
        color: white;
        /* padding: 20px 34px; */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        /* margin: 4px 2px; */
        cursor: pointer;
        width: 35%;
        padding: 8px 2px;
        margin: 8px 0 1% 15%;
      }
      .button:hover{
        background-color:blue;
      }
    </style>

</head>

<body>
    <h1>FITNESS CLUB GYM</h1>
    <div class="login">
        <img src="76-766156_men-fitness-wallpaper-gym-workout-mens-images-hd.jpg" alt="This is an gym image">
        <p>
        <h2>ADMIN ACCESS</h2>
            <div class="centre">
                <a href="showregistration.php" class="button">Registrations Enquiry</a><br/>
                <a href="registration.php" class="button">Registered Member</a><br/>
                <a href="alterAge.php" class="button">Add Age to Table</a><br/>
                <a href="altered.php" class="button">Apply Aggreagate Functions</a><br/>
                <a href="leftMember.php" class="button">List of Members Left the GYM</a><br/>
            </div>

        </form>
        </p>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>