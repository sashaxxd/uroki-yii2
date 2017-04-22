<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
    <h1>Заголовок</h1>
<?php
//Debug($model);
?>
<?php if(Yii::$app->session->hasFlash('sucсess')): //Если есть сообщение в сессии?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('sucсess') //Выводим это сообщение?>
    </div>

<?php endif ?>

<?php if(Yii::$app->session->hasFlash('error')): //Если есть сообщение в сессии?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error') //Выводим это сообщение?>
    </div>
<?php endif ?>

<?php $form = ActiveForm::begin(['options' => ['id' => 'testForm']]) // Открывает форму?>

<?= $form->field($model,'name') // Первый атрибут модель второй название поля ?>
<?= $form->field($model,'email')->input('email') ?>
<?= $form->field($model,'text')->textarea(['rows' => 5]) ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])// Кнопка первый параметр название, второй параметы ?>

<?php ActiveForm::end() // Закрывает форму?>
<?php
/**
 * User: noutsasha
 * Date: 14.04.2017
 * Time: 22:54
 */