<?php
//proveravamo da li je trazeni GET parametar prosledjen (setovan)
if(isset($_GET['id'])){
	//ako jeste, smestamo vrednost GET parametra u promenljivu $id
	$id = $_GET['id'];
	//zatim ukljucujemo konekciju ka bazi
	require 'connect.php';
	//pisemo upit za bazu gde ce biti obrisani oni redovi u bazi koji sadrze navedeni id
	$query = "DELETE FROM admitted_2019 WHERE id = {$id}";
	//izvrsavamo upit 
	mysqli_query($conn, $query);
	//izvrsavamo redirekciju na stranu sa koje smo dosli
	header("Location: ../remove.php");
}
?>