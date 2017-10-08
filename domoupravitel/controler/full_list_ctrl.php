<h3>Full list</h3>
<table class="table_list" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>Floor</th>
        <th>app num</th>
<!--        <th>Name</th>-->
        <th>Family</th>
        <th>age</th>
        <th>pic</th>
        <th>amount</th>

    </tr>
    <?php
    require_once "../model/config.php";
    $pdo = connect();
    $sql = "SELECT a.floor, a.`number`, a.family_name, u.`name`, u.age, sum(p.amount) as apamount, a.family_image_url , p.`comment`
FROM adkap as a
NATURAL LEFT JOIN adkus as u
NATURAL LEFT JOIN adkpay as p
GROUP BY number";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $list = $stmt->fetchAll();
    foreach ($list as $rows) {
        ?>
        <tr class="">
            <td>floor: <?php echo $rows['floor']; ?></td>
            <td><?php echo $rows['number']; ?></td>
<!--            <td>--><?php //echo $rows['name']; ?><!--</td>-->
            <td><?php echo $rows['family_name']; ?></td>
            <td><?php echo $rows['age']; ?></td>
            <td><img width="auto" height="60" src="<?php echo $rows['family_image_url']; ?>" alt=""></td>
            <td><?php echo $rows['apamount']; ?></td>

        </tr>
        <?php

    }
    ?>
</table>