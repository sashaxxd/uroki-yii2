<?php
/**
 * User: noutsasha
 * Date: 13.04.2017
 * Time: 15:46
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }
/*
    public  function getCategories()
    {
        return $this->hasOne(Category::className(), ['id', 'parent']);//Cвязываем продукты с категорией
    }
*/

}