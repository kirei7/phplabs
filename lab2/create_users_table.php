<?php
include("../../inc.php");
include("inc_tab.php");


$db = mysqli_connect($server, $user, $pwd, $dbase);

echo "<h4>Створюємо таблицю \"Users\" ...</h4>";

mysqli_query($db,"DROP TABLE Users");
if(!mysqli_query($db,"CREATE TABLE Users (
id INT NOT NULL auto_increment,
name CHAR(50),
email VARCHAR(255),
password VARCHAR(255),
PRIMARY KEY(id))"
)){
echo("Error : " . mysqli_error($db));
}

echo"<h4>Таблиця успішно створена</h4>";
mysqli_close($db);

?>