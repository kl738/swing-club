<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>History</title>
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
    <?php include 'php/nav.php'; ?>
    <?php 
    require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    
    //To display edit options
    //if(isset($_SESSION['user'])){}
    
    
    
    ?>
    
    <div class="container-fluid">
        <h1>History</h1>
        <p>Borrowed from Houston Swing Dance Society</p>
        <p>Swing is more than a dance. Swing is an attitude. It's music. It's jazzy and romantic. It's flying high and getting low. It's hep, it's hip, it's cool. And it's now.</p>

        <p>In Harlem, New York, in the 1920s, a dance evolved with the jazzy Big Band swing music of the era. Incorporating 8-count and 6-count steps, as well as Charleston variations, jitterbug, Air Steps, Acrobatics and Aerials, this dance evolved into the Lindy Hop.</p>

        <p>It's said that the dance got it's name from "Shorty" George Snowden: during the hype of Charles "Lucky Lindy" Lindbergh's Transatlantic "Hop". George was asked what he called the dance he was performing. His answer: "The Lindy Hop."</p>

        <p>With such legends as Frankie Manning, Norma Miller, Whitey's Lindy Hoppers, the Savoy Lindy Hoppers. the Congeroo Dancers and more, Lindy Hop grew to be the thing to do. Record numbers filled local dance halls as people poured in to watch the dancers and the Big Bands of Count Basle, Benny Goodman, Cab Calloway, Artie Shaw, Woody Herman, Duke Ellington and Lionel Hampton, just to name a few.</p>

        <p>"In my day... well, this is still my day... there were many clubs to choose from and there was live music pretty much every night of the week..." Frankie Manning (Great Southwest Lindyfest. 1999) referring to the height of the swing era in the 1930s.</p>

        <p>Back in the day, Lindy Hop was commonly also referred to as "Jitterbug." Now there are several styles of swing dancing that have evolved from Lindy Hop over the years. Such styles include Classic Savoy Lindy Hop, Hollywood Style Lindy, West Coast Swing, Whip, Country/Western Swing, Carolina Shag, 6-count swing (which today we refer to as "Jitterbug") and Boogie Woogie.</p>

        <p>The dance lost its prominence after World War II, however it never died; it only took a break until the 1980s and the 1990s.</p>

        <p>Today, Lindy Hop has reached eager dancers all over the world. Champion class dancers hail from places such as Scandinavia, Europe, Australia, Asia, Canada, and the U.S., even right here in Houston, Texas.</p>
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>