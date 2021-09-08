<?php
include 'conn.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM add_books WHERE id=$id ");
    ?>
<script type="text/javascript">
    window.location='display_books.php';
    
</script>
<?php

}else{
    ?>
<script>
    alert("Sorry ! ,You have to Select a book");
    window.location='display_books.php';
</script>
<?php

}
?>