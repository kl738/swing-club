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
    <div class="container-fluid bg-grey">
        <h1>E-Board Members</h1>
    </div>
        
    <div class="container-fluid">
        <?php 
    require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    
    $sql = 'SELECT * FROM EBoard inner join Photo on Photo.photoID=EBoard.photoID;';
                   
            
            $result = $mysqli->query($sql);
            print('<div class="eboard">');
            print('<div class="row">');
            $i=1;
            while ($row = $result->fetch_assoc()) {
				    
                print('<div class="col-md-6 col-centered">');

                    print("<div class = imgDiv>");
                    
                    
                    $name = $row[ 'name' ];
			        print( "<div class = 'imgContainer'><img src = images/{$row[ 'path' ]}  alt = 'image'></div>" );
                    print( "<div class = 'captionContainer'><span class = 'imgList'>Name: {$row[ 'name' ]}</span>" );
                    print( "<span class = 'imgList'>Year: {$row[ 'year' ]}</span>" );
                    print( "<span class = 'imgList'>Description: {$row[ 'description' ]}</span>" );
                    
                    if(isset($_SESSION['user'])){
                        
					    $href = "edit.php?nameEboard=$name";
                        print( "<span class = 'imgList'><a href='$href' title='$href'>Edit</a></span>" );
					  
                        $href = "delete.php?nameEboard=$name";
                        print("<span class = 'imgList'><a href='$href' title='$href'>Delete</a></span>");
                        
                        
                    }         
  		
				    print("</div></div>"); 
                print("</div>");
                if ( $i % 2 === 0 ) { echo '</div><div class="row">';};
                $i++;
            }
            print('</div>');
            print('</div>');
        
    //form for add photo
    if(isset($_SESSION['user'])){
    
    ?>
        
        
        <h1>Add E-Board Members</h1>
        <form method = "post" enctype="multipart/form-data">
            Name: <input type="text" name="name"> <br><br>
            
            Year: <input type="number" min="1920" max="2030" name="year"> <br><br>
                
            Description: <input type="text" name="description"> <br><br>  
                
            <p>
				<label>Image upload: </label>
				<input id="newImage" type="file" name="newImage" accept=".jpg, .jpeg, .png">
				
			</p>
                
            
            
            <input type="submit" name = 'submit' value="Submit">
            </form>   
        
        
        
        
        
    <?php } 
        
           
                
                //add image to database
                if(isset($_POST["submit"]) and !empty( $_FILES['newImage'])){
 
				        
				    
                
                    $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
                    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
                    $description =  filter_input( INPUT_POST, 'description', FILTER_SANITIZE_STRING );
                    $newImage = $_FILES['newImage'];
				    $originalName = $newImage['name'];
                    
                    //check for empty value
                    if(!empty($name)&&!empty($description)&&$year>=1920&&$year<=2030)
                    {
                        
                    
				    if ( $newImage['error'] == 0 ) {
      
					   $tempName = $newImage['tmp_name'];
					   move_uploaded_file($tempName, "images/$originalName");
					
					   
                    
                    $sql = "INSERT INTO Photo (caption, path, credit) VALUES ";               
                    $sql .= "('$name','$originalName','$name')";
                    $sql .= ";";
                    $mysqli->query($sql);
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                   
                    print("<p>The file $originalName was uploaded successfully.</p>");
                    
                    }
                        
                    //Getting the photoID for creating an entry in Eboard
                    $result = $mysqli->query("select * from Photo WHERE path = '$originalName'");
                    
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                    
                    $row = $result->fetch_assoc();
                    $index = $row['photoID']; 
                    
                    $sql = "INSERT INTO EBoard (name, photoID, year, description) VALUES ";               
                    $sql .= "('$name','$index','$year','$description')";
                    $sql .= ";";
                    $mysqli->query($sql);
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                        
                        
                        
                    }//Form verified ended
                    
                    
                    
                    else 
					   print("<p>Error: The file $originalName was not uploaded due to invalid input.</p>");
                    
                    
                    
                    
                    
                    
             
                }
 
        ?>
        
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>