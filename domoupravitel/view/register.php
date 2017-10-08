<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../model/config.php';

function insertFamImage($file_url, $family_name)
{
    $pdo = connect();
    $stm = $pdo->prepare("INSERT INTO adkap (family_image_url, family_name) VALUES (?, ?)");
    $params = array($file_url, $family_name);
    $stm->execute($params);
}

if (isset($_POST['register'])) {

    //Retrieve the field values from our registration form.
    $username = !empty(htmlentities($_POST['username'])) ? trim($_POST['username']) : null;
    $pass = !empty(htmlentities($_POST['password'])) ? trim($_POST['password']) : null;
    $age = !empty($_POST['age']) ? trim($_POST['age']) : null;

    $floor = htmlentities($_POST["floor"]);
    $apart_id = htmlentities($_POST["apart_id"]);
    $family_name = htmlentities($_POST["family_name"]);

    $year_debt = 216;

    //verifications
    if (strlen($_POST['username']) < 4) {
        $error[] = 'Username is too short.';
    } else {

        $pdo = connect();
        $sql = "SELECT COUNT(name) AS num FROM adkus WHERE name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($row['name']) || !empty($row['num'])) {
            $error[] = 'Username already exist.';
        }
    }


    if (strlen($pass) < 4) {
        $error[] = "Password too short";
    }
    //file upload
    $file_size_limit = 5*1024*1024;
    $file_renamed = "../uploads/family_placeholder.jpg";
    $upload_time = microtime();
    $target_path = "../uploads/";
    $allowed_ext = array("jpg","jpeg","png","gif");

    //$target_url = $target_path . basename($_FILES['family_image_url']['name']);
    $target_url = $target_path . $family_name ."-" . basename($_FILES['family_image_url']['name']);
    $file_name = $_FILES['family_image_url']['name'];
    $file_size = $_FILES['family_image_url']['size'];
    $file_type = $_FILES['family_image_url']['type'];
    $file_tmp = $_FILES['family_image_url']['tmp_name'];

    $check_ext = strtolower(end(explode('.', $file_name)));
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    if (in_array($ext, $allowed_ext)===false) {
        $errors[]="extension not allowed";
    }

    $file_renamed = $target_path. $family_name."-".$apart_id.".". $ext;
    if(file_exists("$file_renamed")) {
        unlink($file_renamed);
    }
    if ($ext == "" || $ext == null) {
        $file_renamed = $target_path. $family_name."--".$apart_id.".jpg";
    }

    if($file_size > $file_size_limit) {
        $errors[]="File too big, max size $file_size_limit bytes";
    }
    function check_file_uploaded_name ($file_name)
    {
        (bool) ((preg_match("`^[-0-9A-Z_\.]+$`i",$file_name)) ? true : false);
    }
    if (empty($errors)== true && check_file_uploaded_name($file_name)) {
        move_uploaded_file($_FILES['family_image_url']['tmp_name'], $file_renamed);
        //$file_uploaded = true;
    }

// end file insert

if (!isset($error)) {
    $encPass = sha1($pass);
    try {
        $pdo = connect();

        $stmt = $pdo->prepare("INSERT INTO adkap (`floor`, `number`, `family_name`, `family_image_url`) VALUES (?,?,?,?);");
        $stmt->execute(array($floor, $apart_id, $family_name, $target_url, ));
        $aid = $pdo->lastInsertId();


        //user table
        $stmt = $pdo->prepare("INSERT INTO adkus (`name`, `password`, `age`, apartment_id) VALUES (?,?,?,?);");
        $stmt->execute(array($username, $encPass, $age, $aid));
        $uid = $pdo->lastInsertId();
        $_SESSION['user_id'] = $uid;
        //adkpay
        $stmt = $pdo->prepare("INSERT INTO adkpay (`user_id`, `amount`) VALUES (?,?);");
        $stmt->execute(array($uid, $year_debt));

        //header("location: login.php");
    } catch (PDOException $e) {
        echo "insert PDO error: " . $e->getMessage();
    }

} else {
    $error[] = "Insert error";
}
if (!isset($error)) {
    $success = "Registration success";
}


}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="container" class="container">
<?php include "menu.php"; ?>

<h1>Register</h1>
<div>
    <?php
    if (isset($error)) {
    foreach ($error as $err) {
    echo '<p class="bg-danger">' . $err . '</p>';
    }
    }
    ?>
</div>
<form enctype="multipart/form-data" class="reglog" action="register.php" method="post">
    <!--    user-->
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br>
    <label for="family_name">Family name</label>
    <input type="text" id="" name="family_name"><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br>
    <label for="age">Age</label>
    <input type="number" id="age" name="age" min="1"><br>
    <!--    apartment-->
    <label for="floor">Floor</label>
    <input type="number" name="floor" min="1"><br>
    <label for="apart_id">Apart no.</label>
    <input type="number" name="apart_id" min="1"><br>
    <!--    file-->
    <label for="family_image_url">Family image:</label>
    <input type="file" name="family_image_url" accept="image/*"><br>
    <label for="register"></label>
    <input type="submit" name="register" value="Register">
</form>
<p><a href="login.php">Or login</a></p>
</div>
</body>
</html>