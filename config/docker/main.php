<?php
/**
 * Created by PhpStorm.
 * User: zharikov
 * Date: 08.08.2018
 * Time: 18:09
 */

$config = [

];

return yii\helpers\ArrayHelper::merge(require CONFIG_PATH. "main.php", $config);