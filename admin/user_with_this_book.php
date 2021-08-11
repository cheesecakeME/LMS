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
include 'connection.php';
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
                                <h2 style="font-family:futura; font-size:30px;font-weight: 500;">USER LIST OF BOOK</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               
                               <?php
                                
                                $res=mysqli_query($link,"select * from issue_book where book_name='bookname'&& book_return_date='' ");
                                echo"<table class='table table-bordered'>";
                                echo"<tr>";
                                echo"<th>"; echo "Username"; echo"</th>";
                                echo"<th>"; echo "Book Name"; echo"</th>";
                                echo"<th>"; echo "Enrollment"; echo"</th>";
                                echo"<th>"; echo "Email"; echo"</th>";
                                echo"<th>"; echo "Book Issue Date"; echo"</th>";
                                echo"</tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo"<tr>";
                                echo"<td>"; echo $row["username"]; echo"</td>";
                                echo"<td>"; echo $row["book_name"]; echo"</td>";
                                echo"<td>"; echo $row["enrollment"]; echo"</td>";
                                echo"<td>"; echo $row["email"]; echo"</td>";
                                echo"<td>"; echo $row["book_issue_date"]; echo"</td>";
                                echo"</tr>";
                                }
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
       