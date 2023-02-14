
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="adminStyle.css">

  <title>Товары</title>
</head>
<body>
  <table>
    <tr>
      <th>Модель автомобиля</th>
      <th>Изображение автомобиля</th>
      <th>Двигатель</th>
      <th>Коробка</th>
      <th>Привод</th>
      <th>Расход топлива</th>
      <th>Разгон до 100 км/ч</th>
      <th>Тип кузова</th>
      <th>Цена</th>
      <th>Наличие</th>
      <th>&#9998;</th>
      <th>&#10006;</th>
    </tr>


    <?php

      $conn = mysqli_connect("localhost","root","","carShop");

                if(!$conn) {
                    die("Ошибка: ".mysqli_connect_error());
                }

                $sql = "SELECT * FROM carinfo";

                if ($result = mysqli_query($conn,$sql)) {

                    foreach ($result as $car) {
                      echo "
                      <tr>
                          <td>".$car['name_car']."</td>
                          <td> <img width = 100% src = data:image/png;base64," . base64_encode($car['image_car']) ."></td>
                          <td>".$car['engine']."</td>
                          <td>".$car['transmission']."</td>
                          <td>".$car['drive_unit']."</td>
                          <td>".$car['fuel_consumption']."</td>
                          <td>".$car['overclocking']."</td>
                          <td>".$car['type_body']."</td>
                          <td>".$car['price']."</td>";
                          if ($car['availability']==1) {
                          echo "<td>В наличии</td>";
                        }
                        else { 
                          echo "<td>Под заказ</td>";
                        }
                          echo "
                          <td><a href = 'updateCar.php?carID=".$car['id']."'>Редактировать запись</a> </td>
                          <td><a href = 'deleteCar.php?carID=".$car['id']."'>Удалить автомобиль</a></td>
                      </tr>
                      ";


                    }


                }

    ?>
          </table>

  <h2>Добавить новый авто</h2>
  <form action="addCar.php" method="post" enctype="multipart/form-data">

    <label for="nameCar">
    Название автомобиля: 
    <input name="nameCar" type="text">
    </label>

    <label for="imageCar">
    Изображение автомобиля на главной странице: 
    <input name = "imageCar" type="file">
    </label>

    <label for="imageHeader">
    Изображение автомобиля в шапке конкретной модели: 
    <input name = "imageHeader" type="file">
    </label>

    <label for="imageRight">
    Изображение автомобиля рядом с характеристиками: 
    <input name = "imageRight" type="file">
    </label>

    <label for="engine">
      Двигатель:
    <input name="engine" type="text">
    </label>

    <label for="transmission">
      Коробка:
    <input name = "transmission" type="text">
    </label>

    <label for="drive_unit">
      Привод: 
    <input name = "drive_unit" type="text">
    </label>

    <label for="fuel_consumption">
      Расход топлива: 
    <input name="fuel_consumption" type = "text">
    </label>

    <label for="overclocking">
      Разгон до 100 км/ч (c.): 
    <input name="overclocking" type = "text"> 
    </label>

    <label for="typeBody"> 
      Тип кузова: 
    <input name="typeBody" type = "text">
    </label>


    <label for="availability"> 
      Наличие: 
    <input name="availability" type="checkbox" value=1>
    </label>


    <label for="price">
      Цена: 
    <input name="price" type="text">
    </label>



    <input type="submit" value="Добавить авто">



  </form>

</body>
</html>