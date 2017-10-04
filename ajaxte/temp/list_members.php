<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/
//if($_SESSION["user"])
?>

<table class="table_list" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>Full name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Delete member</th>
        <th>UnDelete member</th>
    </tr>
    <?php
		// display the list of all members in table view
        //$sql = "SELECT * FROM members WHERE visibility = '1' ORDER BY id ASC";
        $sql = "SELECT id,username,full_name,password,email,age,visibility,lock_user,location_id FROM members ORDER BY id ASC";
        $query = $pdo->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
        //$bg = 'bg_1';
        foreach ($list as $rs) {
            ?>
            <tr class="<?php echo $bg; ?>">
                <td><?php echo $rs['id']; ?></td>
                <td><?php echo $rs['username']; ?></td>
                <td><?php echo $rs['full_name']; ?></td>
                <td><?php echo $rs['email']; ?></td>
                <td><?php echo $rs['age']; ?></td>
                <td><?php echo $rs['visibility']; ?></td>
                <td><?php echo $rs['lockuser']; ?></td>
                <td><a href="#" class="delete_m" onclick="delete_member(<?php echo $rs['id']; ?>)"><img src="images/delete.png"> Delete</a></td>
                <td><a href="#" class="delete_m" onclick="undelete_member(<?php echo $rs['id']; ?>)"><img src="images/delete.png"> UnDelete</a></td>
            </tr>
            <?php
            if ($bg == 'bg_1') {
                $bg = 'bg_2';
            } else {
                $bg = 'bg_1';
            }
        }
    ?>
</table>