<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eboard Member</title>
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
        <h1>E-Board Members</h1>
        
        
        <?php 
    require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    
    $sql = 'SELECT * FROM EBoard inner join Photo on Photo.photoID=EBoard.photoID;';
                   
            
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
				    
                    print("<div class = imgDiv>");
                    
                    
                    $name = $row[ 'name' ];
			        print( "<img src = images/{$row[ 'path' ]} class = 'img' alt = 'image'>" );
                    print( "<span class = 'imgList'>Name: {$row[ 'name' ]}</span>" );
                    print( "<span class = 'imgList'>Year: {$row[ 'year' ]}</span>" );
                    print( "<span class = 'imgList'>Description: {$row[ 'description' ]}</span>" );
                    
                    if(isset($_SESSION['user'])){
					    $href = "edit.php?nameEboard=$name";
                        print( "<span class = 'imgList'><a href='$href' title='$href'>Edit</a></span>" );
					  
                        $href = "delete.php?nameEboard=$name";
                        print("<span class = 'imgList'><a href='$href' title='$href'>Delete</a></span>");
                        
                        
                    }         
  		
				    print("</div>"); 
            }
    
    
    
    //form for add photo
    if(isset($_SESSION['user'])){
    
    ?>
        
        
        <h1>Add E-Board Members</h1>
        <form method = "post" enctype="multipart/form-data">
            
                
                
            <p>
				<label>Image upload: </label>
				<input id="newImage" type="file" name="newImage" accept=".jpg, .jpeg, .png">
				
			</p>
                
            
            
            <input type="submit" name = 'submit' value="Submit">
            </form>   
        
        
        
        
        
    <?php } 
        
           
                
                //add image to database
                if(isset($_POST["submit"]) and !empty( $_FILES['newImage'])){
 
				        $newImage = $_FILES['newImage'];
				        $originalName = $newImage['name'];
				    if ( $newImage['error'] == 0 ) {
      
					   $tempName = $newImage['tmp_name'];
					   move_uploaded_file($tempName, "images/$originalName");
					
					   print("<p>The file $originalName was uploaded successfully.</p>");
                    
                    }
				    
                
                    $caption = filter_input( INPUT_POST, 'caption', FILTER_SANITIZE_STRING );
                    
                    $credit =  filter_input( INPUT_POST, 'credit', FILTER_SANITIZE_URL );
                    
                    //check for empty value
                    {
                    
                    $sql = "INSERT INTO Photo (caption, path, credit) VALUES ";               
                    $sql .= "('$caption','$originalName','$credit')";
                    $sql .= ";";
                    $mysqli->query($sql);
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                   
                    }
                    
                    else 
					   print("<p>Error: The file $originalName was not uploaded.</p>");
                    //insert the relation into the realtion database if there is any.
                    
             
                }
 
        ?>
        
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>