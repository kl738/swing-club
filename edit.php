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
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" sizes="144x144" href="images/apple-icon-144x144.png">
</head>

<body id="myPage">
        <?php include_once("php/analyticstracking.php"); ?>
   
            
        
        <div  class="container-fluid">
            
        <?php  
            include 'php/nav.php'; 
            require_once "php/config.php";
            $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            $nameEboard = filter_input(INPUT_GET, 'nameEboard', FILTER_SANITIZE_STRING);
            $numPhoto = filter_input(INPUT_GET, 'image_id', FILTER_SANITIZE_NUMBER_INT);
            if(isset($_SESSION['user'])){
            
                 
            if(!empty($nameEboard)) {
                
            //Get photoID
                $sql = 'SELECT EBoard.photoID, path, year, description, name FROM EBoard inner join Photo on EBoard.photoID = Photo.photoID WHERE name = ?;';
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('s', $nameEboard);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
                $row = $result->fetch_assoc();
                $photoID = $row[ 'photoID' ];
                
                
            
            if(isset($_POST["save"])){
                
                //datafield
                $post_year = filter_input( INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT );
                $post_description = filter_input( INPUT_POST, 'description', FILTER_SANITIZE_STRING );
                
                
                
                //check for empty value+ change text&num datafield
                if(!empty($post_year)&&!empty($post_description)){
//sql1
                    $sql = "Update EBoard Set year =? , description = ? WHERE name = ? ";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('iss', $post_year, $post_description, $nameEboard);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }
                    
                    //change photo if uploaded
                   
                    
                    if($_FILES['newImage']['error']!=UPLOAD_ERR_NO_FILE){
                        
                        $newImage = $_FILES['newImage'];
				        $originalName = $newImage['name'];
                        $tempName = $newImage['tmp_name'];
					    move_uploaded_file($tempName, "images/$originalName");
                        
                       
//sql2
                        $sql = "Update Photo Set path=? WHERE photoID=?;";
                        $stmt = $mysqli->stmt_init();
                        if($stmt->prepare($sql)){
                            $stmt->bind_param('si', $originalName, $photoID);
                            $stmt->execute();
                            $result = $stmt->get_result();
                        }
                        
                        
                    }
                        
                        
                        
                    
                    
                    
                    
                    print "Changes have been saved.";
                    
                }
                
                else{
                    print "Please enter a change for your EBoard member! Nothing except image can be blank";
                }
            
            
                }// close of the isset(_post[save])
                
                
                
                
            // displaying a form for user the enter input.  
//sql3
            $sql = 'SELECT EBoard.photoID, path, year, description, name FROM EBoard inner join Photo on EBoard.photoID = Photo.photoID WHERE name = ?;';
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('s', $nameEboard);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
                $row = $result->fetch_assoc();
                $year = $row['year'];
                $description = $row['description'];
                $name =$row[ 'name' ];  
                $photoID = $row[ 'photoID' ]; 
                
            print("<div class = imgDiv>");
            print("<form method = 'post' enctype='multipart/form-data'>");
                
			 
            
            print( "<div class = 'imgContainer'><img src = images/{$row[ 'path' ]} class = 'img' alt = 'image'></div>" );
                
            
            print "<div class = 'captionContainer'><span class = 'imgList'>Name: {$row[ 'name' ]}</span>";
			print "Year: <input type='number' min = '1920' max = '2030' name='year' value = '$year'> <br><br>";
                    
            print "Description: <input type='text' name='description' value = '$description'> <br><br>";
                
              
            print "<p>";
				print "<label>Image upload(leave blank if no changes): </label>";
				print "<input id='newImage' type='file' name='newImage' accept='.jpg, .jpeg, .png'>";
				
			print "</p>";
                
            print "<input type = 'submit' name = 'save' value = 'Save'>";
                
            print("</form>");
            print("</div></div>");
                
            
            }
            
           
            
// editing image    
            if(!empty($numPhoto)){
                
                if(isset($_POST["save"])){
                
                $post_caption = filter_input( INPUT_POST, 'caption', FILTER_SANITIZE_STRING );
                $post_credit = filter_input( INPUT_POST, 'credit', FILTER_SANITIZE_URL );
                
                
                
                //check for empty value
                if(!empty($post_caption)&&!empty($post_credit)){
//sql4
                    $sql = "Update Photo Set caption =? , credit = ? WHERE photoID = ? ";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('ssi', $post_caption, $post_credit, $numPhoto);
                        $stmt->execute();
                        
                    }
                    
//sql4.5
                    $sql = "Delete from Relation WHERE photoID = ?;";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('i', $numPhoto);
                        $stmt->execute();
                        
                    }
                    
                    
                    if(!empty($_POST['albumChosen'])){
                    $albumChosen = $_POST['albumChosen'];
                    foreach($albumChosen as $index){
//sql5
                    $sql = "INSERT INTO Relation (albumID, photoID) VALUES ";
                    $sql.= "($index, $numPhoto);";
                    $mysqli->query($sql);
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                    }
                    }
                    
                    
                    
                    print "<h3>Changes have been saved.</h3>";
                    
                }
                
                else{
                    print "<h3>Please enter all changes for your image! No field can be left blank.</h3>";
                }
            
            
                }// close of the isset(_post[save])
                
                
                
                
            // displaying a form for user the enter input.   
//sql6
                $sql = 'SELECT * FROM Photo WHERE photoID = ?;';
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('i', $numPhoto);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
             
            $row = $result->fetch_assoc();
            print("<div class = imgDiv>");
                
            print( "<div class = 'imgContainer'><img src = images/{$row[ 'path' ]} class = 'img' alt = 'image'></div>" );
            
            print("</br>");
            print("<form method = 'post'>");
                
			
			$caption = $row['caption'];
            $credit = $row['credit'];
            
			print "<div class = 'captionContainer'>Caption: <input type='text' name='caption' value = '$caption'> <br><br>";
                
                    
            print "Credit to: <input type='text' name='credit' value = '$credit'> <br><br>";
                
            print "Add to album: ";
            
            $inAlbum = [];
//sql7
                
            $sql = "Select albumID from Relation WHERE photoID = ?;";
                $stmt = $mysqli->stmt_init();
                if($stmt->prepare($sql)){
                    $stmt->bind_param('i', $numPhoto);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                }
            
            while($row = $result->fetch_assoc()){
                $inAlbum[] = $row['albumID'];
            }
                
                
                
            $result = $mysqli->query("Select * from Album");    
            while($row = $result->fetch_assoc()){
                
                $id = $row['albumID'];
                if(in_array($id,$inAlbum))
                    print( "&nbsp;<input type='checkbox' name='albumChosen[]' value='$id' checked = 'checked'>{$row['name']}&nbsp;" );
                else
                    print( "&nbsp;<input type='checkbox' name='albumChosen[]' value='$id'>{$row['name']}&nbsp;" );
            }
            
            
                
       
                
                
            print "<br><br><input type = 'submit' name = 'save' value = 'Save'>";      
            print("</form>");
            print("</div></div>");
                
                
                
                
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