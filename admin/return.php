<?php
include'connection.php';
$id=$_GET["id"];
$a=date("d-M-Y");
$res=mysqli_query($link,"update issue_book set book_return_date='$a' where id=$id");
 $res=mysqli_query($link."select * from issue_book where id=$id");
while($row=mysqli_fetch_array($res))
{
    $book_name=$row["book_name"];
}
 mysqli_query($link,"update add_book set available_quantity=available_quantity+1 where book_name='$book_name'");
?>


<script type="text/javascript">
    window.location="return_book.php";
</script>