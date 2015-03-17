<?php

namespace app\assets;

use yii\web\AssetBundle;

class SnowAssetsBundle extends AssetBundle
{
    public $sourcePath = '@app/assets/snow';

    public $css = array('css/snow.css');

    public $depends = array(
        'app\\assets\\ApplicationUiAssetBundle'
    );
}