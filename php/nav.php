
		<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
            <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ABOUT<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="eboard.php">E-board members</a></li>
                        <li><a href="history.php">History</a></li>
                        <li><a href="codeofet.php">Code of Etiquette</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">EVENT<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="calendar.php">Calendar</a></li>
                        <li><a href="class.php">Class</a></li>
                        </ul>
                    </li>
                    <li><a href="gallery.php">GALLERY</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">CONTACT<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="suggestion.php">Suggestion</a></li>
                        <li><a href="contactinfo.php">Contact Info</a></li>
                        </ul>
                    </li>
                    <?php if(isset($_SESSION["user"])){?>
    
                    <li><a href="logout.php">LOGOUT</a></li>
    
                    <?php }else{ ?>
    
    
                    <li><a href="login.php">LOGIN</a></li>
                    <?php } ?>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
?>

