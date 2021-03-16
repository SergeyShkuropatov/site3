<?php
        //Это переменная, ассоциативный массив для сбора информации 
    $templatet = [
        'data'=>[],
        'error'=>[]
    ];
   //Функция очистки входных параметров
   function clean_field( $key ){
    $value = '';

    if( isset( $_POST[$key] ) ){
        //trim удаляет все проблемы, отступы и переносы строк сначала и в конце строчки
        //strip_tags удаляет html и php из строки
        $value = trim(strip_tags( $_POST[$key] ) );
    }
    return $value;
}
//Проверка на то, что пользователь ввел имя и текст
if(!empty($_POST['email'])){ 

    //Процедура очистки параметров и занесение их в template
    $template['data']['fields'] = [
        'email'=>clean_field('email'),
        'date_create'=>clean_field('date_create')
    ];
     //Отправляем данные в БД
     $link = mysqli_connect('localhost', 'nasik159_surfing', '9Q7k9U4m', 'nasik159_surfing');
     mysqli_set_charset($link, 'utf8');
     $sql = "INSERT INTO contacts (id,`email`,`date_create`)";
     $sql .= "VALUE (NULL, '{$template['data']['fields']['email']}', NOW())";
     $result = mysqli_query($link, $sql);  
   }
    if( $result ){
        echo 'Yes';
        }else{
            echo 'No';
        }