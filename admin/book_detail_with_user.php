<?php
session_start();
if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location"login.php";
    </script>
    
    
    <?php
}
include 'header.php';
include'connection.php';
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 style="font-family:futura; font-size:30px;font-weight: 500;">BOOK DETAILS</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                             <?php
                              $i=0;
                                $res=mysqli_query($link,"select * from add_book")or die( mysqli_error($link));
                                echo"<table class='table table-bordered'>";
                                echo"<tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                $i=$i+1;
                                echo "<td>";
                                ?><img src="../admin/<?php echo $row["books_img"]; ?>" height="100" width="100"> <?php
                                echo"<br>";
                                echo "<b>".$row["book_name"]."</b>";
                                echo"<br>";
                                     echo "<b>"."Total Books:".$row["book_quantity"]."</b>";
                                echo"<br>";
                                echo"<b>". "available:".$row["available_quantity"]."</b>";
                                echo "<br>";
                                ?><a href="user_with_this_book.php?book_name=<?php echo $row["book_name"]; ?>">User Record of This Book</a><?php
                                echo "</td>";
                                    
                                if($i==2)
                                {
                                    echo "</tr>";
                                    echo "<tr>";
                                    $i=0;
                                }
                                    
                                }
                                echo"</tr>";
                                echo"</table>";
                             
                             
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
       