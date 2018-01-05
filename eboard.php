<?php ini_set('session.save_path', '../sessions/');
session_start();?>
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
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" sizes="144x144" href="images/apple-icon-144x144.png">
</head>

<body id="myPage">
    <?php include_once("php/analyticstracking.php"); ?>
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
    
//sql1
    $sql = 'SELECT * FROM EBoard inner join Photo on Photo.photoID=EBoard.photoID order by EBoard.photoID ASC;';
                   
            
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
        
    //form for add new member
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
            
            Username: <input type="text" name="username" required> <br><br>
            
            Password: <input type="password" name="password" required> <br><br>
            
            Confirm passowrd: <input type="password" name="confirm_password" required> <br><br>
            
            
            <input type="submit" name = 'submit' value="Submit">
            </form>   
        
        
        
        
        
    <?php } 
        
                function validate_user($str) 
                    {return preg_match('/^[a-zA-Z0-9_]{6,30}$/',$str);}
        
                
                
                //add image to database
                if(isset($_POST["submit"])){
 
				        
				    
                
                    $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
                    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
                    $description =  filter_input( INPUT_POST, 'description', FILTER_SANITIZE_STRING );
                    $newImage = $_FILES['newImage'];
				    $originalName = $newImage['name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $re_password = $_POST['confirm_password'];
                    
                    
                    
                    
             
                    
                    
                    //check for empty value
                    if(!empty($name)&&!empty($description)&&$year>=1920&&$year<=2030&&validate_user($username)&&$re_password==$password&&$_FILES['newImage']['error']!=UPLOAD_ERR_NO_FILE){
                        
                    
				    if ( $newImage['error'] == 0 ) {
      
					   $tempName = $newImage['tmp_name'];
					   move_uploaded_file($tempName, "images/$originalName");
					
					   
//sql2  
                    $sql = "INSERT INTO Photo (caption, path, credit) VALUES (?,?,?)";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('sss', $name, $originalName, $name);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }
                                   
                   
          
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                   
                    print("<p>The file $originalName was uploaded successfully.</p>");
                    
                    }
                        
                    $hashuser = password_hash($username, PASSWORD_DEFAULT);
                    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                        
                    //add new user into the Users table
//sql3
                    $sql = "INSERT INTO Users (username, hashpassword, name) VALUES (?,?,?) ";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('sss', $hashuser, $hashpassword, $name);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }    
                        
                    //Getting the photoID for creating an entry in Eboard
//sql4  
                    $sql = "select * from Photo WHERE path =?;";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('s', $originalName);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }
                    
                    
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                    
                    $row = $result->fetch_assoc();
                    $index = $row['photoID']; 
//sql5
                    $sql = "INSERT INTO EBoard (name, photoID, year, description) VALUES (?,?,?,?);";
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('siis', $name, $index, $year, $description);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }
                                   
                  
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                        
                        
                        
                    }//Form verified ended
                    
                    
                    
                    else 
					   print("<p>Error: The file $originalName was not uploaded due to invalid input. Username must be between 6-30 characters long and it can only contain alphanumeric character and underscore.</p>");
                    
                    
                    
                    
                    
                    
             
                }
 
        ?>
        
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>