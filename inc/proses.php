<?php
if(isset($_POST['query'])){
	//connect database
		@mysql_connect("localhost","root","");
		mysql_select_db("learning");
	//query
		$query = $_POST['query'];
	//search
		$sql=mysql_query("SELECT * FROM tbbarang WHERE namabarang LIKE= '".$username."'");
		$array= array();
		while (@$row = mysql_fetch_assoc($sql)) {
			$array[]= $row['namabarang'];

		}
	//return json
		echo json_encode($array);
}

?>