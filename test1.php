
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="Booking.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Open+Sans:ital,wght@0,350;0,500;1,350&family=PT+Sans:ital@1&family=Playfair+Display:wght@400;600&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/69db68a046.js" crossorigin="anonymous"></script>
<title>TravelWithUs</title>
   
  </head>
  <body>


    <header class="header">
        <div class="container">
            <div class="header__inner">
                <h2 class="logo">Enjoy moments</h2> 
            <nav class="nav">
                <a  class = "nav__link" href="http://localhost:8080/Travel/Главная.html">Головна</a>
                <a class = "nav__link " href="http://localhost:8080/Travel/Тури.html">Тури</a>
                <a class = "nav__link " href="http://localhost:8080/Travel/О_нас.html">Про нас</a>
                <a class = "nav__link" href="http://localhost:8080/Travel/Контакти.html">Контакти</a>
            </nav>
        </div>
        </div>
    </header>


    <section class="section">
        <div class="container">
    
            <div class="section__header">
                <!-- <php>
                if(!isset($_SESSION['count_view'])){
                    echo '<h1>Ви первий раз посетили єту станицу</h1>';
                    $_SESSION['count_view'] = 1;
                }
                else{
                    ++$_SESSION['count_view'];
                    echo '<h1>Ви не первий раз посетили єту станицу:.$_SESSION['count_view'].</h1>';
                    
                }
                 </php> -->
                <h2 class="section__title">your booking</h2>
                <div class="forma">
                    
                <?php

                $serverMySQL="localhost"; # имя сервера
                $db="Турфирма"; # база данных
                $dblog="root"; # логин
                $dbpass=""; # пароль
                $table="client"; # наша таблица

                $mysqli = mysqli_init();
                if (!$mysqli) {
                die('mysqli_init failed');
                }

                if (!$mysqli->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
                die('Setting MYSQLI_INIT_COMMAND failed');
                }

                if (!$mysqli->real_connect($serverMySQL, $dblog, $dbpass, $db)) {
                die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                }

                // данные для подключения
                $serverMySQL="localhost"; # имя сервера
                $db="турфирма"; # база данных
                $dblog="root"; # логин
                $dbpass=""; # пароль
                $table="booking"; # наша таблица

                $mi=new mysqli($serverMySQL, $dblog, $dbpass, $db);
                $mi->set_charset("utf8"); # кодировка
                if($mi->connect_errno):
                die($mi->connect_error);
                endif;

                $name = $_POST['client_name'];
                $client_mail = $_POST['mail'];
                $tour_num = $_POST['tour'];
                $age = $_POST['age'];
                $query_id = "Select * from client where mail = '$client_mail'";
                $result = $mi->query($query_id); 
                $rows = $result->num_rows; 
                if($rows==0){
                  $id=$mi->insert_id; 
                  $mi->query("INSERT INTO `client`(`client_id`, `mail`, `client_name`, `age`) VALUES 
                  ($id,'$client_mail','$name','$age')");
                 
                }
                
               
                $find_id = "Select client_id from client where mail = '$client_mail'";
                $result1 = $mi->query($find_id); 
                $rows1 = $result1->num_rows; 
                $row = $result1->fetch_array(MYSQLI_ASSOC); 
                $id = $row['client_id'];
                
                // $count_places1 = (int)$count_places;
                $query = "SELECT places FROM tours "; 

                if($query>0){
                  $wwid=$mi->insert_id; 
                  $mi->query("insert into booking (`booking_id`, `tour_num`, `client_mail`) 
                  VALUES ($wwid,$tour_num,'$client_mail')");

                }


                $cookie_name = "counter";
                if(!isset($_COOKIE[$id])) {
                  $counter = 0;
                  ?>
                  <h1>Вітаємо з перши замовленням на Enjoy moments!</h1>

                  <?php
                } else {
                  $counter = $_COOKIE[$id];
                  if($counter==5){
                    ?>
                  <h1>Вітаємо! Ви набули статусу нашого постійного клієнта <br>та отримуєте знижку -5% на найближчу подорож!</h1>

                  <?php
                  }
                }
                $counter++;
                setcookie($id ,$counter);
                if(count($_COOKIE) > 0) {
                  echo "<br>";
                } else {
                  echo "Cookies are disabled.<br>";
                }
                ?>
                

                <?php
                $find_tour = "Select * from tours where num_tour = $tour_num";
                $result1 = $mi->query($find_tour); 
                $rows1 = $result1->num_rows; 
                $row = $result1->fetch_array(MYSQLI_ASSOC); 
                $name_t = $row['name_tour'];
                $date_s = $row['date_start'];
                $date_f = $row['date_f'];
                $price = $row['price'];


                ?>
             </div>
            </div>
            
            <h1 class = "text_booking">Ви забронювали тур "<?php  print "$name_t" ?>".<br> На дати <?php  print "$date_s" ?> - 
            <?php  print "$date_f" ?>.За ціною <?php  print "$price" ?>. З вами найближчим часом <br>зв'яжеться наш менеджер для уточнення всіх деталей<br></h1>
            
            
        </div>
    </section>

</body>

</body>



<!-- <?php
# выводим запись под номером 3
$sql=$mi->query("select * from `$table`"); 
# цикл вывода
while($result=$sql->fetch_array()):
print "<br>$result[client_name] | $result[mail] | $result[age]<br>";
endwhile;
# если убрать условие limit 0,4 будут выведены все записи
?> -->
</body>

