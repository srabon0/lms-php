<?php
include 'conn.php';
$id=$_GET['id'];
$sql="UPDATE student_registration SET status='yes' WHERE id=$id ;" ;
mysqli_query($conn,$sql);


?>
<script type='text/javascript'>
    window.location = 'display_student_info.php';
</script>
