<?php
/**
 * User: noutsasha
 * Date: 13.04.2017
 * Time: 9:42
 */

namespace app\models;


use yii\db\ActiveRecord;

class Create extends ActiveRecord
{
    public static  function tableName()
    {
        return 'posts';
    }

// Валидация формы attributeLabels указываем лейблы заголовки
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Сообщение',
        ];
    }
// Основаная валидация Yii rules
    public  function rules()
    {
        return [
            [['name', 'text'], 'required', 'message' => 'Обязательное поле'],
            ['email', 'email'],// Если не сделать валидацию атрибут считается не безопасным и не загрузиться в базу
            //['email', 'safe'],//safe не валидирует а делает безопасным т.е. в базу загрузит без валидации
        ];
    }



}