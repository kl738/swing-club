<?php ini_set('session.save_path', '../sessions/');
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calendar</title>
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

        <div id="calendar" class="container-fluid text-center">
            <h1>Calendar of Events</h1>
            <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=cornell.edu_vor9h8bj1kvkptt76vb94tt3t4%40group.calendar.google.com&amp;color=%23A32929&amp;src=cornell.edu_8pqii3jrcdpf66i8vfd4qls82c%40group.calendar.google.com&amp;color=%2329527A&amp;src=cornell.edu_svv0pl2i8531i71bohdhsjf2os%40group.calendar.google.com&amp;color=%2342104A&amp;ctz=America%2FNew_York" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe><br>
            <!-- <p>Events are color-coded based on the type of event. They are separated between </p> -->
        </div>
        <footer id="footer" class="container-fluid text-center">
               <?php include 'php/footer.php'; ?>
        </footer>
        
</body>

</html>