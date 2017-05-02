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
    
    
    
    <?php
        
        require_once "php/config.php";
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        
        $username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
        $password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
            
        $sql = 'SELECT * FROM Users WHERE username = ? ;';
        
        
        $stmt = $mysqli->stmt_init();
        $login = false;
            
            
            
            
        //to update the horizontal nav_bar
        if(isset($_POST['username'])&&isset($_POST['password'])){
            
            
            if($stmt->prepare($sql)){
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            
            $hash = $row['hashpassword'];
                
               
            if($username == $row['username'] && password_verify($password, $hash ))
                {$_SESSION['user'] = $username;
                $login = true;}
            }
        }
        ?>
            
        <div id='container' >
            
        <?php include 'php/nav.php'; ?>
            

      
        
        
        <div  class="container-fluid">
            
            <h1>Admin Login</h1>
            
            
            <?php 
            
            
		
            //only show the form when neither value is set.
            if(!isset($_POST['username']) || !isset($_POST['password'])){
            ?>
            <form method = "post">
            
            Username: <input type="text" name="username"> <br/><br/>
                
            Password: <input type="password" name="password"> <br/><br/>
                
            <input type="submit" name = 'submit' value="Submit">
                
            
            </form>  
            <?php
            }
            
            
            else{
                
                
                
         
                if($login)
                    
                {echo "$username, you have logged in successfully!";}
                
                else{
                    print "Invalid username or passward!";
                }
            }
            ?>
            
       
     
                
                
               
        
        </div>    <!--end of middle div-->  
    </div>    <!--end of container div--> 
    
    
    
    
    
    

    <footer id="footer" class="container-fluid text-center">
        <?php require_once 'php/footer.php'; echo $footer?>
    </footer>

</body>

</html>