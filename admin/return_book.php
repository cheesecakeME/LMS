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
include 'connection.php';
include 'header.php';
?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>

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
                        <h2 style="font-family:futura; font-size:30px;font-weight: 500;">RETURN BOOK</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form name="form" action="" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><select name="enr" class="form-control">
                                            <?php
                                               $res=mysqli_query($link,"select enrollment from issue_book where book_return_date=''")or die( mysqli_error($link));
                                               while($row=mysqli_fetch_array($res))
                                               {
                                                   echo "<option>";
                                                   echo $row['enrollment'];
                                                   echo "</option>";
                                               }
                                               ?>
                                        </select></td>
                                    <td>
                                        <input type="submit" name="submit" value="search" class="form-control btn btn-primary">
                                    </td>

                                </tr>
                            </table>
                            <?php
                                    if(isset($_POST['submit']))
                                    {
                                         $res=mysqli_query($link,"select * from issue_book where enrollment='$_POST[enr]'")or die( mysqli_error($link));
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        
                                        echo "<th>"; echo "enrollment"; echo "</th>";
                                        echo "<th>"; echo"username"; echo "</th>";
                                        echo "<th>"; echo"email"; echo "</th>";
                                        echo "<th>"; echo"book name"; echo "</th>";
                                        echo "<th>"; echo"book issue date"; echo "</th>";
                                         echo "<th>"; echo"return book"; echo "</th>";
                                    
                                        
                                        echo "</tr>";    while($row=mysqli_fetch_array($res))
                                               {
                                            echo"<tr>";
                                            echo"<td>"; echo $row["enrollment"]; echo"</td>";
                                            echo"<td>"; echo $row["username"]; echo"</td>";
                                            echo"<td>"; echo $row["email"]; echo"</td>";
                                            echo"<td>"; echo $row["book_name"]; echo"</td>";
                                            echo"<td>"; echo $row["book_issue_date"]; echo"</td>";
                                             echo"<td>"; ?><a href="return.php?id=<?php echo $row["id"]; ?>"></a> <?php echo"</td>";
                                            echo"</tr>";
                                    }
                                        echo "</table>";
                                    
                                    }
                                    
                                    ?>



                        </form>





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
