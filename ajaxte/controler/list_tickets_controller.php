<?php
$sortingCode = "";
$sort_element = "ti_price";
$sort_type = "asc";

if (isset($_REQUEST['sort_element']) && $_REQUEST['sort_element'] != "") {
    $sort_element = " ORDER BY ".$_REQUEST['sort_element']." ";
}
if (isset($_REQUEST['sort_type']) && $_REQUEST['sort_type'] != "") {
    $sort_type = " ".$_REQUEST['sort_type']." ";
}
$sortingCode = "$sort_element $sort_type";

?>

<table class="table_list" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>image</th>
        <th>Offer</th>
        <!-- <th>price</th> -->
        <th>
            <a title="Click to sort by Age" href="../view/main.php?sort_element=ti_price&sort_type=<?php echo ($_REQUEST["sort_element"] == "ti_price"  && $_REQUEST["sort_type"] == "asc") ? "desc" : "asc"; ?>">Price
                <?php if ($_REQUEST["sort_element"] == "ti_price" ) {  if($_REQUEST["sort_type"] == "desc" ) { ?>
                    <span>asc</span>
                <?php } else { ?>
                    <span>Desc</span>
                <?php } } ?>
            </a>
        </th>
        <th>Delete</th>
    </tr>
    <?php
    $user_id = "";
    if (isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }

    // display the list of all members in table view
    //$sql = "SELECT * FROM members WHERE visibility = '1' ORDER BY id ASC";
    //$sql = "SELECT id,username,full_name,password,email,age,visibility,lock_user,location_id FROM members ORDER BY id ASC";
    //var_dump($user_id);
    require_once "../model/config.php";
    $pdo = connect();

    //$sql = "SELECT * FROM tickets WHERE ti_owner=$user_id ORDER BY ti_price ASC";
    $sql = "SELECT * FROM tickets WHERE ti_owner=$user_id AND 1 $sortingCode";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();

    foreach ($list as $rows) {
        ?>
        <tr class="">
            <td><img height="60" width="auto" src="..<?php echo $rows['img_url']; ?>" alt=""></td>
            <td><?php echo $rows['ti_text']; ?></td>
            <td><?php echo $rows['ti_price']; ?>$</td>
            <td><a href="#" class="delete_m" onclick="delete_ticket(<?php echo $rows['id']; ?>)">Delete</a> |
                <a href="../view/edit-ticket.php?id=<?= $rows['id'] ?>">Edit</a>

            </td>
        </tr>

        <?php
    }
    ?>
</table>