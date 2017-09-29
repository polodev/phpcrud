<?php 

$host = 'localhost';
$dbname = 'crud';
$user = 'root';
$password = '';

$conn = mysqli_connect($host, $user, $password, $dbname);

if ($conn->connect_errno) {
  echo 'not connected';
}else {
  echo 'connect successfully';  
}
echo '<br/>';

//create 
if ( $conn->query( "INSERT INTO people(name, email) VALUES ('tanim', 'tanim@gmail.com')" ) ) {
  echo 'successfully added new row in database <br/>';

}
echo '<br/>';

//read
$results = $conn->query('SELECT * FROM people');
while($row = $results->fetch_assoc()) {
  echo $row['name'] . " " . $row['email'] . '<br/>';
}
echo '<br/>';


//update 

if ( $conn->query( "UPDATE PEOPLE SET name='kayes', email='kayes@gmail.com' WHERE id=3" ) ) {
  echo 'successfully added update row in database <br/>';
}
echo '<br/>';

//delete 
if ( $conn->query( "DELETE FROM people WHERE id=3" ) ) {
  echo 'delete id 3<br/>';

}
echo '<br/>';