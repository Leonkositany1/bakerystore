<?php
include("../connect.php");
if (empty($_POST)) {
  exit();
}
$id=$_POST['id'];

$product = mysqli_query($dbconnect, "SELECT img FROM `products` WHERE `id`='$id'");
$fetch_image=mysqli_fetch_assoc($product);
$image=$fetch_image['img'];
if (unlink("../uploads/$image")) {
	$del = mysqli_query($dbconnect, "DELETE FROM `products` WHERE `id`='$id'");	

    if ($del) {
        $data['title'] = "Success";
        $data['message'] = "Product deleted successfully";
        $data['type'] = "success";
    } else {
        $data['title'] = "Error";
        $data['message'] = "Unable to delete product, try again later";
        $data['type'] = "error";
    }
}else {
    $data['title'] = "Error";
    $data['message'] = "An error occured, try again later : $image";
    $data['type'] = "error";
}

header('Content-Type:Application/json');
echo json_encode($data);
?>