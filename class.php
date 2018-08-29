<?php ini_set('session.save_path', '../sessions/');
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" sizes="144x144" href="images/apple-icon-144x144.png">
</head>

<body id="myPage">
    <?php include_once("php/analyticstracking.php"); ?>
    <?php include 'php/nav.php'; ?>
    <?php
    require_once 'php/config.php';
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);


    //To display edit options
    //if(isset($_SESSION['user'])){}



    ?>
    <div class="container-fluid">
        <h1>Class</h1>
        <h3>Every Tuesday at Willard Straight Hall 5th Floor.</h3>
        <p>During the school year, there are lessons in swing dancing from 7pm to 8pm every Tuesday in the 5th floor dance space in Willard Straight Hall. To find the 5th floor room, enter Willard Straight Hall from the main entrance and take the stairs up one floor. Lessons assume no prior experience in lindy hop swing dancing and they're very beginner friendly. Afterwards, there will be a social dance from 8pm to 9pm where you can practice your newly learned moves. We hope you come join us!</p>
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>
