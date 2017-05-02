
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
                        <li><a href="https://www.facebook.com/groups/2370182392/">Facebook</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h4>Join the Mailing List</h4>
                    <form action="" method="post" id="mailinglist" name="mailinglist" class="validate" >
                        Name:<br>
                        <input type="text" name="name" id="name" value="" tabindex="1" required /><br>


                       Email:<br>
                        <input type="text" name="email" id="email" value="" tabindex="1" required /><br><br>
                        

                        <input type="submit" value="Submit" class="button"  />
                        
                    </form>
                </div>
                <?php
        
                if(!empty($_POST['name'])&&!empty($_POST['email'])&&isset($_POST['submit'])) {  
            
                $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
                $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
        
        
                $sql = "INSERT INTO Malinglist (email, name) VALUES ";               
                    $sql .= "('$email', '$name')";
                    $sql .= ";";
                    $mysqli->query($sql);
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                    else{
                        print "<p>Thanks for subscripting to our mailing list!</p>";
                    }
                    
                    
                    //All email address and name will be stored into the database,
                    
                    
                }
                
        
        
        
        ?>
                
            </div>
        </div>
