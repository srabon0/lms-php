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
include"conn.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Issue books</h3>
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
                                <form name="form1" action="" method="post">
                                   <table>
                                       <tr>
                                           
                                           
                                           <td>
                                               <select name='enr' class='form-control selectpicker'>
                                                  <?php
                                                   $res=mysqli_query($conn,"SELECT enrollment FROM student_registration");
                                                   while($row=mysqli_fetch_array($res))
                                                   {
                                                
                                                   echo"<option>";
                                                   echo $row ['enrollment']; 
                                                   echo "</option>";
                                                   
                                                   }
                                                   ?>
                                               </select>
                                               
                                           </td>
                                           
                                           
                                           <td>
                                               <input type="submit" value="search" name="submit1" class="form-control btn btn-default" style="margin-top:5px">
                                           </td>
                                           
                                       </tr>
                                   </table>
                                    
                                
                                <?php
                                if (isset($_POST['submit1']))
                                {
                                    $res5=mysqli_query($conn,"SELECT * FROM student_registration WHERE enrollment='$_POST[enr]' ");
                                    while($row5=mysqli_fetch_array($res5)){
                                        $firstname=$row5['firstname'];
                                        $lastname=$row5['lastname'];
                                        $username=$row5['username'];
                                        $email=$row5['email'];
                                        $contact=$row5['contact'];
                                        $sem=$row5['sem'];
                                        $enrollment=$row5['enrollment'];
                                        $_SESSION['enrollment']=$enrollment;
                                        $_SESSION['susername']=$username;
                                        
                                        
                                    }
                                    
                                    ?>
                                    <table class='table table-bordered'>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='enrollment' value="<?php echo $enrollment; ?> " name='enrollment' disabled></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='studentname' name='studentname' value="<?php echo $firstname.' '.$lastname; ?>" required></td>
                                        </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='studentsem' name='studentsem' value="<?php echo $sem; ?>" required></td>
                                        </tr>
                                    <tr >
                                        <td><input type='text' class='form-control' placeholder='studentcontact' name='studentcontact'  value="<?php echo $contact; ?>"required></td>
                                        </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='studentemail' name='studentemail' value="<?php echo $email; ?>" required></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><select name='booksname' class='form-control selectpicker'>
                                           <?php
                                            $res=mysqli_query($conn,"SELECT books_name FROM add_books ")  or die( mysqli_error($conn));
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row['books_name'];
                                                    
                                                    echo "</option>";
                                            }
                                    
                                    
                                    
                                    
                                            ?>
                                            
                                        </select> </td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='Books issue date' name='booksissuedate' value="<?php echo date("d-m-Y")?>"required></td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' class='form-control' placeholder='studentusername' value="<?php echo $username; ?>" name='studentusername' disabled ></td>
                                    </tr>
                                    <tr>
                                        <td><input type='submit' name='submit2' class="form-control btn btn-default" value="Issue books" style="background-color: blue; color: white"></td>
                                    </tr>
                                    
                                    
                                    
                                    </table>
                                    <?php
                                }
                                
                                
                                
                                ?>
                                </form>
                                <?php
                                if(isset($_POST['submit2']))
                                {
                                    $qty=0;
                                    $res=mysqli_query($conn,"SELECT * FROM add_books WHERE books_name ='$_POST[booksname]' ")  or die( mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res))
									{
                                        $qty=$row['available_qty'];
                                    
                                        if($qty==0){
                                        ?>
                                        <div class='alert alert-danger col-lg-6 col-lg-push-3'>
    <strong style='color:white'>SORRY!!!</strong> This book is not available right now.
     </div>
                                <?php        
                                    }else{
                                    
                                    $sql="INSERT INTO issue_books VALUES ('','$_SESSION[enrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[booksissuedate]','','$_SESSION[susername]') ";
                                    mysqli_query($conn,$sql) or die( mysqli_error($conn));
                                    $dec_book="UPDATE add_books SET available_qty=available_qty-1 WHERE books_name='$_POST[booksname]'";
                                    mysqli_query($conn,$dec_book)  or die( mysqli_error($conn));
                                    ?>
                                
                                <script>
                                    alert('Book Issued Successfully!')
                                    window.location.href=window.location.href;
                                </script>
                                <?php
                                    
                                    
                                    
                                }
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