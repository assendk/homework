<?php
$dsn = "mysql:host=127.0.0.1:3306;dbname=adk";
$pdo = null;
try {
    $pdo = new PDO($dsn, 'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "error:" . $e->getMessage();
}

mysql_connect("localhost","root");
mysql_select_db("dbtuts");
$sql_query="SELECT * FROM users";
$result_set=mysql_query($sql_query);
if(isset($_GET['delete_id']))
{
    $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
    mysql_query($sql_query);
    header("Location: index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP Delete Data With Javascript Confirmation - By Cleartuts</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="jq-delete.js"></script>

    <script type="text/javascript">
        function delete_id(id)
        {
            if(confirm('Sure To Remove This Record ?'))
            {
                window.location.href='index.php?delete_id='+id;
            }
        }
    </script>
</head>
<body>


    <div id="header">
        <div id="content">
            <label>PHP Delete Data With Javascript Confirmation - By Cleartuts</label>
        </div>
    </div>
    <div id="body">
        <div id="content">
            <table align="center">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>Delete</th>
                </tr>
                <?php
                $result = mysql_query('SELECT * FROM my_table ORDER BY title ASC',$link);
                while($row = mysql_fetch_assoc($result)) {
                    echo '<div class="record" id="record-',$row['item_id'],'">
				<a href="?delete=',$row['item_id'],'" class="delete">Delete</a>
				<strong>',$row['title'],'</strong>
			</div>';
                }


                if(mysql_num_rows($result_set)>0)
                {
                    while($row=mysql_fetch_row($result_set))
                    {
                        ?>
                        <tr>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>

                            <td align="center"><a href="javascript:delete_id(<?php echo $row[0]; ?>)"><img src="b_drop.png" alt="Delete" /></a></td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <tr>
                        <th colspan="4">There's No data found !!!</th>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

    <div id="footer">
        <div id="content">
            <hr /><br/>
            <label>for more tutorials and blog tips visit <a href="http://cleartuts.blogspot.com"> : cleartuts.com</a></label>
        </div>
    </div>


</body>
</html>