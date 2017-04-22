<?php
/**
 * User: noutsasha
 * Date: 13.04.2017
 * Time: 14:21
 */

namespace app\models;

use yii\db\ActiveRecord;

class Category extends  ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }
    public  function getProducts()
    {
        return $this->hasMany(Product::className(), ['parent' => 'id']);//Cвязываем продукты с категорией в виде массива
    }


}

