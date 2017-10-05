<?php

?>

<table class="table_list" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>image</th>
        <th>Owner</th>
        <th>Email</th>
        <th>Offer</th>
        <th>price</th>
    </tr>
    <?php
    $user_id = "";
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    }

    // display the list of all members in table view
    //$sql = "SELECT * FROM members WHERE visibility = '1' ORDER BY id ASC";
    //$sql = "SELECT id,username,full_name,password,email,age,visibility,lock_user,location_id FROM members ORDER BY id ASC";
    //var_dump($user_id);

    //$sql = "SELECT * FROM tickets WHERE ti_owner = $user_id ORDER BY ti_price ASC"; //good
    $sql = "SELECT m.username, m.full_name, m.email, t.img_url, t.ti_text, t.ti_price FROM members as m
    INNER JOIN tickets as t
    ON t.ti_owner = m.id
    AND m.visibility=1
    ORDER BY t.ti_price DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();

    foreach ($list as $rows) {
        ?>
        <tr class="">
            <td><img height="60" width="auto" src="..<?php echo $rows['img_url']; ?>" alt=""></td>
            <td><?php echo $rows['full_name']; ?></td>
            <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['ti_text']; ?></td>
            <td><?php echo $rows['ti_price']; ?>$</td>
        </tr>

        <?php
    }

    ?>
</table>