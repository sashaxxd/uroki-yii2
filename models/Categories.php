<?php

namespace app\models;

use Yii;


class Categories extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'categories';
    }


    public function rules()
    {
        return [
            [['title', 'parent', 'alias'], 'required'],
            [['parent'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent' => 'Parent',
            'alias' => 'Alias',
        ];
    }
}
