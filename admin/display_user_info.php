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
                        <h2 style="font-family:futura; font-size:30px;font-weight: 500;">USER INFORMATION</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                                $res=mysqli_query($link,"SELECT * FROM user_registration ")or die( mysqli_error($link));
                                echo "<table class ='table table-bordered table-hover'>";
                                echo "<tr>";
                                
                                echo "<th>"; echo"USERNAME"; echo "</th>";
                                echo "<th>"; echo"EMAIL"; echo "</th>";
                                echo "<th>"; echo"ENROLLMENT No."; echo "</th>";
                                echo "<th>"; echo"STATUS"; echo "</th>";
                                echo "<th>"; echo"APPROVE"; echo "</th>";
                                echo "<th>"; echo"DISAPPROVE"; echo "</th>";
                                echo"</tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo"<tr>";
                                echo "<td>"; echo $row["username"]; echo "</td>";
                                echo "<td>"; echo $row["email"]; echo "</td>";
                                 echo "<td>"; echo $row["enrollment"]; echo "</td>";
                                echo "<td>"; echo $row["status"]; echo "</td>";
                                echo "<td>"; ?> <a href="Approved.php?id=<?php echo $row['id']; ?>"><i class="fa fa-check-square" aria-hidden="true"></i></a> <?php echo"</td>";
                                echo "<td>"; ?> <a href="NotApproved.php?id=<?php echo $row['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a> <?php echo"</td>";
                                    echo"</tr>";
                                }
                                echo "</table>";
                                
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
