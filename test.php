<?php
ini_set('session.save_path', '../sessions/');
session_start();
if(isset($_SESSION['views']))
    $_SESSION['views'] = $_SESSION['views']+ 1;
else
    $_SESSION['views'] = 1;

echo "views = ". $_SESSION['views'];
echo '<p><a href="test.php">Refresh</a></p>';
echo phpinfo();
if (!is_writable(session_save_path())) {
    echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
}
?>