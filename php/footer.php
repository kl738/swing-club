<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="footer">
            <div class="row">
                <div class="col-sm-4">
                    <h4>Site Map</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="eboard.php">E-board members</a></li>
                        <li><a href="history.php">History</a></li>
                        <li><a href="codeofet.php">Code of Etiquette</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="calendar.php">Calendar</a></li>
                        <li><a href="class.php">Class</a></li>
                        <li><a href="gallery.php">Gallery</a><br></li>
                        <li><a href="suggestion.php">Suggestion</a></li>
                        <li><a href="contactinfo.php">Contact Info</a></li>
                        <li><a href="login.php">Login</a></li>

                    </ul>
                </div>
              
                <div class="col-sm-4">
                    <h4>Links</h4>
                    <ul>

                        <li><a href="https://www.facebook.com/groups/2370182392/" class="fa fa-facebook"></a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="https://www.facebook.com/groups/2370182392/">Facebook</a></li>
                        <br>
                        <li><a class="fa fa-twitter"></a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a>Twitter</a></li>
                        <br>
                        <li><a class="fa fa-vimeo"></a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a>Vimeo</a></li>
                
                        <li><a href="http://ithacaswing.org">Ithaca Swing Dance Network</a></li>
                        <li><a href="http://www.groovejuiceswing.com">Groove Juice Swing</a></li>
                        <li><a href="http://www.ithaca.edu/orgs/icswingdanceclub/">Ithaca College Swing</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h4>Join the Mailing List</h4>
                    
                    <?php if(isset($_SESSION["user"])){  ?>
    
                    <li><a href="mailinglist.php">View Mailing List</a></li>
                    <li><a href="getemails.php">Download Mailing List</a></li>
                    <?php }else{ ?>
    
    
                    
                    
                    
                    <form action="" method="post" id="mailinglist" name="mailinglist" class="validate" >
                        Name:<br>
                        <input type="text" name="name" id="name" value="" tabindex="1" required /><br>


                       Email:<br>
                        <input type="text" name="email" id="email" value="" tabindex="1" required /><br><br>
                        

                        <input type="submit" value="Submit" class="button" name="submit"  />
                        
                    </form>
                    
                    
                </div>
                <?php
                require_once 'php/config.php'; 
                $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                
                

                $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
                $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
            
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) { //credit to https://www.w3schools.com/php/php_form_url_email.asp
                    print "Only letters and white space allowed";
                }
                
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)&&!empty($_POST['email'])) {
                    print "Invalid email format";
                }
                
                else if($email !=""&&isset($_POST['submit'])){  
            
                    
                    
        
                    $sql = "INSERT INTO Mailinglist (email, name) VALUES ";               
                    $sql .= "('$email', '$name')";
                    $sql .= ";";
                    $mysqli->query($sql);
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                    else{
                        print "Thanks for subscripting to our mailing list!";
                    }
                    
                    
                    //All email address and name will be stored into the database,
                    
                    
                }
            }
                
              
                
        
        
        
        ?>
                
            </div>
        </div>
