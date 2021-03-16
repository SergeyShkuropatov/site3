<?php
    include($_SERVER['DOCUMENT_ROOT']."/header.php"); 
?>
<?php
    // Получаем данные из БД  9Q7k9U4m
     $link = mysqli_connect('localhost','root','','nasik159_surfing');
     mysqli_set_charset($link, 'utf8');
    $sql_cards = "SELECT * FROM contacts ORDER BY id LIMIT 5";
    $result_cards = mysqli_query($link, $sql_cards);

    while( $data_card = mysqli_fetch_assoc($result_cards) ){
        $template['data'][] = $data_card;
    } 

?>
    <!-- Рендиринг страницы -->
    <?php if($template['data'] == true) :?>
        <div class="contacts">
            <!--contacts-->
            <div class="wrapper">
                <div class="wrapper-content" style="width:25%" id="articles">
                    <?php  foreach( $template['data'] as $card_row ):  ?>
                        <div class="content">
                            <h3>E-mail: <?= $card_row['email'] ?></h3>
                            <h3>Дата:<?=  $card_row['date_create'] ?></h3>
                        </div>
                    <?php endforeach;?>
                     <div class="return">
                        <a href="/" style="opacity:1">
                            ВЕРНИТЕСЬ НА ГЛАВНУЮ СТРАНИЦУ.
                            ИЛИ ПРОСКРОЛЬТЕ, ЧТОБЫ ПРОСМОТРЕТЬ КЛИЕНТОВ
                        </a>
                    </div>
                   <div class="fon">
                        <h3>
                             КОНТАКТЫ В БАЗЕ ЗАКОНЧИЛИСЬ.
                        </h3>
                        <div class="watch"><a href="../">НАЖМИТЕ, ЧТОБЫ ВЕРНУТЬСЯ НА СТРАНИЦУ БРОНИРОВАНИЯ</a></div>  
                    </div> 
            </div>
        </div>
<?php endif;?>


<script type="text/javascript">



//  let articles = document.getElementById('articles');
// let content = document.querySelector('.content');
// var startFrom = 1;  // позиция с которой начинается вывод данных
// // window.addEventListener('onscroll', function
// window.addEventListener('scroll', function(){
// console.log($(window).height());
// console.log($(document).height());
// console.log($(window).scrollTop());
//     let ajax = new XMLHttpRequest();
//     ajax.open('POST', '/ajax.items_scroll.php');
//     ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     ajax.send('start=' + startFrom);
//     if ($(window).scrollTop() + $(window).height() >= $(document).height() ) {  
//     ajax.onreadystatechange = function(){
//         if( ajax.readyState == 4 && ajax.status == 200 ){
//             let data = JSON.parse(ajax.responseText); //тут будет js-массив
//             if (data !== null){
//             data.forEach(function(product){
//               let commentList = document.createElement('div');
//                 commentList.classList.add('content');
//                 commentList.innerHTML = `
//                     <h3> Email: ${product.email} </h3>
//                     <h3> Дата: ${product.date_create} </h3>
//                 `;
//                 articles.appendChild(commentList);
//             });
//             startFrom += 1;
//           }else{ 
//                 $('.empty_base').css({"display":"flex"});
//                 setInterval(function(){
//                     $('.empty_base').css({"display":"none"});
//                 },3000);
//               }
//         }
//      }  
//      }
// });

// 'use strict';

var articles = document.getElementById('articles');
var content = document.querySelector('.content');
var startFrom = 1; // позиция с которой начинается вывод данных
// window.addEventListener('onscroll', function
// $(window).scrollComplete(function(){alert('тра-та-та')}, 500);

window.addEventListener('scroll', function () {
    // console.log($(window).height());
    // console.log($(document).height());
    // console.log($(window).scrollTop());
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/ajax.items_scroll.php');
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send('start=' + startFrom);
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200)  {
                var data = JSON.parse(ajax.responseText); //тут будет js-массив
                if (data !== null) {
                console.log(data);
                    data.forEach(function (product) {
                        var commentList = document.createElement('div');
                        commentList.classList.add('content');
                        commentList.innerHTML = '\n                    <h3> Email: ' + product.email + ' </h3>\n                    <h3> \u0414\u0430\u0442\u0430: ' + product.date_create + ' </h3>\n                ';
                        articles.appendChild(commentList);
                    });
                    startFrom += 1;
                } else {console.log("sssssd");
                console.log($('.fon'));
                      $('.fon').css({ "display": "flex" });
                setInterval(function () {
                    $('.fon').css({ "display": "none" });
                }, 5000);
                }
            }
        };
    }
});
</script>

    <script src="jquery.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="shop-slider.js"></script>
    <script src="header-slider.js"></script>
    <script src="script.js"></script>
    </body>

</html>



