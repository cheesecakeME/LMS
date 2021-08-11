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
include 'header.php';
include'connection.php';
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
                        <h2 style="font-family:futura; font-size:30px;font-weight: 500;">SEND MESSAGE TO USER</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="post" name="form1" class="col-lg-6" enctype="multipart/form-data">

                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td>
                                        <select class="form-control" name="dusername">
                                            <?php
                                            $res=mysqli_query($link,"select * from user_registration")or die(mysqli_error($link));
                                            
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                 ?>
                                            <option value="<?php echo $row["username"]; ?>">
                                                <?echo
                                                    echo $row["username"]."(".$row["enrollment"].")";
                                                    ?>
                                            </option>

                                            <?php 
                                                }
                                        
                                            ?>
                                        </select>
                                            </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Your Message <br>
                                        <textarea name="msg" class="form-control" placeholder="Your Message"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit1" value="Send Message" class="btn btn-primary"></td>
                                </tr>
                            </table>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php

if(print_r($REQUEST))
{
 mysqli_query($link,"insert into messages values('','$_SESSION[admin]','$_POST[dusername]','$_POST[subject]','$_POST[msg]','N')") or die(mysqli_error($link));   
?>
<script type="text/javascript">
    alert("message sent");

</script>


<?php
}
?>
<?php
include 'footer.php';
?>
