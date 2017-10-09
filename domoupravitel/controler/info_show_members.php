
    <?php
    require_once "../model/config.php";
    $pdo = connect();
    $sql = "SELECT count(u.name) as count_memebrs FROM adkus as u";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array());
    $list = $stmt->fetchAll();
    foreach ($list as $rows) {
        ?>

            <h1>jiveeshti v sgradata: <?php echo $rows['count_memebrs']; ?></h1>

        <?php

    }
    ?>
