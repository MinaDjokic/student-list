<html>
<head>
	<title>Student list</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="wrap">
		<div id="search">
			<img src="img/remove.png">
			<a href="index.php"><img src="img/search.png" height="50px" title="Search"></a>
			<a href="insert.php"><img src="img/add.png" height="50px" title="Add new student"></a>
			<?php
				//ukljucujemo konekciju ka bazi jer prvo moramo iscitati sve redove u bazi (da bismo stavili delete dugme pored svakog)
				require 'inc/connect.php';
				//pisemo upit za bazu
				$query = "SELECT * FROM admitted_2019";
				//sve sto smo dobili upitom smestamo u promenljivu result
				$result = mysqli_query($conn, $query);
				//proveravamo da li je broj redova koje smo dobili nazad veci od nula (da li postoji nesto u bazi)
				if(mysqli_num_rows($result) > 0){
					//ako ima kontakata u bazi, prolazimo kroz sve njih while petljom
					//u promenljivu row smestamo red po red koji dobijemo iz promenljive result, i to u obliku asoijativnog niza
					while ($row = mysqli_fetch_assoc($result)){
						//zatvaramo php i iscrtavamo sve kontakte koji postoje sa slicicom za uklanjanje
						//slicica ce ujedno biti link koji vodi na dokument koji sadrzi logiku brisanja reda u bazi
						//ovaj dokument treba da prihvati (GET)id parametar koji se trenutno ispisuje(do koga se stiglo)
						?>
							<div id="result">
								<a href = "inc/removeStudent.php?id=<?php echo $row['id'] ?>"><img src = "img/remove.png"/></a>
								<p><b>Name: </b><?php echo $row['fname'] . " " . $row['lname']; ?></p>
								<p><b>Faculty: </b><?php echo $row['faculty']; ?></p>
							</div>
						<?php
					}
				}else{
					echo "No students found.";
				}
			?>
		</div>
	</div>
</body>
</html>