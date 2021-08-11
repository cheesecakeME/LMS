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


    </div>

    <div class="clearfix"></div>
    <div class="row" style="min-height:500px">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="font-family:futura; font-size:30px;font-weight: 500;">ADD BOOK</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Book Name" name="booksname" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="file" name="f1" id="image" required>
                                    Book Image
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Book Author" name="booksauthor" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Book Publisher" name="bookspublisher" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="ISBN" name="ISBN" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Book Price" name="booksprice" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Book Quantity" name="booksquantity" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Available Quantity" name="availquantity" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type=submit name="insert" class="btn btn-primary" value="Insert Book Details" id="insert">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<?php
if(isset($_POST['insert']))
{
   
    
   $tm=md5(time());
    $fnm=$_FILES["f1"]["name"];
    $dst="./books_img/".$tm.$fnm;                        //source to destination
    $dst1="/books_img/".$tm.$fnm;                         // for storing inside the table
    
    move_uploaded_file($_FILES["Book1"]["tmp_name"],$dst);
    mysqli_query($link,"insert into add_book values('','$_POST[booksname]','$dst','$_POST[booksauthor]','$_POST[bookspublisher]','$_POST[ISBN]','$_POST[booksprice]','$_POST[booksquantity]','$_POST[availquantity]')");
    
    ?>
<script type="text/javascript">
    alert("Book Added Successfully");

</script>

<?php
    
    
    
}

?>


<?php
include 'footer.php';
?>

