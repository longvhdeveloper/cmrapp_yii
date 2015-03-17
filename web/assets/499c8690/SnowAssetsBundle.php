<?php

namespace app\assets;

use yii\web\AssetBundle;

class SnowAssetsBundle extends AssetBundle
{
    public $sourcePath = '@app/assets/';

    public $css = array('snow/snow.css');

    public $depends = array(
        'app\\assets\\ApplicationUiAssetBundle'
    );
}