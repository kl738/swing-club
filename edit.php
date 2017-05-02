<?php session_start();?>
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
    
   
            
        
        <div  class="container-fluid">
            
        <?php  
            include 'php/nav.php'; 
            require_once "php/config.php";
            $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            $nameEboard = filter_input(INPUT_GET, 'eboard_name', FILTER_SANITIZE_STRING);
            $numPhoto = filter_input(INPUT_GET, 'image_id', FILTER_SANITIZE_NUMBER_INT);
            if(isset($_SESSION['user'])){
            
                
            /*editing eboard    
            if(!empty($nameEboard)) {   
            //update an album in database
            if(isset($_POST["save"])){
                
                //datafield
                $post_title = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING );
                $post_note = filter_input( INPUT_POST, 'note', FILTER_SANITIZE_STRING );
               
                
                
                //check for empty value
                if(!empty($post_title)){
                
                    $sql = "Update Album Set title =? , note = ?, date_modified = now() WHERE albumID = $numAlbum ";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('ss', $post_title, $post_note);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                    }
                    print "Changes have been saved.";
                    
                }
                
                else{
                    print "Please enter a change for your album!";
                }
            
            
                }// close of the isset(_post[save])
                
                
                
                
            // displaying a form for user the enter input.    
                $sql = 'SELECT * FROM Album WHERE albumID = ?;';
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('i', $numAlbum);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
             
            print("<form method = 'post'>");
                
			$row = $result->fetch_assoc();
			$title = $row['title'];
            $note = $row['note'];
			print "Album Title: <input type='text' name='title' value = '$title'> <br><br>";
                    
            print "Note: <input type='text' name='note' value = '$note'> <br><br>";
                
            print "<input type = 'submit' name = 'save' value = 'Save'>";      
            print("</form>");
            
            }//close of !empty($numAlbum)
            
            end of edit eboard*/
            
// editing image    
            if(!empty($numPhoto)){
                
                if(isset($_POST["save"])){
                
                $post_caption = filter_input( INPUT_POST, 'caption', FILTER_SANITIZE_STRING );
                $post_credit = filter_input( INPUT_POST, 'credit', FILTER_SANITIZE_URL );
                
                
                
                //check for empty value
                if(!empty($post_caption)&&!empty($post_credit)){
                
                    $sql = "Update Photo Set caption =? , credit = ? WHERE photoID = $numPhoto ";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('ss', $post_caption, $post_credit);
                        $stmt->execute();
                        
                    }
                    
                    
                    
                    print "<h3>Changes have been saved.</h3>";
                    
                }
                
                else{
                    print "<h3>Please enter all changes for your image! No field can be left blank.</h3>";
                }
            
            
                }// close of the isset(_post[save])
                
                
                
                
            // displaying a form for user the enter input.    
                $sql = 'SELECT * FROM Photo WHERE photoID = ?;';
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('i', $numPhoto);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
             
            $row = $result->fetch_assoc();
            print("<div class = imgDiv>");
                
            print( "<img src = images/{$row[ 'path' ]} class = 'img' alt = 'image'>" );
            
            print("</br>");
            print("<form method = 'post'>");
                
			
			$caption = $row['caption'];
            $credit = $row['credit'];
            
			print "Caption: <input type='text' name='caption' value = '$caption'> <br><br>";
                
                    
            print "Credit to: <input type='text' name='credit' value = '$credit'> <br><br>";
            
            
                
       
                
                
            print "<br><br><input type = 'submit' name = 'save' value = 'Save'>";      
            print("</form>");
            print("</div>");
                
                
                
                
            }
                
                
            }// the close of isset($_SESSION['user'])
            
            else{
                print "You must be logged in as an admin to use this feature";
            } 
               
            
            
            
            
        ?>
            

       
            
         
            
  
        
        </div>    <!--end of container div-->  

    
    
    
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>