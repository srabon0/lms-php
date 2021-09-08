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
                                <h2>Send Message </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            
                            <form name='form1' action="" method="POST" class='col-lg-6' >
                                <table class='table table-bordered'>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="dusername">
                                            <?php
                                                $res=mysqli_query($conn,"SELECT * FROM student_registration");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    
                                                   ?> <option value='<?php echo $row['username']; ?>'><?php echo $row['username'].'('.$row['enrollment'] .')';    ?></option> <?php
                                                    
                                                }
                                                
                                            ?>
                                            
                                            
                                            
                                            </select> 
                                            
                                            
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Message title' name='title'></td>
                                    <tr>
                                    <td>
                                        <h4>Message </h4>
                                       <textarea  class='form-control' name='msg'>
                                        </textarea>
                                    </td>
                                     <tr>
                                        <td><input type='submit'class="btn btn-default" name='submit1' value='send message'></td>
                                    <tr>
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
if(isset($_POST['submit1'])){
    
    $sql="INSERT INTO messages VALUES ('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','n');";
    mysqli_query($conn,$sql);
    
?>
    <script>
        alert('Message sent successfully');
</script>
    
    
    <?php
    
    
    
    
}


?>


<?php
include 'footer.php';

?>