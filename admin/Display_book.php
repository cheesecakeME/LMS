<?php
session_start();
if(!isset($_SESSION['admin']))
{
    ?>
<script type="text/javascript">
    window.location "login.php";

</script>


<?php
}
include 'connection.php';
include 'header.php';
?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
           

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="font-family:futura; font-size:30px;font-weight: 500;">DISPLAY BOOK</h2>
    
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">
                        <form name="form" action="" method="post" enctype="multipart/form-data">
                            <input type="text" name="t1" class="form-control" placeholder="Enter Book Name">
                            <input type="submit"  name="submit" value="Search" class="btn btn-primary">

                        </form>

                        <?php
                        
                        if(isset($_POST['submit']))
                        {
                           $res = mysqli_query($link, "select * from add_book where book_name like('$_POST[t1]')") or die( mysqli_error($link));
                                echo"<table class='table table-hover table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo "Book Image"; echo "</th>";
                                echo "<th>"; echo "Book Name"; echo "</th>";
                                 echo "<th>"; echo "Book Author"; echo "</th>";
                                 echo "<th>"; echo "Book Publisher"; echo "</th>";
                                 echo "<th>"; echo "ISBN"; echo "</th>";
                                 echo "<th>"; echo "Book Price"; echo "</th>";
                                 echo "<th>"; echo "Book Quantity"; echo "</th>";
                                echo "<th>"; echo "Available Quantity"; echo "</th>";
                                echo "<th>"; echo "Delete Books"; echo "</th>";
                        echo "</tr>";
                                while ($row = mysqli_fetch_array($res)){
                                     echo "<tr>";
                                echo "<td>";?> <img src="<?php echo $row["book_img"] ?>" alt="img" height="100" width="100"> <?php echo "</td>";
                                echo "<td>"; echo $row["book_name"]; echo "</td>";
                                echo "<td>"; echo $row["book_author"]; echo "</td>";
                                echo "<td>"; echo $row["book_publisher"]; echo "</td>";
                                echo "<td>"; echo $row["ISBN"]; echo "</td>";
                                echo "<td>"; echo $row["book_price"]; echo "</td>";
                                echo "<td>"; echo $row["book_quantity"]; echo "</td>";
                                echo "<td>"; echo $row["available_quantity"]; echo "</td>";
                                     echo"<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Book</a> <?php echo"</td>";
                                   echo "</tr>"; 
                                }
                        echo "</table>"; 
                        }
                       else {
                            
                        
                                $res = mysqli_query($link, "select * from add_book")or die( mysqli_error($link));
                                echo"<table class='table table-hover table-bordered'>";
                            echo "<tr>";
                           
                                echo "<th>"; echo "Book Image"; echo "</th>";
                                echo "<th>"; echo "Book Name"; echo "</th>";
                                 echo "<th>"; echo "Book Author"; echo "</th>";
                                 echo "<th>"; echo "Book Publisher"; echo "</th>";
                                 echo "<th>"; echo "ISBN"; echo "</th>";
                                 echo "<th>"; echo "Book Price"; echo "</th>";
                                 echo "<th>"; echo "Book Quantity"; echo "</th>";
                                echo "<th>"; echo "Available Quantity"; echo "</th>";
                            echo "<th>"; echo "Delete Books"; echo "</th>";
                        echo "</tr>";
                                while ($row = mysqli_fetch_array($res)){
                                     echo "<tr>";
                                     echo "<td>";  ?> <img src="<?php echo $row["book_img"] ?>" alt="img" height="100" width="100"> <?php    echo "</td>"; 
                                     echo "<th>"; echo $row["book_name"]; echo "</td>";
                                echo "<td>"; echo $row["book_author"]; echo "</td>";
                                echo "<td>"; echo $row["book_publisher"]; echo "</td>";
                                echo "<td>"; echo $row["ISBN"]; echo "</td>";
                                echo "<td>"; echo $row["book_price"]; echo "</td>";
                                echo "<td>"; echo $row["book_quantity"]; echo "</td>";
                                echo "<td>"; echo $row["available_quantity"]; echo "</td>";
                                   echo"<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Book</a> <?php echo"</td>";
                                   echo "</tr>"; 
                                }
                        echo "</table>";}
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php
include 'footer.php';
?>
