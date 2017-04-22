<?php
/**
 * User: noutsasha
 * Date: 13.04.2017
 * Time: 9:42
 */

namespace app\models;

use yii\base\Model;

class TestForm extends Model
{
    public  $name;
    public $email;
    public  $text;
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
           [['name', 'email'], 'required', 'message' => 'Обязательное поле'],
            ['email', 'email'],
            //['name', 'string', 'min' => 3, 'tooShort' => 'Мало символов'], //Минимум символов
            //['name', 'string', 'max' => 7, 'tooLong' => 'Много символов'], //Максимум символов
            ['name', 'string', 'length' => [3,7]], //Определяет сразу мин и макс символов
            ['name', 'myRule'],// Cвой валидатор ниже метод для него
            ['text', 'trim'],// Тримуем обрезаем пробелы до и после
        ];
    }

    public function myRule($attr)// Метод работает толко со стороны сервера так как он свой
    {
        if(!in_array($this->$attr, ['hello', 'world']))
        {
            $this->addError($attr, 'Ошибка валидации');
        }

    }

}