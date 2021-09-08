<?php
session_start();
include 'header.php';
include 'conn.php';
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form name='form1' action="" method="POST" class='col-lg-6' enctype="multipart/form-data">
                                <table class='table table-bordered'>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Book name' name='booksname' required=''></td>
                                    <tr>
                                    <td>
                                    Book's image
                                    <input type='file'name='f1' required=''></td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Books author name' name='bauthorname'required=''></td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Publication name' name='pname'required=''></td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Purchase date' name='pdate'required=''></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Books price' name='bprice'required=''></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Books quantity' name='bqty'required=''></td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Available quantity' name='aqty'required=''></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><input type='submit' name='submit1' class='btn btn-default submit' value='Insert book details' style="background-color:blue; color:white"></td>
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
if (isset($_POST["submit1"]))
{
	$tm=md5(time());
    $fnm=$_FILES['f1']['name'];
    $dst="./books_image/".$tm.$fnm;
    $dst1="books_image/".$tm.$fnm;
    move_uploaded_file($_FILES['f1']['tmp_name'],$dst);
	mysqli_query($conn,"INSERT INTO add_books VALUES ('','$_POST[booksname]','$dst1','$_POST[bauthorname]','$_POST[pname]','$_POST[pdate]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')");
?>

	<script type="text/javascript">
	alert("books insert success");
	</script>
	<?php
}


?>


<?php
include 'footer.php';

?>