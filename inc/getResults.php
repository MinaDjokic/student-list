<?php

require 'connect.php';

if(isset($_GET['criteria'])){
	if(!empty($_GET['criteria'])){
		$criteria = trim($_GET['criteria']);
		$criteria = mysqli_real_escape_string($conn, $criteria);
		$criteria = str_replace("_","\_", str_replace("%", "\%" , $criteria));
		$query = "SELECT * FROM admitted_2019 WHERE fname LIKE '%{$criteria}%' OR lname LIKE '%{$criteria}%' OR faculty LIKE '%{$criteria}%'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
				?>
				<div id="result">
					<img src="img/user.jpg">
					<p><b>Name: </b><?php echo $row['fname'] . " " . $row['lname']; ?></p>
					<p><b>Faculty: </b><?php echo $row['faculty']; ?></p>
				</div>
				<?php
			}
			echo "Number of results: " . mysqli_num_rows($result);
		} else {
			echo 'No results.';
		}	
	} else{
		echo 'Criteria is empty.';
	}
}

?>