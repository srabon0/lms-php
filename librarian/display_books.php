<?php
session_start();
if(!isset($_SESSION['librarian']))
{
    ?>
<script type="text/javascript">
window.location='login.php';
</script>

<?php
}
include 'header.php';
include 'conn.php';
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>DISPLAY and SEARCH BOOKS</h3>
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
                                <h2></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form action="" method="post" enctype="multipart/form-data">
                               
                               <input type='text' name='t1' class='form-control' placeholder='Enter book name'>
                               <input type='submit' name='submit1' value='Search book' class='btn btn-default'>
                               </form>
                                
                                <?php
                                
								if (isset($_POST["submit1"]))
								{
                                    
								    $sql="SELECT * FROM add_books WHERE books_name like '%".$_POST['t1']."%' ";
                                    $res=mysqli_query($conn,$sql) or die("Can't run query");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                        echo "<th>";echo 'Book Image'; echo"</th>";
                                        echo "<th>";echo 'Books Name'; echo"</th>";
                                        echo "<th>";echo 'Author Name'; echo"</th>";
                                        echo "<th>";echo 'Publication'; echo"</th>";
                                        echo "<th>";echo 'Book purchase date'; echo"</th>";
                                        echo "<th>";echo 'Books Price'; echo"</th>";
                                        echo "<th>";echo 'Books Quantity'; echo"</th>";
                                        echo "<th>";echo 'Books Available quantity'; echo"</th>";
                                        echo "<th>";echo 'Delete books'; echo"</th>";
                                    echo "</tr>";
                                    while($row=(mysqli_fetch_array($res)))
                                    {
                                        echo "<tr>";
                                            echo "<td>";?><img src="<?php echo $row['books_image'];?>" height="100" width="100" > <?php echo"</td>";
                                            echo "<td>";echo $row['books_name']; echo"</td>";
                                            echo "<td>";echo $row['books_author']; echo"</td>";
                                            echo "<td>";echo $row['books_publication_name']; echo"</td>";
                                            echo "<td>";echo $row['books_purchase_date']; echo"</td>";
                                            echo "<td>";echo $row['books_price']; echo"</td>";
                                            echo "<td>";echo $row['books_qty']; echo"</td>";
                                            echo "<td>";echo $row['available_qty']; echo"</td>";
                                            echo "<td>";?><a href='delete_books.php?id=<?php echo $row['id']; ?>' >Delete books</a> <?php echo"</td>";
                                            echo "</tr>";
                                    }
                                    echo "</table>";
								}
								else{
                                    $sql="SELECT * FROM add_books";
                                    $res=mysqli_query($conn,$sql) or die("Can't run query");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                        echo "<th>";echo 'Book Image'; echo"</th>";
                                        echo "<th>";echo 'Books Name'; echo"</th>";
                                        echo "<th>";echo 'Author Name'; echo"</th>";
                                        echo "<th>";echo 'Publication'; echo"</th>";
                                        echo "<th>";echo 'Book purchase date'; echo"</th>";
                                        echo "<th>";echo 'Books Price'; echo"</th>";
                                        echo "<th>";echo 'Books Quantity'; echo"</th>";
                                        echo "<th>";echo 'Books Available quantity'; echo"</th>";
                                        echo "<th>";echo 'Delete books'; echo"</th>";
                                    echo "</tr>";
                                    while($row=(mysqli_fetch_array($res)))
                                    {
                                        echo "<tr>";
                                            echo "<td>";?><img src="<?php echo $row['books_image'];?>" height="100" width="100" > <?php echo"</td>";
                                            echo "<td>";echo $row['books_name']; echo"</td>";
                                            echo "<td>";echo $row['books_author']; echo"</td>";
                                            echo "<td>";echo $row['books_publication_name']; echo"</td>";
                                            echo "<td>";echo $row['books_purchase_date']; echo"</td>";
                                            echo "<td>";echo $row['books_price']; echo"</td>";
                                            echo "<td>";echo $row['books_qty']; echo"</td>";
                                            echo "<td>";echo $row['available_qty']; echo"</td>";
                                            echo "<td>";?><a href='delete_books.php?id=<?php echo $row['id']; ?>' >Delete books</a> <?php echo"</td>";
                                            echo "</tr>";
                                    }
                                    echo "</table>";

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