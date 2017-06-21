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
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" sizes="144x144" href="images/apple-icon-144x144.png">
</head>

<body id="myPage">
    
    
    
    <?php
        
        require_once "php/config.php";
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  
        $login = false;
    
    
    
        if(!empty($_POST['username'])&&!empty($_POST['password'])){
            $username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
            $password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
            
            
            $result = $mysqli->query('SELECT * FROM Users;');
        while($row = $result->fetch_assoc()){
            
            $hash = $row['hashpassword'];
            $hashuser = $row['username']; 
        
        
    
    
    
        if(password_verify($username, $hashuser)&& password_verify($password, $hash )){
                $_SESSION['user'] = $username;
                $login = true;
            }
            
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
            
            Username: <input type="text" name="username" required> <br/><br/>
                
            Password: <input type="password" name="password" required> <br/><br/>
                
            <input type="submit" name = 'submit' value="Submit">
                
            
            </form>  
            <?php
            }
            
            
            else{
                
            
            if($login)
                    echo "$username, you have logged in successfully!";
                
                else
                    print "Invalid username or passward!";
            
         
            
           
        
            
                
            }
            ?>
            
       
     
                
                
               
        
        </div>    <!--end of middle div-->  
    </div>    <!--end of container div--> 
    
    
    
    
    
    

    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>