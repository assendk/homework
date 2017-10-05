<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM crud WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
<?php
include('../model/config.php');
$pdo = connect();
$id = $_GET['id'];
// deleting a member using PDO with try/catch to escape the exceptions
try {
//$sql = "DELETE FROM members WHERE id = :id";
//$sql = "UPDATE members SET visibility='0' WHERE id = :id";
//$sql = "DELETE FROM tickets WHERE id = :id";
$sql = "DELETE FROM tickets WHERE id = $id";
$query = $pdo->prepare($sql);
$query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
$query->execute();
header("../view/main.php");
} catch (PDOException $e) {
echo 'PDOException : '.  $e->getMessage();
}
?>