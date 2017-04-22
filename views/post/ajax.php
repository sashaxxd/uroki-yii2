

<div class="search_box pull-right">

        <input type="text" placeholder="Search" name="search" id="si"/>


</div>
<?php
$search  = Yii::$app->request->post();
// Cпособ подключения для registerJs более удобный вариант
$js = <<<JS
    $('#si').keyup(function(){
        $.ajax({
            url: '/post/main', //Куда отправляем
            data: ({title: $('#si').val()}),  //Данные которые отправляем - переменная test со значением 123
            dataType: 'html',
            type: 'post', // Отправляем методом POST или GET если POST_ом идет проверка yii
            // для поста в шаблоне необходимо вставить мета тег <?= Html::csrfMetaTags() ?>
           /* success: function(res){ //ответ попадает в переменную res
                console.log(res); //выводим переменную res в консоли
            },*/
            success: function(res){ //ответ попадает в переменную res
                $('#infa').html(res); //выводим переменную res в консоли
            },

            error: function(){    // В случае ошибки
                alert('Error!');
            }
        });
    });
JS;

$this->registerJs($js);
?>



<div id="infa" style="background: #cccccc; "></div>