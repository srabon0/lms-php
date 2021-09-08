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
include 'conn.php'
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
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
                                <h2>Student details of this book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
    $sql="SELECT * FROM issue_books WHERE book_name='$_GET[book_name]' && books_return_date='' ;";
    $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
    echo "<table class='table table-bordered'>";
    echo "<tr>";
     echo "<th>"; echo "Student name"; echo "</th>";
     echo "<th>"; echo "Student enrollment"; echo "</th>";
     echo "<th>"; echo "Books name"; echo "</th>";
     echo "<th>"; echo "Student email"; echo "</th>";
     echo "<th>"; echo "Student contact"; echo "</th>";
     echo "<th>"; echo "Student book issue date"; echo "</th>";

    echo "</tr>";
    while($row=mysqli_fetch_array($res)){
        echo "<tr>";
     echo "<td>"; echo $row["student_name"]; echo "</td>";
     echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
     echo "<td>"; echo $row["book_name"]; echo "</td>";
     echo "<td>"; echo $row["student_email"]; echo "</td>";
     echo "<td>"; echo $row["student_contact"]; echo "</td>";
     echo "<td>"; echo $row["books_issue_date"]; echo "</td>";

    echo "</tr>";
        
        
        
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