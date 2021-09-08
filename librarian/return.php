<?php
include 'conn.php';
$id=$_GET['id'];
$date=date('d-m-Y');
$res=mysqli_query($conn,"UPDATE issue_books SET books_return_date='$date' WHERE id='$id'");
$books_name="";
$res=mysqli_query($conn,"SELECT * FROM issue_books WHERE id='$id'");
while ($row=mysqli_fetch_array($res)){
    $books_name=$row["book_name"];
}
$inc_book="UPDATE add_books SET available_qty=available_qty+1 WHERE books_name='$books_name'";
mysqli_query($conn,$inc_book);
?>

<script type="text/javascript">
    window.location='return_book.php';
</script>