<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="libs/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="libs/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="reset.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js.js"></script>

    <div class="navbar">
        <img class="logo" src="logo2.png">
        <a class="nav-item" href="index.php#main">Главная</a>
        <a class="nav-item" href="index.php#stock">Авто в наличии</a>
        <a class="nav-item" href="index.php#order">Авто под заказ</a>
        <a class="nav-item" href="index.php#about">О нас</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Меню</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php#main">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php#stock">Авто в наличии</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php#order">Авто под заказ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php#about">О нас</a>
                </li>
            </ul>
        </div>
    </div>

    <?php


        if (isset($_GET['carName'])) {
            $car = $_GET['carName'];


            $conn = mysqli_connect("localhost","root","","carShop");

                if(!$conn) {
                    die("Ошибка: ".mysqli_connect_error());
                }

                $sql = "SELECT * FROM carinfo WHERE id = $car";
                if ($result = mysqli_query($conn,$sql)) {


foreach ($result as $car) {
    echo "<div class='header_page' id='main') >
     <img src = data:image/png;base64," . base64_encode($car['image_header_car']) .">
    </div>";
}
   ?>
    <div class="container">

        <?php


                
                    foreach ($result as $car) {
                        echo "<h2 class = 'avto'>". $car['name_car'] ."</h2>
                        <div class = 'detail_car_info'>
                        <div class='detail-car'>
                        <h3 class='har'>Общие характеристики<br> автомобиля</h3>
                        <ul class='info-list'>
                        <li><span>Двигатель</span><span>".$car['engine']."</span></li>
                        <li><span>Коробка</span><span>".$car['transmission']."</span></li>
                        <li><span>Привод</span><span>".$car['drive_unit']."</span></li> 
                        <li><span>Расход топлива</span><span>".$car['fuel_consumption']."</span></li>  
                        <li><span>Разгон до 100 км/ч</span><span>".$car['overclocking']."</span></li>  
                        <li><span>Тип кузова</span><span>".$car['type_body']."</span></li>
                        <li><span>Цена:</span><span>".$car['price']."</span></li>  
                        </ul>
                        </div>
                    <div class='detail_car_right'>
                          <img src = data:image/png;base64," . base64_encode($car['image_body_car']) .">
                        </div>
               
                 </div>
                 </div>
                        ";

                    }
        }
    }
        ?>






        </div>
    </div>
    <div class="forma">

    <form action="create.php" method="post">
        <p class="inp1">Имя *
        <input type="text" name="username" /></p>
        <p class="inp2">Телефон *
        <input type="text" name="usertel" /></p>
        <input type="submit" value="Получить специальное предложение">
        </form>
    </div>




    <div class="container">
        <h2 id="about">О нас</h2>
        <div class="aboutUs">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d339.4108908280248!2d27.426944981455037!3d53.91077253052442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbc4cd496e8c21%3A0xd16deef403f1b396!2z0YPQuy4g0J3RkdC80LDQvdGB0LrQsNGPIDEyLCDQnNC40L3RgdC6!5e0!3m2!1sru!2sby!4v1671886849522!5m2!1sru!2sby"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div>
                <div class="grafik-test">
                    <div data-day="1">Пн<span>8:00–17:00</span></div>
                    <div data-day="2">Вт<span>8:00–17:00</span></div>
                    <div data-day="3">Ср<span>8:00–17:00</span></div>
                    <div data-day="4">Чт<span>8:00–17:00</span></div>
                    <div data-day="5">Пт<span>8:00–17:00</span></div>
                    <div data-day="6">Сб<span>выходной</span></div>
                    <div data-day="7">Вс<span>выходной</span></div>
                </div>
                <div class="tel"><img src="tel.png" height="45px" width="45px">тел.: +375 (33) 572 87 21</div>
                <div class="loc"><img src="loc.png" height="40px" width="40px"> Минск, Неманская 12</div>
            </div>
        </div>
    </div>

    <footer>
        <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
        <div class="links">
            <p><a href="https://www.instagram.com/bmw/"><img src="inst.png" width="50" height="50"></a></p>
            <p><a href="https://ru-ru.facebook.com/BMW/"><img src="fbk.png" width="50" height="50"></a></p>
        </div>
    </footer>

</body>

</html>