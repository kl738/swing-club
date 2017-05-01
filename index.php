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
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body id="myPage">
    <?php require_once 'php/nav.php'; echo $nav?>

    <header class="clearfix" style="height: 70vh; background: url(images/theme_pic.png) 
    no-repeat center center; background-size: cover; margin-bottom: 0px;">
    </header>

    <div class="jumbotron text-center">
        <h1>Cornell Swing Dance Club</h1>
        <p></p>
    </div>

    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>Who are we?</h2><br>
                <h4>Welcome to our site! We are Cornell University's Swing Dance Club. We all love dancing, and we're excited to share our passion for swing with everyone.
                <p>Swing dancing is a fun, energetic social activity for all ages. The Cornell Swing Dance Club is dedicated to promoting the dances of the Jazz Era of the early 20th century by holding regular lessons and social dances. Every semester, there are also a few big dances featuring Cornell's very own CU Jazz Band and the newly formed Syncopators.</p>
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
                        <h4>Q: When are the classes?<br><br><span>A: We teach classes every Thursday from 7:00pm to 8:00pm. Afterwards, from 8:00pm to 9:00pm, there will be an open dance to practice the moves you've learned during class.</span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: Where are the classes?<br><br><span>A: The classes take place in the 5th floor dance room in Willard Straight Hall.</span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: I'm a complete beginner and have never ever danced in my life. Can I join?<br><br><span>A: Of course! We are open to dancers of all levels, and are very excited when beginners want to learn. </span></h4>
                    </div>
                    <div class="item">
                        <h4>Q: Do I need a partner?<br><br><span></span>A: No. Lindy Hop swing dancing is in fact a very social dance. We will be rotating through many partners to give you the opportunity to dance with as many people as possible. </h4>
                    </div>
                    <div class="item">
                        <h4>Q: How much do classes cost?<br><br><span></span>A: The classes we each every Thursday at Willard Straight are completely free. Occassionally, we will invite a famous lindy hopper to Cornell to hold workshops, and these will not be free. Check the events page to see when these workshops are!</h4>
                    </div>
                    <div class="item">
                        <h4>Q: What should I wear to swing dance?<br><br><span></span>A: We recommend that you dress as comfortably as possible. Most often people casually dress in jeans/shorts and a shirt, and some people will choose to dress a bit more formally. It is all up to you! Shoes are very important, and we recommend that you don't wear shoes with rubber soles as they will stick to the floor and prevent movement. High heels also leave the dancer unbalanced. </h4>
                    </div>
                    <div class="item">
                        <h4>Q: Are there any big dances?<br><br><span></span>A: Yes! We hold a few big dances every semester. Dancers with no experience are encouraged to come as well. We will hold free group lessons before the dance, so that everyone is confortable at the big dance. Check on the events page for more details.</h4>
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
        <h4>We hold weekly club meetings on the 5th floor dance space in Willard Straight Hall. Lessons are every Thursday from 7-8pm, and afterwards there will be an open dance from 8-9pm</h4>
        <br>
    </div>


    <div id="gallery" class="container-fluid text-center bg-grey">
        <h2>GALLERY</h2><br>
        <div class="row text-center">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="images/Example_pic1.jpg" width="400" height="300">
                    <p><strong>Practice</strong></p>
                    <p>Yes, we practice.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="images/Example_pic2.jpg" width="400" height="300">
                    <p><strong>Showcase</strong></p>
                    <p>Yes, we perform.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="images/Example_pic3.jpg" width="400" height="300">
                    <p><strong>Contest</strong></p>
                    <p>Yes, we win contest.</p>
                </div>
            </div>
        </div><br>

    </div>

    <footer id="footer" class="container-fluid text-center">
        <?php require_once 'php/footer.php'; echo $footer?>
    </footer>



    <!-- Add Google Maps
    <div id="googleMap" style="height:400px;width:100%;"></div>
    <script>
        function myMap() {
            var myCenter = new google.maps.LatLng(41.878114, -87.629798);
            var mapProp = {
                center: myCenter,
                zoom: 12,
                scrollwheel: false,
                draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter
            });
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
   -->
    <!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>

</html>