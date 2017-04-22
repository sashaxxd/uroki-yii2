<?php

namespace app\components;
use yii\base\Widget;

class MyWidget extends Widget //cоздали свой виджет его можно вызывать в виде
{

    public $name;

    public function init()//метод Yii для передачи
    {
        parent::init();//Сначала вызываем родительский метод потом свои действия
        //if($this->name === null)
       // {
            $this->name = 'Гость';
       // }
        ob_start();//Буферизирум весь вывод


    }

    public  function run()
    {
        $content = ob_get_clean();
        $content = mb_strtoupper($content, 'utf-8');//Переводим весь контент в верхний регистр
        return $this->render('my',
          [
        'content' => $content,

          ]);
        //return $this->render('my',
          //  [
                //'name' => $this->name,

          //  ]);
    }

}