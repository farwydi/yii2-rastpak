<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: zharikov
 * Date: 09.08.2018
 * Time: 16:24
 *
 * Class Country
 * @package app\models
 */
class Country extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['code'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required']
        ];
    }
}