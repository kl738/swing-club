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
            $nameEboard = filter_input(INPUT_GET, 'nameEboard', FILTER_SANITIZE_STRING);
            $numPhoto = filter_input(INPUT_GET, 'image_id', FILTER_SANITIZE_NUMBER_INT);
            $numSugg = filter_input(INPUT_GET, 'image_id', FILTER_SANITIZE_NUMBER_INT);
            
            echo "<p>$nameEboard</p>";
            
            if(isset($_SESSION['user'])){
            
                
              
            if(!empty($nameEboard)){    
            $sql = 'SELECT * FROM EBoard WHERE name = ?;';
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('s', $nameEboard);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $photo = $row['photoID'];
            
            // code for deleting album when the user presses yes!
                if(isset($_POST['delete'])){
                    
                    //delete the member from EBoard table
                    $sql = "Delete from EBoard WHERE name = $name ;";
                    $mysqli->query($sql);
                    
                    //delete the photo of the member
                    $sql = "Delete from Photo WHERE photoID = $photo ;";
                    $mysqli->query($sql);
                
                    print "EBoard member '$name' has been successfully deleted!";
                
                }    
                
                
                
                else{    
                    print "<h3>Are you sure you want to delete album titled '$name'?</h3>";
                    print "<form method = 'post'>";
                    print "<input type = 'submit' name = 'delete' value = 'Yes, please delete it immediately!'>";
                    print "</form>";
                    print "<h3>If you don't want to delete this member, you can simply just leave this page.</h3>";
                }
                    
                    
          
                
            } 
                
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
                    print "<h3>If you don't want to delete this photo, you can simply just leave this page.</h3>";
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