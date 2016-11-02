<?php
    session_start();
?>


<html lang="en">
<!-- Base for Dashboard -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Registration CSS -->
    <link href="../../static/css/register/register.css" rel="stylesheet" type="text/css">

    <!-- Common CSS -->
        <!-- Core CSS -->
        <link href="../../static/css/core/core.css" rel="stylesheet" type="text/css">
        
        <!-- Template CSS -->
        <link href="../../static/css/core/template.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="../../static/css/core/customfonts.css" rel="stylesheet" type="text/css">

        <!--jQuery libraries-->
        <script src="../../static/js/core/jquery-1.11.3.min.js"></script>
</head>

<body>

<mainContent>
    <?php
        if (!empty($_SESSION['valid_userid'])) {
            echo 
                "Welcome " . $_SESSION['valid_firstname'] . " " . $_SESSION['valid_lastname'] . "! <br />" . 
                "You are logged in as: " . $_SESSION['valid_userid'] . " <br />" . 
                "<button type='button' class='buttonBlackInverse' onclick='location.href=\"../register/logout.php\";'>LOGOUT</button><br>";
        }
    ?>
    <center>
        <h1>Registration Page</h1>
        <form action="register.php" method=POST>

        <h2>Personal Particulars</h2>
        <input type=text name=firstname placeholder="FIRST NAME"><br /><br />
        <input type=text name=lastname placeholder="LAST NAME"><br /><br />
        <input type=text name=phone placeholder="PHONE"><br /><br />
        <input type=text name=email placeholder="EMAIL"><br /><br />
        <input type=text name=address placeholder="ADDRESS"><br /><br />
        <input type=text name=paymentinfo placeholder="PAYMENT INFO"><br /><br />

        <h2>Account Details</h2>
        <input type=text name=username placeholder="USERNAME"><br /><br />
        <input type=password name=password placeholder="PASSWORD"><br /><br />
        <input type=password name=password2 placeholder="CONFIRM PASSWORD"><br /><br />

        <button class="buttonBlackInverse" type="submit" name="submit">SUBMIT</button>
        <button class="buttonBlackInverse" type="reset" name="reset">RESET</button>
        </form>
    </center>

    <br><br><br><br><br>
</mainContent>

</body>

<!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <script src="../../static/js/generateContent/itemCategories.js"></script>
    <script src="../../static/js/core/modal.js"></script>
</html>