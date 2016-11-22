<!DOCTYPE html>
<html>
<body>

<?php
//@author Gerard
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

    // Opdracht Titel
    echo "<label>Opdracht:</label> ";
        echo $row['titel'];
    echo "<hr>";
    // Opdracht Type
    echo "<label>Type:</label> ";
        echo $row['type'];
    echo "<hr>";
    // Opdracht Beschrijving
    echo "<label>Beschrijving:</label> ";
        echo $row['beschrijving'];
    echo "<hr>";
    // Individuele of Groeps opdracht
    echo "<label>Individuele of groeps opdracht:</label> ";
        echo $row['individueelofgroepsopdracht'];
    echo "<hr>";
    // Opdracht Deadline
    echo "<label>Deadline:</label> ";
        echo $row['deadline'];
    echo "<hr>";
    // Opdracht status
    echo "<label>Status:</label> ";
        echo $row['status'];
    echo "<hr>";
    // Link naar opdracht
    echo "<label>Link naar opdracht:</label> ";
        echo "<a href='$row[link]'>" . $row['link'] . "</a>";

    echo "<hr>";
    echo "<div class='panel-body opdrachtacties customdiv' style='padding: 1px;'>";
    echo "<a href= 'feedback' class='btn btn-primary' id='uitnodigen' style='width: 48%;'>Zie Feedback <span class='fa fa-comments'></span></a>";
    echo "<a href='#' class='btn btn-primary' id='reflecteren' style='width: 48%; float: right;'>Reflecteren <span class='fa fa-pencil-square-o'></span></a>";
    echo "</div>";
}

// sluit verbinding
mysqli_close($con);
?>
</body>

<!-- Javascript src -->
<script src="js/opdrachten.js"></script>

</html>





