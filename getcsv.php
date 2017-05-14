<?php
	// output headers so that the file is downloaded rather than displayed
	header('Content-type: text/csv');
	header('Content-Disposition: attachment; filename="emails.csv"');
	 
	// do not cache the file
	header('Pragma: no-cache');
	header('Expires: 0');
	 
	// create a file pointer connected to the output stream
	$file = fopen('php://output', 'w');
	 
	// send the column headers
	fputcsv($file, array('Column 1', 'Column 2', 'Column 3', 'Column 4'));
	 
	require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 

    $sql = 'SELECT * from Mailinglist;';
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
    	fputcsv($file, $row);
    }
	 
	exit();
?>

