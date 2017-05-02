<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FAQ</title>
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
    <?php include 'php/nav.php'; ?>
    <?php 
    require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    
    //To display edit options
    //if(isset($_SESSION['user'])){}
    
    
    
    ?>
    <div class="container-fluid">
        <h1>Frequently Asked Questions</h1>
        <div class="questions">
           
                <div class="item">
                        <h3>Q: When are the classes?</h3>A: We teach classes every Thursday from 7:00pm to 8:00pm. Afterwards, from 8:00pm to 9:00pm, there will be an open dance to practice the moves you've learned during class.
                    </div>
                <div class="item">
                        <h3>Q: Where are the classes?</h3><p>A: The classes take place in the 5th floor dance room in Willard Straight Hall.</p>
                    </div>
                <div class="item">
                        <h3>Q: I'm a complete beginner and have never ever danced in my life. Can I join?</h3><p>A: Of course! We are open to dancers of all levels, and are very excited when beginners want to learn.</p>
                    </div>
                <div class="item">
                        <h3>Q: Do I need a partner?</h3><p>A: No. Lindy Hop swing dancing is in fact a very social dance. We will be rotating through many partners to give you the opportunity to dance with as many people as possible. </p>
                    </div>
                <div class="item">
                        <h3>Q: How much do classes cost?</h3><p>A: The classes we each every Thursday at Willard Straight are completely free. Occassionally, we will invite a famous lindy hopper to Cornell to hd workshops, and these will not be free. Check the events page to see when these workshops are!</p>
                    </div>
                <div class="item">
                        <h3>Q: What should I wear to swing dance? </h3><p>A: We recommend that you dress as comfortably as possible. Most often people casually dress in jeans/shorts and a shirt, and some people will choose to dress a bit more formally. It is all up to you! Shoes are very important, and we recommend that you don't wear shoes with rubber ses as they will stick to the floor and prevent movement. High heels also leave the dancer unbalanced. </p>
                    </div>
                <div class="item">
                        <h3>Q: Are there any big dances?</h3><p>A: Yes! We hd a few big dances every semester. Dancers with no experience are encouraged to come as well. We will hd free group lessons before the dance, so that everyone is confortable at the big dance. Check on the events page for more details.</p>
                    </div>
            
        </div>
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php require_once 'php/footer.php'; echo $footer?>
    </footer>

</body>

</html>