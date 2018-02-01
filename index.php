<?php ini_set('session.save_path', '../sessions/');
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cornell Swing Dance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" sizes="144x144" href="images/apple-icon-144x144.png">
</head>

<body id="myPage">
    <?php include_once("php/analyticstracking.php"); ?>
    <?php include 'php/nav.php'; ?>

    <header class="clearfix" style="height: 70vh; background: url(images/theme_pic.png) 
    no-repeat center center; background-size: cover; margin-bottom: 0px;">
    </header>

    <div class="jumbotron text-center">
        <h1>Cornell Swing Dance Club</h1>
        <br>
    </div>

    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>Who are we?</h2><br>
                <h4>Welcome to our site! We are Cornell University's Swing Dance Club. We all love dancing, and we're excited to share our passion for swing with everyone.
                Swing dancing is a fun, energetic social activity for all ages. The Cornell Swing Dance Club is dedicated to promoting the dances of the Jazz Era of the early 20th century by holding regular lessons and social dances. Every semester, there are also a few big dances featuring Cornell's very own CU Jazz Band and the newly formed Syncopators.</h4>
            </div>
            <div class="col-sm-4">
                <img src="images/cornell_logo.gif" class="img-responsive float-right" width="250" height="250">
            </div>
        </div>
    </div>



    <div class="container-fluid bg-grey">
        <div class="row text-center">
            <h2>FAQ</h2>
            <div id="myCarousel" class="carousel text-center" data-ride="carousel">
                
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                    <li data-target="#myCarousel" data-slide-to="6"></li>
                </ol>

                
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <h4>Q: When are the classes?<br><br><span>A: We teach classes every Wednesday from 8:00pm to 9:00pm. Afterwards, from 9:00pm to 10:00pm, there will be an open dance to practice the moves you've learned during class.</span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: Where are the classes?<br><br><span>A: The classes take place in the the 6th floor ballroom in Willard Straight Hall.</span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: I'm a complete beginner and have never ever danced in my life. Can I join?<br><br><span>A: Of course! We are open to dancers of all levels, and are very excited when beginners want to learn. </span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: Do I need a partner?<br><br><span>A: No. Lindy Hop swing dancing is in fact a very social dance. We will be rotating through many partners to give you the opportunity to dance with as many people as possible. </span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: How much do classes cost?<br><br><span>A: The classes we each every Wednesday at Willard Straight are completely free. Occasionally, we will invite a famous lindy hopper to Cornell to hold workshops, and these will not be free. Check the events page to see when these workshops are!</span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: What should I wear to swing dance?<br><br><span>A: We recommend that you dress as comfortably as possible. Most often people casually dress in jeans/shorts and a shirt, and some people will choose to dress a bit more formally. It is all up to you! Shoes are very important, and we recommend that you don't wear shoes with rubber soles as they will stick to the floor and prevent movement. High heels also leave the dancer unbalanced. </span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: Are there any big dances?<br><br><span>A: Yes! We hold a few big dances every semester. Dancers with no experience are encouraged to come as well. We will hold free group lessons before the dance, so that everyone is confortable at the big dance. Check on the events page for more details.</span></h4>
                    </div>
                </div>

               
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>


    <div id="events" class="container-fluid text-center">
        <h2>EVENTS</h2>
        <h3>CLASSES</h3>
        <p>We hold weekly club meetings on the 6th floor dance space in Willard Straight Hall. Lessons are every Wednesday from 8-9pm, and afterwards there will be an open dance from 9-10pm.</p>
        <h3>DANCES</h3>
        <p>There are a few big dances featuring the Cornell Jazz Band and the Syncopators each semester. If you don't know how to dance, no problem. There will always be beginner lessons beforehand to make sure you have a good time. Check the Event Calendar page for more information.</p>
        
    </div>

   <!--  TODO: here we'll query the Photo database to display three random images. placeholder images are set for now. 
    Very similar to the query in gallery.php except for the limit of 3.  -->
    <div id="gallery" class="container-fluid text-center bg-grey">
        <h2>GALLERY</h2><br>
        <div class="row text-center">
            <div class="slideshow">
                <?php
                require_once 'php/config.php'; 
                $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                $sql = 'SELECT Photo.photoID, path, credit, caption FROM Photo left outer join EBoard on Photo.photoID=EBoard.photoID where EBoard.photoID is null;';
                $result = $mysqli->query($sql);
             
                while ($row = $result->fetch_assoc()) {
                    print ("<a href='gallery.php' class = 'slideLink'><img class='mySlides' src=images/{$row['path']} alt='slideshow'></a>");
                }
               
                
                ?>
            </div>
        </div><br>

    </div>

    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>


</body>

</html>