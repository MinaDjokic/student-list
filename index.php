<html>
<head>
	<title>Student details</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="wrap">
		<div id="search">
			<p style="color:#22175C; text-align:center";>Welcome to the Student List of our University!<br/><br/>
				You can search students by first/last name of the faculty.</p>
			<img src="img/search.png">
			<a href="insert.php"><img src="img/add.png" height="50px" title="Add new student"></a>
			<a href="remove.php"><img src="img/remove.png" height="50px" title="Remove student"></a>
			<form action="#" method="GET">
				<input type="text" name="criteria" placeholder="Criteria...">
				<input type="submit" value="Search"><br/>
			</form>
		</div>
		<?php
			include 'inc/getResults.php';
		?>
	</div>
</body>
</html>