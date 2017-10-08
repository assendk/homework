<?php
// including the database connection file
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../model/config.php');
$pdo = connect();

if(isset($_POST['update']))
{

    $id = htmlentities($_POST['id']);

    $ti_text = htmlentities($_POST['ti_text']);
    $ti_price = htmlentities($_POST['ti_price']);

    // checking empty fields
    if(empty($ti_text) || empty($ti_price)) {

        if(empty($name)) {
            echo "<span style='color:red;'>Text field is empty.</span><br/>";
        }

        if(empty($age)) {
            echo "<span style='color:red;'>Price field is empty.</span><br/>";
        }
    } else {
        //updating the table
        //$result = mysqli_query($mysqli, "UPDATE tickets SET name='$name',age='$age',email='$email' WHERE id=$id");
        try {
            //$sql = "DELETE FROM members WHERE id = :id";
            //$sql = "UPDATE members SET visibility='0' WHERE id = :id";
            //var_dump($ti_text);
            $pdo = connect();
            //$sql = "UPDATE tickets SET ti_text='$ti_text', ti_price='$ti_price' FROM tickets WHERE id = :id";
            $sql = "UPDATE tickets SET ti_text=?, ti_price= ? WHERE id = ?";
            $query = $pdo->prepare($sql);
            $params = array($ti_text, $ti_price, $id);
            var_dump($query);
            $query->execute($params);
            //$query->bindParam(':id', $id, PDO::PARAM_INT);
            //$query->execute();
            header("location: ../view/main.php");
        } catch (PDOException $e) {
            echo 'PDOException : '.  $e->getMessage();
            //header("location: ../view/error.php");
        }

        //redirectig to the display page. In our case, it is index.php
        header("Location: main.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];



//selecting data associated with this particular id
//$result = mysqli_query($mysqli, "SELECT * FROM crud WHERE id=$id");
$sql = "SELECT * FROM tickets WHERE id=$id";
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();

foreach ($list as $rows) {
    $img_url_old = $rows['img_url'];
    $ti_text_old = $rows['ti_text'];
    $ti_price_old = $rows['ti_price'];
}
//while($res = mysqli_fetch_array($list))
//{
//    $ti_text = $res['ti_text'];
//    $ti_price = $res['ti_price'];
//
//}
var_dump($img_url_old);
?>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
    <?php include "menu.php" ?>
    <div class="content">
<h2>Edit Data</h2>

<br/><br/>

<form name="form1" method="post" action="edit-ticket.php">
    <table border="0">
        <tr>
            <td>Image</td>
            <td><img width="auto" height="60" src="..<?php echo $img_url_old;?>" alt=""></td>
        </tr>
            <td>Text</td>
            <td><input type="text" name="ti_text" value="<?php echo $ti_text_old;?>"></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="number" name="ti_price" value="<?php echo $ti_price_old;?>">$</td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
    </div>
</div>
</body>
</html>