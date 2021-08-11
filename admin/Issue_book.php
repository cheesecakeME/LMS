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
include 'connection.php';
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
                        <h2 style="font-family:futura; font-size:30px;font-weight: 500;">ISSUE BOOKS</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form name="form" action="" method="post" class="form control">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <select class="form-control selectpicker" name="enr">
                                            <?php
                                            $res=mysqli_query($link,"select enrollment from user_registration") or die( mysqli_error($link));
                                            while ($row=mysqli_fetch_array($res))
                                            {
                                                echo"<option>";
                                                echo $row['enrollment'];
                                                echo"</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" value="search" name="submit" class="form-control btn btn-outline-primary">
                                    </td>
                                </tr>
                            </table>
                            <?php
                            if(isset($_POST['submit']))
                                $res=mysqli_query($link,"select * from user_registration where enrollment=$_POST[enr]") or die( mysqli_error($link));
                                while($row=mysqli_fetch_array($res))
                                {
                                    $username=$row["username"];
                                    $email=$row["email"];
                                    $enrollment=$row["enrollment"];
                                    $_SESSION["enrollment"]=$enrollment;
                                    $_SESSION["susername"]=$enrollment;
                                    
                                }
                                ?>
                            <table class="table table-bordered"  >
                                <tr>
                                    <td><input type="text"  class="form-control" placeholder="Enrollment" name="enrollment" value="<?php echo $_SESSION['enrollment']; ?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="booksname" class="form-control selectpicker">
                                            <?php
                                        $res=mysqli_query($link,"select book_name from add_book")or die( mysqli_error($link));
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            echo "<option>";
                                            echo $row['book_name'];
                                            echo "</option>";
                                        }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Book Issue Date" name="book_issue_date" value="<?php echo date('d-M-Y')?>" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="submit" class="form-control btn btn-default btn-primary"  name="submit1" value="Issue Book">
                                    </td>
                                </tr>
                            </table>




                        </form>
                        <?php
    
                        if(isset($_POST['submit1']))
                        {
                            
                            
                            $qty=0;
                            $res=mysqli_query($link,"select * from add_book where book_name='1984' ")or die( mysqli_error($link));
                            while($row = mysqli_fetch_array($res))
                            {
                                $qty=$row[available_quantity];
                            }
                            
                            if($qty==0)
                            {
                               ?>
                        <strong>This Book is currently unavailable</strong>
                        <?php
                            }
                            
                            else{
                            mysqli_query($link,"insert into issue_book values('','$_SESSION[enrollment]','$_SESSION[susername]','$_POST[email]','1984','$_POST[book_issue_date]','')");
                                mysqli_query($link,"update add_book set available_quantity=available_quantity-1 where book_name='1984'");
                                ?>
                        <script type="text/javascript">
                            alert("Book Issued Successfully");
                            window.location.href = window.location.href;

                        </script>
                        <?php  
                      }
                          
                        }
                        
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
