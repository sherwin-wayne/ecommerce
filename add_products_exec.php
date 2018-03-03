<?php

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];
$product_category = $_POST['product_category'];


echo $product_name. "<br>".$product_description; 

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        // Insert into column image = 
        echo $target_file;

//THIS IS WHERE connect to db,insert into table, product name etd
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbnightclass";
$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}


$sql = "INSERT INTO products1_tbl (product_id, product_image,product_name, product_description, product_price, product_quantity, category_id)
        VALUES ('$product_id' ,'$target_file','$product_name', '$product_description', '$product_price', '$product_quantity', '$product_category') ";


if(mysqli_query($conn, $sql)) {
    header ("Location:display_products.php");  

}else{
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>       