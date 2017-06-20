<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggestion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
</head>

<body id="myPage">
    <?php 
    include 'php/nav.php';
    require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    
    
    
    
    
    
    ?>
    <div class="container-fluid">
        <h1>Suggestions</h1>
        <?php
        
        if(isset($_SESSION['user'])){
         
            
            $sql = 'SELECT * from Suggestion;';
                   
            
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
				    
                    print("<div class = item>");
                    
                    $index = $row['id'];
                    $date = $row['date_created'];
                    $text = $row['text'];
                    $href = "delete.php?sug_id=$index";
                    print("<h3 class='headerDate'>$date</h3><a class = 'delete' href='$href' title='$href'>Delete</a>");
                    
                    
                    print("<p>$text</p>");
                    
			        
                 
                    
                    
					  
                        
                        
                           
  		
				    print("</div>"); 
            }
            
        //display html
        
        }
        
        else{
        ?>
        
        
        
        
        <p>Please enter your suggestions for the Swing Dance Club here. Suggestions will be anonymous, and we will take them into consideration for making the club more enjoyable for everyone.</p>
        <form method="post">
             <textarea rows="2" cols="25" placeholder="This is the default text" class="suggestionbox" name="suggestion" required></textarea><br>
             <!-- <div class="g-recaptcha" data-sitekey="6LcOLCEUAAAAAEeEvCotQe_VMYQnVfAthJlwWZPm"></div> -->
             <!-- Above is for local host and course server. Below is for cuswing.com -->
             <div class="g-recaptcha" data-sitekey="6Lf2MCYUAAAAAHiWzUyOxVhL_w8BNOtGY9eL0Hmd"></div>
             <input type="submit" value="Submit" class="button" />

        </form>
        
        <?php
        
        if(!empty($_POST['suggestion'])&&isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) { 
            
            $secret = '6LcOLCEUAAAAAEeEvCotQe_VMYQnVfAthJlwWZPm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            
            
            
            
            $suggestion = filter_input( INPUT_POST, 'suggestion', FILTER_SANITIZE_STRING );
        
            $sql = "INSERT INTO Suggestion (text) VALUES (?);";    
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('s', $suggestion);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                    } 
                    
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                    else{
                        print "<p>Thanks for your suggestion!</p>";
                    }
            
        }
            
            else{
                print "Please verify you are not a robot!";
            }
        }
        
        
        
        ?>
        
        
        
        
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>