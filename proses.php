<?php


$mysqli = new MySQLi('localhost','root','','learning');
/* Connect to database and set charset to UTF-8 */
if($mysqli->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  exit;
} else {
  $mysqli->set_charset('utf8');
}
/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term'])); 
$a_json = array();
$a_json_row = array();
if ($data = $mysqli->query("SELECT * FROM user WHERE no_induk LIKE '%$term%' OR namabelakang LIKE '%$term%' ORDER BY namadepan , namabelakang")) {
	while($row = mysqli_fetch_array($data)) {
		$firstname = htmlentities(stripslashes($row['namadepan']));
		$lastname = htmlentities(stripslashes($row['namabelakang']));
		$code = htmlentities(stripslashes($row['no_induk']));
		$kelamin=htmlentities(stripcslashes($row['kelamin']));
		$a_json_row["id"] = $code;
		$a_json_row["value"] = $code;
		$a_json_row["label"] = $code.' '.$firstname.' '.$lastname;
		$a_json_row["nm"] = $firstname.' '.$lastname;
		$a_json_row["jn"] = $kelamin;

		array_push($a_json, $a_json_row);
	}
}
// jQuery wants JSON data
echo json_encode($a_json);

flush();
 
$mysqli->close();
?>