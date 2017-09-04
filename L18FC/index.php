<?php
include "header.php";

if(isset($_GET["page"])) {
    if($_GET["page"] == "contacts") {
        include "contacts.php";
    }
    if($_GET["page"] == "products") {
        include "products.php";
    }
} else {
    echo "<h1>THis is Homepage</h1>";
    echo "<a href=\"?page=contacts\">Kontakti</a>";
    echo "<a href=\"?page=products\">Products</a>";

}
?>
<div>




</div>

<?php
include "footer.php";
?>