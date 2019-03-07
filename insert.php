<html>
<head>
	<title>Student list</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="wrap">
		<div id="search">
			<img src="img/add.png">
			<a href="index.php"><img src="img/search.png" height="50px" title="Search"></a>
			<a href="remove.php"><img src="img/remove.png" height="50px" title="Remove student"></a>
			<form action="#" method="POST">
				<label>First name:<br/>
				<input type="text" name="fname"></label><br/>
				<label>Last name:<br/>
				<input type="text" name="lname"></label><br/>
				<label>Faculty:<br/>
				<input type="text" name="faculty"></label><br/>
				<input type="submit" name="insert" value="Insert"><br/>
			</form>
		</div>
		<div id="message">
			<?php
				//da li je dugme kliknuto uopste
				if(isset($_POST['insert'])){
					//da li su svi parametri prosledjeni
					if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['faculty'])){
						//da li je neki od parametara prosledjen a prazan
						if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['faculty'])){
							//trimujemo eventualni space sa pocetka i kraja unosa
							$fname = trim($_POST['fname']);
							$lname = trim($_POST['lname']);
							$faculty = trim($_POST['faculty']);
							//ukljucujemo dokument za konektovanje na bazu jer od ovoga trenutka pocinjemo da radimo na bazi
							require 'inc/connect.php';
							//osiguravamo se od sql injection-a - previdjaju se potencijalni specijalni karakteri koriscenji za sql upite
							$fname = mysqli_real_escape_string($conn, $fname);
							$lname = mysqli_real_escape_string($conn, $lname);
							$faculty = mysqli_real_escape_string($conn, $faculty);
							
							//upit za bazu
							$query = "INSERT INTO admitted_2019 (fname, lname, faculty) VALUES ('{$fname}','{$lname}','{$faculty}')";
							//upucivanje upita ka bazi i provera da li je taj upu bio uspesan
							if(mysqli_query($conn, $query) === TRUE){
								echo "New record successfully created.";
							}else{
								echo "Error!";
							}
						}else{
							echo "All fields must be filled in.";
						}
					}else{
						echo "All fields are required!";
					}
				}
			?>
		</div>
	</div>
</body>
</html>