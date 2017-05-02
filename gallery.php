<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gallery</title>
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
    
    
    $sql = 'SELECT * FROM Photo ;';
                   
            
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
				    
                    print("<div class = imgDiv>");
                    
                    $index = $row['photoID'];
                    
			        print( "<img src = images/{$row[ 'path' ]} class = 'img' alt = 'image'>" );
                    
                    if(isset($_SESSION['user'])){
					    $href = "edit.php?image_id=$index";
                        print( "<span class = 'imgList'><a href='$href' title='$href'>Edit</a></span>" );
					  
                        $href = "delete.php?image_id=$index";
                        print("<span class = 'imgList'><a href='$href' title='$href'>Delete</a></span>");
                        
                        
                    }         
  		
				    print("</div>"); 
            }
    
    
    
    //form for add photo
    if(isset($_SESSION['user'])){
        
        
    }
    
   
    
    
    
    ?>
    <div class="container-fluid">
        <h1>Gallery</h1>
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>