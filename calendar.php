<?php session_start();?>
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
            <iframe src="https://calendar.google.com/calendar/embed?src=cornell.edu_5j7aiojrga961lq77qp9jfpvec%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe><br>
            <p>Events will be color-coded based on the type of event. For example, there will be a legend for indicating club meetings, big dances, workshops, outside non-Cornell sponsored events. These events will be editable by the Swing Club's Eboard as they can simply edit it on Google Calendar's interface and they will automatically sync to the website. </p>
        </div>
        <footer id="footer" class="container-fluid text-center">
               <?php include 'php/footer.php'; ?>
        </footer>
        
</body>

</html>