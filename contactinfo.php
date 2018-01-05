<?php ini_set('session.save_path', '../sessions/');
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Information</title>
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
        <h1>Contact Info</h1>
        <p>Feel free to reach out to us at club meetings, <a href="https://www.facebook.com/groups/2370182392/">Facebook</a>, or email.</p>
        <p>Our secretary, Tommi's email is tls237@cornell.edu</p>
        <p>We now have two Facebook pages. The <a href="https://www.fb.me/cornellswing">Cornell Swing Dance Club</a> contains exclusively events sponsored by the undergraduate club. Find out about swing dance on campus here! The <a href="https://www.facebook.com/groups/2370182392/">Cornell Swing Community</a> should be used as a forum to talk about all things swing. For example, some appropriate topics for discussion include promoting off-campus local swing events, finding rides/carpooling to events, or discussing your favorite swing songs! 
        <p>Also feel free to leave an anonymous suggestion at our <a href="suggestion.php">suggestion box</a>.</p>
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>