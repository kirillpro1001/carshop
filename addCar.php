<?php





  $conn = mysqli_connect("localhost","root","","carShop");

  	$nameCar =  mysqli_real_escape_string($conn,$_POST['nameCar']);


	$imageCar = addslashes(file_get_contents($_FILES['imageCar']['tmp_name']));
	$imageHeader = addslashes(file_get_contents($_FILES['imageHeader']['tmp_name']));
	$imageBody = addslashes(file_get_contents($_FILES['imageRight']['tmp_name']));


	$engine = mysqli_real_escape_string($conn,$_POST['engine']);
	$transmission = mysqli_real_escape_string($conn,$_POST['transmission']);
	$drive_unit = mysqli_real_escape_string($conn,$_POST['drive_unit']);
	$fuel_consumption = mysqli_real_escape_string($conn,$_POST['fuel_consumption']);
	$overclocking = mysqli_real_escape_string($conn,$_POST['overclocking']);
	$typeBody = mysqli_real_escape_string($conn,$_POST['typeBody']);
	if (isset($_POST['availability']) && $_POST['availability'] == '1') {
	$availability = (int)$_POST['availability'];
}
else {
	$availability = 0;
}
	$price = $_POST['price'];

                if(!$conn) {
                    die("Ошибка: ".mysqli_connect_error());
                }

                $sql = "INSERT INTO carinfo (name_car, image_car, engine, transmission, drive_unit, fuel_consumption,overclocking,type_body,price, image_header_car, image_body_car,availability) VALUES ('$nameCar','$imageCar','$engine', '$transmission', '$drive_unit', '$fuel_consumption', '$overclocking', '$typeBody','$price','$imageHeader','$imageBody','$availability')";

                if ($result = mysqli_query($conn,$sql)) {

     
					header("Location: admin.php");



    				} 			
    			else {
        			echo "Ошибка: " . mysqli_error($conn);
   					 }


    mysqli_close($conn);

                
          

?>