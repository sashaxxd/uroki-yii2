<?php
/**
 * User: noutsasha
 * Date: 12.04.2017
 * Time: 14:26
 */

namespace app\controllers;


class MyController extends  AppController
{
    public  function  actionIndex($id = null)
    {
        if(!$id)
        {
            $id = "test";
        }

        $names = [
            'Иванов',
            'Петров',
            'Сидоров',

        ];
        $hi = 'Привет';
        return $this->render('index',compact('names','hi', 'id') // Второй спосо передачи данных
        /*
            [
            'hello' => $hi,
                'names' => $names,

        ]*/


        );
    }
    public  function actionBlogPost()// Если экшн состоит из нескольких слов в урлах они в нижнем регистре через дефис
    {
         return 'Blog post';
    }

}