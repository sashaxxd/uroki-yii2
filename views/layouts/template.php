<?php
use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?> <!-- Cпец мета тег Yii генерирует токены одноразовые для проверки через отправку POST-->
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
           <div class="wrap"><!-- Нажимаем на точку и название див нажимаем на таб создается
           автомато класс в phpshtorm
           -->
               <div class="container">

                   <ul class="nav nav-pills">
                       <li role="presentation" class="active"><?= Html::a('Главная', '/')
                           // Первый параметр название второй ссылка
                           ?></li>
                       <li role="presentation"><?= Html::a('Форма', ['post/index'])
                           // Первый параметр название второй массив из контроллера и экшэна
                           ?></li>
                       <li role="presentation"><?= Html::a('Вывод данных', ['post/show'])  ?></li>
                       <li role="presentation"><?= Html::a('Загрузка в базу', ['post/create'])  ?></li>
                       <li role="presentation"><?= Html::a('Изменение записи в базе', ['post/update'])  ?></li>
                       <li role="presentation"><?= Html::a('Удаление записи в базе', ['post/delete'])  ?></li>
                   </ul>
                   <?php
                   //Debug($this->blocks) //Распечатываем все дополнительные блоки на странице
                   //echo $this->blocks['block1']; //Выводим конкретный блок
                    ?>

                   <?php if(isset($this->blocks['block1'])):?>

                       <?= $this->blocks['block1']; ?>

                   <?php endif ?>

                   <?= $content ?>

               </div>

           </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>