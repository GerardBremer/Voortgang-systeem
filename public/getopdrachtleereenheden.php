<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['q']);

// host, gebruikersnaam, wadhtwoord, database
$con = mysqli_connect('localhost','root','','vs');
if (!$con) {
    // toon error als er niet verbonden kan worden
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
// select from opdrachten where id gelijk is aan het id van de aangeklikte opdracht
$sql="SELECT * FROM opdrachten WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    // echo resultaat in een div, haal het resultaat uit de leereenheden rij in de opdrachten tabel in de database
    echo "<div class='col-md-12 well clickable customdiv leereenheid'>" . $row['leereenheden'] . "</div>";
}

// sluit verbinding
mysqli_close($con);
?>
</body>
</html>



