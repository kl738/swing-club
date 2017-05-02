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
            $numSugg = filter_input(INPUT_GET, 'image_id', FILTER_SANITIZE_NUMBER_INT);
            
            
            if(isset($_SESSION['user'])){
            
                
            /*For deleting eboard  
            if(!empty($numAlbum)){    
            $sql = 'SELECT * FROM Album WHERE albumID = ?;';
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('i', $numAlbum);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
            $row = $result->fetch_assoc();
            $title = $row['title'];
            
            // code for deleting album when the user presses yes!
                if(isset($_POST['delete'])){
                    
                    //delete the album from Album table
                    $sql = "Delete from Album WHERE albumID = $numAlbum ;";
                    $mysqli->query($sql);
                    
                    //delete the album relation in the Relation table
                    $sql = "Delete from Relation WHERE albumID = $numAlbum ;";
                    $mysqli->query($sql);
                
                    print "Album titled '$title' has been successfully deleted!";
                
                }    
                
                
                
                else{    
                    print "<h3>Are you sure you want to delete album titled '$title'?</h3>";
                    print "<form method = 'post'>";
                    print "<input type = 'submit' name = 'delete' value = 'Yes, please delete it immediately!'>";
                    print "</form>";
                    print "<h3>If you don't want to delete this album, you can simply just leave this page.</h3>";
                }
                    
                    
          
                
            } the close of deleting eboard */
                
//To delete an image
                if (!empty($numPhoto)){
                
                $result = $mysqli->query("select * from Photo WHERE photoID = $numPhoto;");    
                $row = $result->fetch_assoc();
                $caption = $row['caption'];
                    
                if(isset($_POST['delete'])){
                    
                    //delete the album from Album table
                    $sql = "Delete from Photo WHERE photoID = $numPhoto ;";
                    $mysqli->query($sql);
                    
                    
                
                    print "Image captioned '$caption' has been successfully deleted!";
                
                }    
                
                
                
                else{    
                    print "<h3>Are you sure you want to delete image captioned '$caption'?</h3>";
                    print "<form method = 'post'>";
                    print "<input type = 'submit' name = 'delete' value = 'Yes, please delete it immediately!'>";
                    print "</form>";
                    print "<h3>If you don't want to delete this image, you can simply just leave this page.</h3>";
                }
                    
                    
                    
                }// the close of deleting image
                
            }// the close of if (isset(session[user]))
            

            
            
            // not authorized to use this page
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