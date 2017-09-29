<?php

//helpers for name 
function getName () {
  $names = ["Antwan", "Kelly", "Lindsay", "Kary", "Curtis", "Kelle", "Margarita", "Teri", "Elmer", "Peggie", "Marquerite", "Isabelle", "Amal", "Kathlyn", "Jack", "Lucius", "James", "Kallie", "Saturnina", "Thomasine", "Darren", "Daniele", "Elenora", "Yadira", "Laquanda", "Nerissa", "Carri", "Justine", "Shawanda", "Ulrike", "Miles", "Maryann", "Ione", "Rosella", "Annett", "Brent", "Jackie", "Loree", "Meda", "Eusebio", "Fonda", "Mercy", "Jestine", "Christeen", "Latricia", "Teena", "Alethea", "Hanna", "Leola", "Harrison"];
  return $names[rand(0, (count($names)-1))];
}



$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crud';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];


//connection 

try {
  $conn = new PDO("mysql:dbname=$dbname;host=$server", $user, $password, $options);
  echo 'connection successful';
} catch (PDOExceptions $e) {
  echo $e->getMessage();
}
echo '<br/>';


//create
$name = getName();
$email  = strtolower($name).'@gmail.com';
// $conn->query("INSERT INTO people (name, email) VALUES('dhaka', 'dhaka@gmail.com')");
$statement = $conn->prepare("INSERT INTO people (name, email) VALUES(:name, :email)");
$statement->execute([':name' => $name, ':email' => $email]);

echo '<br/>';

//read
$sql = "SELECT * FROM people";
$statement = $conn->prepare($sql);
$statement->execute();
while($row = $statement->fetch()) {
  echo '<b>Name:</b>: ' . $row->name . " <b>Email:</b> " . $row->email . '<br/>';
  echo '<br/>';
}

//update
$name = getName();
$email  = strtolower($name).'@gmail.com';
$statement = $conn->prepare("UPDATE people SET name=:name, email=:email WHERE id=28");
$statement->execute([':name' => $name, ':email' => $email]);

//delete 
$statement = $conn->prepare("DELETE FROM people WHERE id=:id");
$statement->execute([':id'=> 28]);


