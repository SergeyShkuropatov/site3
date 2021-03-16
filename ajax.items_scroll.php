<?php
 
$template = array(); // массив для результата выборки записей
 
// простая проверка переменной
if (isset($_POST['start']) && is_numeric($_POST['start'])){
 
    $start = $_POST['start']; // точка старта выборки
    // получаем 10 записей начиная с точки старта
 //Отправляем данные в БД
     $link = mysqli_connect('localhost', 'nasik159_surfing', '9Q7k9U4m', 'nasik159_surfing');
     mysqli_set_charset($link, 'utf8');
        $sql_cards = "SELECT * FROM `contacts` ORDER BY `id` LIMIT {$start}, 1";
        $result_cards = mysqli_query($link, $sql_cards);

        while( $data_card = mysqli_fetch_assoc($result_cards) ){
            $template['data'][] = $data_card;
        } 
}
 
// Превращаем массив статей в json-строку для передачи через Ajax-запрос
 echo json_encode($template['data']);
?>
    