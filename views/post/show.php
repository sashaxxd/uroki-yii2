<?php

use app\components\MyWidget;
//$this->title = 'Одна статья' Лучше через контроллер?>
<h1>Вид для show</h1>
<?php  //echo MyWidget::widget(['name' => 'Александр']) //Задаем значение виджета в массиве?>
<?php  //echo MyWidget::widget() // Виджет без параметров передаст значение по умолчанию?>

<? //MyWidget::begin() //метод бегин для виджетов открывает тело для контента?>
   <h1>привет мир</h1>
<? //MyWidget::end() //метод энд для виджетов закрывает тело для контента?>



<?php //Debug($cats)?>
<?php //echo count($cats[0]->products) //Ленивая загрузка выполняется много запросов к базе?>
<?php //Debug($cats)?>

<? /*foreach($cats as $cat )
{
    echo '<ul>';
            echo '<li>'.$cat->title.'</li><br>';

            $products = $cat->products;

    foreach($products as $product)
    {
        echo '<ul>';
        echo '<li>'.$product->title.'</li><br>';
        echo '</ul>';
    }
    echo '</ul>';
}*/

?>




<?php
/*
 * Подключаем скрипт для конкретного представления
 * (вида) функцией yii2 registerJsFile(подключает файл скрипта)
 * второй параметр массив(в скобках функции указывает на зависимость от jQuery
 */
//Cкрипт использует библиотеку jQuery
// поэтому должен быть подключен выше
// по коду jQuery
//$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset'])
 ?>
<?php
// Функция registerJs подключает сам код скрипта - обратить внимание на кавычки!!!
// POS_LOAD или POS_READY используем для js - подучить js!!!
//$this->registerJs("$('.container').append('<p>show!!!</p>');", \yii\web\View::POS_LOAD);
/*
 * Функция регистрации css кода
 */
//$this->registerCss('.container{background: #ccc;}');

/*
 * Функция регистрации css файла
 */
//$this->registerCssFile('@web/css/style2.css');

?>
<button class="btn btn-success" id="btn">Кликнуть</button>
<input type="text" id="si">
<?php
// Cпособ подключения для registerJs более удобный вариант
$js = <<<JS
    $('#si').on('click', function(){
        $.ajax({
            url: '/post/ajax', //Куда отправляем
            data: {test: '123'},  //Данные которые отправляем - переменная test со значением 123
            type: 'post', // Отправляем методом POST или GET если POST_ом идет проверка yii
            // для поста в шаблоне необходимо вставить мета тег <?= Html::csrfMetaTags() ?>
           /* success: function(res){ //ответ попадает в переменную res
                console.log(res); //выводим переменную res в консоли
            },*/
            success: function(res){ //ответ попадает в переменную res
                $('#infa').text(res); //выводим переменную res в консоли
            },

            error: function(){    // В случае ошибки
                alert('Error!');
            }
        });
    });
JS;

$this->registerJs($js);
?>


<?php $this->BeginBlock('block1'); // Создаем дополнительный блок на странице для передачи данных из вида в шаблон?>
   <h3>Заголовок</h3>
<?php $this->endBlock(); ?>

<br>
<div id="infa" style="background: red; "></div>

