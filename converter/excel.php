<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

if(isset($_POST["excel_user"])) {
   	$sql_query = "SELECT * FROM user";
}

if(isset($_POST["excel_query"])) {
	$sql_query = "SELECT * FROM query";
}

if(isset($_POST["excel_booking"])) {
	$sql_query = "SELECT * FROM booking";
}

$resultset = mysqli_query($conn, $sql_query);
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$developer_records[] = $rows;
}	
	
	$filename = "phpzag_data_export_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  


?>