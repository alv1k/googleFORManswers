<?php
    // Включает буферизацию вывода
    $con = new mysqli('localhost', 'root', '', 'googleFORManswers');
      if (mysqli_connect_errno()) {
        echo "Подключение невозможно: ".mysqli_connect_error();
      }
      $select = "SELECT * FROM table_name";  
      $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                //printf ("%s (%s)\n", $row["Column_2"], $row["Column_3"]);                 
                $surname[] = $row["Column_2"];                  
                $name[] = $row["Column_3"];                 
                $ruk[] = $row["Column_4"];

            for($i = 0; $i < 3; $i++){
    ob_start();
?>

<div style="height: 600px; background-image: url(1.webp); background-size: 100% 100%;">
    <p style="font-size: 50px; position: absolute; top: 200px; left: 600px;"> <?php echo $surname[$i] ?>  <?php echo $name[$i] ?></p>
    <p style="font-size: 40px; position: absolute; top: 400px; left: 800px;">Руководитель: <span><?php echo $ruk[$i] ?></span>  </p>
</div>
<?php
    // Получает содержимое текущего буфера и удаляет его
    $html = ob_get_clean();
    // Запишет данные в файл
    file_put_contents('certificats/'.$surname[$i].'.html', $html);
    // Если еще надо вернуть эту страницу в браузер
    echo "Готово. сертификаты в папке certificats/";
            }
        }
    } else {
                    echo "0 results";
    }
?>