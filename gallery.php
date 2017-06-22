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
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" sizes="144x144" href="images/apple-icon-144x144.png">
</head>

<body id="myPage">
    <?php include_once("php/analyticstracking.php"); ?>
    <div id='nav'>
    <?php include 'php/nav.php'; ?>
    </div>

    <div class="container-fluid bg-grey">
        <h1>Gallery</h1>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="imgModal">
        <div id="modalCaption"></div>
    </div>

    <script>
    var modal = document.getElementById('myModal');

    var modalImg = document.getElementById("imgModal");
    var captionText = document.getElementById("modalCaption");
    var navBar = document.getElementById("nav")

    function showModal(imgSrc, imgCaption){
        modal.style.display = "block";
        modalImg.src = imgSrc;
        nav.style.display = "none";
        //captionText.innerHTML = imgCaption;
    }

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() { 
        modal.style.display = "none";
        nav.style.display = "block";
    }
    </script>
    
    

    <div class="container-fluid">
    <?php 
    require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    // get album id from the url
    if(!empty($_GET['albumid']))        
        $albumid = filter_input(INPUT_GET, 'albumid', FILTER_SANITIZE_NUMBER_INT);
    else
        $albumid = 0;
   
        
    // The dropdown selection for the album
    print "Select album: &nbsp;&nbsp; <select name='album' onChange='location = this.value;'>";
    
    print "<option value='gallery.php?albumid=0'>Default</option>";
    print "<option value='gallery.php?albumid=0'>All photos</option>";
//sql1
    $sql = 'SELECT * from Album;';
    $result = $mysqli->query($sql);    
    while ($row = $result->fetch_assoc()) {
        
        print "<option value='gallery.php?albumid={$row[ 'albumID' ]}'>{$row[ 'name' ]}</option>";
        
    }
    print "</select>";
    // end of the dropdown menu of album
        
        
    //Display all photos
    if($albumid==0){
        print "<h1 class='container-fluid text-center'>All photos</h1>";
//sql2
        $sql = 'SELECT Photo.photoID, path, credit, caption FROM Photo left outer join EBoard on Photo.photoID=EBoard.photoID where EBoard.photoID is null;';
        $result = $mysqli->query($sql);
        
            print('<div class="row">');
            $i=1;
            while ($row = $result->fetch_assoc()) {
				 
                print('<div class="col-md-4 col-centered">');

                    print("<div class = imgDiv>");
                    
                    $index = $row['photoID'];
                    
			        print( "<div class = 'imgContainer'><img src = images/{$row[ 'path' ]} class = 'img' alt = 'image' onclick='showModal(this.src,this.alt)'></div>" );
                    print( "<div class = 'captionContainer'><span class = 'imgList'>Caption: {$row[ 'caption' ]}</span>" );
                    print( "<span class = 'imgList'>Credit to: {$row[ 'credit' ]}</span>" );
                    
                    if(isset($_SESSION['user'])){
					    $href = "edit.php?image_id=$index";
                        print( "<span class = 'imgList'><a href='$href' title='$href'>Edit</a></span>" );
					  
                        $href = "delete.php?image_id=$index";
                        print("<span class = 'imgList'><a href='$href' title='$href'>Delete</a></span>");   
                    }         
				    print("</div></div>"); 
                print("</div>");
                if ( $i % 3 === 0 ) { echo '</div><div class="row">';};
                $i++;
            }
            print('</div>');
    }
    
    //show different album
    else{
//sql3
        $sql = "SELECT name from Album where albumID = ?;";   
        $stmt = $mysqli->stmt_init();
        if($stmt->prepare($sql)){
            $stmt->bind_param('i', $albumid);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        
        $row = $result->fetch_assoc();
        print "<h1 class='container-fluid text-center'>{$row['name']}</h1>";
//sql4
        $sql = "SELECT Photo.photoID, path, credit, caption, Relation.albumID FROM Photo left outer join EBoard on Photo.photoID=EBoard.photoID inner join Relation ON Relation.photoID = Photo.photoID where EBoard.photoID is null and albumID = ?;"; 
        $stmt = $mysqli->stmt_init();
        if($stmt->prepare($sql)){
            $stmt->bind_param('i', $albumid);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        
        
        
        
        
            print('<div class="row">');
            $i=1;
            while ($row = $result->fetch_assoc()) {
				 
                print('<div class="col-md-4 col-centered">');

                    print("<div class = imgDiv>");
                    
                    $index = $row['photoID'];
                    
			        print( "<div class = 'imgContainer'><img src = images/{$row[ 'path' ]} class = 'img' alt = 'image' onclick='showModal(this.src,this.alt)'></div>" );
                    print( "<div class = 'captionContainer'><span class = 'imgList'>Caption: {$row[ 'caption' ]}</span>" );
                    print( "<span class = 'imgList'>Credit to: {$row[ 'credit' ]}</span>" );
                    
                    if(isset($_SESSION['user'])){
					    $href = "edit.php?image_id=$index";
                        print( "<span class = 'imgList'><a href='$href' title='$href'>Edit</a></span>" );
					  
                        $href = "delete.php?image_id=$index";
                        print("<span class = 'imgList'><a href='$href' title='$href'>Delete</a></span>");   
                    }         
				    print("</div></div>"); 
                print("</div>");
                if ( $i % 3 === 0 ) { echo '</div><div class="row">';};
                $i++;
            }
            print('</div>');
        
        
    }
        
        
        
        if(!empty($_POST['albumName'])&&$_POST['albumName']!=""){
            
            
            
                    $albumname = filter_input( INPUT_POST, 'albumName', FILTER_SANITIZE_STRING );
//sql5
                    $sql = "Insert INTO Album (name) VALUES (?);"; 
                    $stmt = $mysqli->stmt_init();
                    if($stmt->prepare($sql)){
                        $stmt->bind_param('s', $albumname);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }
                    
                    print "Album has been added successfully! ";
        }
        
           
                
                //add image to database
                if(isset($_POST["submit"])&&$_FILES['newImage']['error']!=UPLOAD_ERR_NO_FILE){
 
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
                    if(!empty($caption)&&!empty($credit)&& $newImage['error'] == 0)
                    {
//sql6
                        $sql = "INSERT INTO Photo (caption, path, credit) VALUES (?,?,?);";    
                        $stmt = $mysqli->stmt_init();
                        if($stmt->prepare($sql)){
                        $stmt->bind_param('sss', $caption, $originalName, $credit);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        } 
                    
                    
             
                    if(mysql_errno())
                        echo "MySQL error ".mysql_errno();
                   
                    }
                    
                    else 
					   print("<p>Error: The file $originalName was not uploaded.</p>");
                    
                    
                    //insert the relation into the realtion database if there is any.
                    
                    
                    if(!empty($_POST['albumChosen'])){
                        
                        
                        //get the created image ID
//sql7
                        $sql = "select * from Photo WHERE path = ?;";    
                        $stmt = $mysqli->stmt_init();
                        if($stmt->prepare($sql)){
                        $stmt->bind_param('s', $originalName);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        }
                       
                    
                        if(mysql_errno())
                            echo "MySQL error ".mysql_errno();
                    
                        $row = $result->fetch_assoc();
                        $imageIndex = $row['photoID'];
                    
                    
                    
                    
                        
                        $albumChosen = $_POST['albumChosen'];
                        
                        foreach($albumChosen as $index){
                        
                            
                        
//sql8  
                        $sql = "INSERT INTO Relation (albumID, photoID) VALUES ";
                        $sql.= "($index, $imageIndex);";
                        $mysqli->query($sql);
                        if(mysql_errno())
                            echo "MySQL error ".mysql_errno();
                        
                        }
                    }
             
                }
    
    
    //form for add photo
    if(isset($_SESSION['user'])){
    
    ?>
        
        
        <h1>Add photos</h1>
        <form method = "post" enctype="multipart/form-data">
            Caption: <input type="text" name="caption"> <br><br>
                
            Credit URL: <input type="text" name="credit"> <br><br>  
            
            Album(s):&nbsp;
            
        <?php
        
//sql9
            $result = $mysqli->query("Select * From Album where name!='All photos';");
            while ($row = $result->fetch_assoc()) {
            $id = $row['albumID'];
            print( "<input type='checkbox' name='albumChosen[]' value='$id'>&nbsp;{$row['name']} &nbsp;" );
            
        }
            
            
            
        ?>
            
            Add New Album: <input type="text" name="albumName">
                
            <p>
				<label>Image upload: </label>
				<input id="newImage" type="file" name="newImage" accept=".jpg, .jpeg, .png">
				
			</p>
                
            
            
            <input type="submit" name = 'submit' value="Submit">
            </form>   
        
        
        
        
        
    <?php } ?>
    
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>