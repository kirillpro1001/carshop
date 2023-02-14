<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование записи</title>
</head>
<body>
    <?php
  if (isset ($_GET['carID'])) {
  $carID = (string)$_GET['carID'];
echo "<form action='update.php' method='post' enctype='multipart/form-data'>";


	$conn = mysqli_connect("localhost","root","","carShop");
	 if(!$conn) {
                    die("Ошибка: ".mysqli_connect_error());
                }

      $sql = "SELECT * FROM carinfo WHERE id = $carID";
      if($result = mysqli_query($conn, $sql)) {

      	foreach ($result as $car) {
      		// code...
      	


         
 	


	?>
    <label for="nameCar">
    Название автомобиля: 
    <input name="nameCar" type="text" value= '<?=$car['name_car']?>'  >
    </label> <br/>

    <label for="imageCar">
    Изображение автомобиля на главной странице: 
    <input name = "imageCar" type="file" value="<?=base64_encode($car['image_car'])?>">
    </label><br/>

    <label for="imageHeader">
    Изображение автомобиля в шапке конкретной модели: 
    <input name = "imageHeader" type="file" value="<?=base64_encode($car['image_header_car'])?>">
    </label><br/>

    <label for="imageRight">
    Изображение автомобиля рядом с характеристиками: 
    <input name = "imageRight" type="file" value="<?=base64_encode($car['image_body_car'])?>">
    </label><br/>

    <label for="engine">
      Двигатель:
    <input name="engine" type="text" value="<?=$car['engine']?>">
    </label><br/>

    <label for="transmission">
      Коробка:
    <input name = "transmission" type="text" value="<?=$car['transmission']?>">
    </label><br/>

    <label for="drive_unit">
      Привод: 
    <input name = "drive_unit" type="text" value="<?=$car['drive_unit']?>">
    </label><br/>

    <label for="fuel_consumption">
      Расход топлива: 
    <input name="fuel_consumption" type = "text" value="<?=$car['fuel_consumption']?>">
    </label><br/>

    <label for="overclocking">
      Разгон до 100 км/ч (c.): 
    <input name="overclocking" type = "text"value="<?=$car['overclocking']?>"> 
    </label><br/>

    <label for="typeBody"> 
      Тип кузова: 
    <input name="typeBody" type = "text" value="<?=$car['type_body']?>">
    </label><br/>


    <label for="availability"> 
      Наличие: 
    <input name="availability" type="checkbox" value=1>
    </label><br/>


    <label for="price">
      Цена: 
    <input name="price" type="text" value="<?=$car['price']?>">
    </label><br/>

    <input name="idCar" type="hidden" value="<?=$car['id']?>">

    <input type="submit" value="Обновить данные">

 <?php 
}
}
}

 ?>

  </form>
</body>
</html>
