<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Code of Etiquette</title>
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
        <h1>Code of Etiquette</h1>
        <p>Borrowed from Houston Swing Dance Society</p>
        <h3>Encouraging Words for Beginners</h3>
        <p>Because there is a wide range of people in the swing scene, skills and experience levels vary greatly. However, everybody starts out as a beginner. If you are a new to dancing, notice that most of the better dancers have been working at it for quite some time. Try not to get discouraged. It may take a few months for you to feel completely comfortable swing dancing. Even then, nobody ever learns everything. In fact, the teachers spend as much time as anybody improving their dancing. Avoid dwelling on what you know or don't know. More importantly, please remember that lacking prior experience does not preclude anybody from enjoying the dance. This is supposed to fun, above all else.</p>
        <h3>Rules</h3>
        <ul>
        <li>No alcohol, firearms, profanity, drugs, or otherwise inappropriate behavior will be tolerated.</li>
        <li>No aerials on the social dance floor (with the exception during performances). Low dips are also discouraged due the risk of injury.</li>
        </ul>
        <h3>General Tips</h3>
        <ul>
        <li>Try to follow the Golden Rule: treat others as you wish to be treated.</li>
        <li>Smile.</li>
        <li>Avoid “offering” unsolicited advice on the dance floor. If the person is engaging in a practice that is potentially injurious or otherwise inappropriate, discretely mention to instructor (or HSDS board member).</li>
        <li>Teaching on the social dance floor is not appropriate. Exceptions are limited to instructors and designated sessions after class.</li>
        <li>Thank your partner after each dance.</li>
        <li>Swing Dance is a partner dance, but close dancing (AKA, Blues Style Dancing), is not encouraged if the music does not call for it. Be considerate of your partner and give him or her appropriate space.</li>
        <li>One dance at a time is the norm within our dance community compared to other dance styles.</li>
        <li>It is not necessary to apologize to your partner if a particular move is not executed perfectly. The point is not to have a perfect dance, but to have fun. However, if your mistake may have physically hurt your partner, please apologize and make sure they are okay.</li>
        <li>Swing dancing is a social dance, therefore talking while dancing is okay and not considered bad etiquette. Moreover, not talking while dancing is not considered bad etiquette either. Do what makes you feel comfortable.</li>
        <li>Smell Fresh! You will be dancing in close quarters with a lot of new people. You may want to bring gum or breath mints. You may also wish to wear deodorant or cologne. Dancing is good exercise so be prepared to sweat! Many people bring extra shirts to change over the course of an evening.</li>
        <li>Notice what the person is doing before you ask them to dance. Be wary of interrupting conversations.</li>
        <li>Ask politely, "Would you like to dance?" Avoid grabbing a partner and pulling them onto the dance floor.</li>
        <li>It is acceptable for ladies to ask gentlemen to dance. Most gentlemen are flattered by the offer.</li>
        <li>Sometimes a perception exists that good dancers only hang out with other good dancers. This is a byproduct of the fact that many dancers have been dancing together for a long time and know each other better. Remember even good dancers can be very shy people.</li>
        <li>If you bump another couple, try to immediately look back and apologize. If another couple bumps you, apologize even if it is their fault. A word of apology can prevent hurt feelings that can linger long after the pain is forgotten.</li>
        <li>Bring a reusable water bottle to keep hydrated throughout the night. We provide drinking water.</li>
        </ul>
        <h3 style="clear: both;">How To Say "No"</h3>
        <p>In cases where you wish to decline a dance, be polite, smile and say "No, thank you." If there is a reason why you can't dance that song, give them a reason. Try to deal with people honestly and directly. If you would like to dance with the person some other time, offer to dance with them later and make a point to follow up. If you have no desire to dance with this person, simply say "No thank you," with a pleasant, sincere smile. Also, please keep in mind that it is considered rude to refuse to dance with one person and then dance with another person during the same song.</p>
        <h3>What to Do If They Say "No"</h3>
        <p>You can always ask again, but give him or her time and space before doing so. If you are turned down, do not lose heart. All dancers get turned down on occasion but there are plenty of other people that would like to dance with you instead.</p>
        <h3>Dealing With Difficult People</h3>
        <p>If somebody at an HSDS event makes you feel uncomfortable, please speak with a Board member. If you don't know a Board member, tell the DJ and he or she will get you in touch with a Board member. We will be glad to deal with them in a respectful, non-confrontational manner.</p>
        <h3>Closing Thought</h3>
        <p>It is wise to be lighthearted enough to just enjoy the dance regardless of whether or not everyone is at their best etiquette.</p>   
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php require_once 'php/footer.php'; echo $footer?>
    </footer>

</body>

</html>