<?php

if (isset ($_GET['carID'])) {
	$carID = $_GET['carID'];
	$conn = mysqli_connect("localhost","root","","carShop");
	 if(!$conn) {
                    die("Ошибка: ".mysqli_connect_error());
                }

      $sql = "DELETE FROM carinfo WHERE id = $carID";
      if(mysqli_query($conn, $sql)){
         
 	header("Location: admin.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);

}


?>