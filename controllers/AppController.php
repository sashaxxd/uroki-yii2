<?php
/**
 * User: noutsasha
 * Date: 12.04.2017
 * Time: 15:10
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends  Controller
{
    public  function Debug($arr)
    {
        echo '<pre>'.print_r($arr, true).'</pre>';
    }

}

