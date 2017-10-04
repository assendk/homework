<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/
//if($_SESSION["user"])
?>

<table class="table_list" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>User name</th>
        <th>Full name</th>
        <th>Email</th>
        <th>Age</th>
        <th>visible</th>
        <th>Delete</th>
        <th>UnDelete</th>
    </tr>
    <?php
    // display the list of all members in table view
    //$sql = "SELECT * FROM members WHERE visibility = '1' ORDER BY id ASC";
    //$sql = "SELECT id,username,full_name,password,email,age,visibility,lock_user,location_id FROM members ORDER BY id ASC";
    $sql = "SELECT * FROM members ORDER BY id ASC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();
    //$bg = 'bg_1';
    foreach ($list as $rows) {
        ?>
        <tr class="">
            <td><?php echo $rows['username']; ?></td>
            <td><?php echo $rows['full_name']; ?></td>
            <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['age']; ?></td>
            <td><?php echo $rows['visibility']; ?></td>
            <td><a href="#" class="delete_m" onclick="delete_member(<?php echo $rows['id']; ?>)">Delete</a></td>
            <td><a href="#" class="delete_m" onclick="undelete_member(<?php echo $rows['id']; ?>)">UnDelete</a></td>
        </tr>
        <?php

    }
    ?>
</table>