<?php
/**
 * User: noutsasha
 * Date: 12.04.2017
 * Time: 14:55
 */

namespace app\controllers\admin;// Делаем вложенный контроллер в папке admin


use yii\web\Controller;

class UserController extends Controller
{
    public  function actionIndex()
    {

        return $this->render('index');
    }

}