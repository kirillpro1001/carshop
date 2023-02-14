<?php


if (isset ($_POST['idCar'])) {
	$conn = mysqli_connect("localhost","root","","carShop");
	$carID = $_POST['idCar'];

	$nameCar =  mysqli_real_escape_string($conn,$_POST['nameCar']);
	if (!empty ($_FILES['imageCar']) && !empty ($_FILES['imageHeader']) && !empty ($_FILES['imageRight'])) {
	$imageCar = addslashes(file_get_contents($_FILES['imageCar']['tmp_name']));
	$imageHeader = addslashes(file_get_contents($_FILES['imageHeader']['tmp_name']));
	$imageBody = addslashes(file_get_contents($_FILES['imageRight']['tmp_name']));
}


	$engine = mysqli_real_escape_string($conn,$_POST['engine']);
	$transmission = mysqli_real_escape_string($conn,$_POST['transmission']);
	$drive_unit = mysqli_real_escape_string($conn,$_POST['drive_unit']);
	$fuel_consumption = mysqli_real_escape_string($conn,$_POST['fuel_consumption']);
	$overclocking = mysqli_real_escape_string($conn,$_POST['overclocking']);
	$typeBody = mysqli_real_escape_string($conn,$_POST['typeBody']);
	$price = $_POST['price'];

	
if (isset($_POST['availability']) && $_POST['availability'] == '1') {
	$availability = (int)$_POST['availability'];
}
else {
	$availability = 0;
}

	 if(!$conn) {
                    die("Ошибка: ".mysqli_connect_error());
                }

                if (empty($imageCar) && empty($imageHeader) && empty($imageBody)) {

      $sql = "UPDATE carinfo SET name_car = '$nameCar', engine = '$engine' , transmission = '$transmission', drive_unit = '$drive_unit' , fuel_consumption = '$fuel_consumption' , overclocking = '$overclocking', type_body = '$typeBody', availability = $availability,  price ='$price'  WHERE id = '$carID'";
  }
  else {
  	$sql = "UPDATE carinfo SET name_car = '$nameCar', image_car  = '$imageCar', engine = '$engine' , transmission = '$transmission', drive_unit = '$drive_unit' , fuel_consumption = '$fuel_consumption' , overclocking = '$overclocking', type_body = '$typeBody', availability = $availability,  	image_header_car = '$imageHeader', image_body_car ='$imageBody', price ='$price'  WHERE id = '$carID'";
  }


      if(mysqli_query($conn, $sql)){
         
 	header("Location: admin.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);

}


?>