<?php
include 'includes/dbconnection.php';
$del = $_GET['editid'];
$sql = mysqli_query($con, "DELETE from tblcategory where IDkategori='$del'");
if ($sql) {
    header("location:manage-category.php");
} else {
    echo "nova";
}
