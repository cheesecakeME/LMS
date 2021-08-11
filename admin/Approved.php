<?php
include 'connection.php';
$id=$_GET["id"];
mysqli_query($link ,"update user_registration set status='YES' where id=$id");
?>


<script type="text/javascript">
window.location="display_user_info.php";

</script>