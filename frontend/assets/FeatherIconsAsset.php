<?php


namespace frontend\assets;

use yii\web\AssetBundle;

class FeatherIconsAsset extends AssetBundle
{
    public $sourcePath = '@npm/feather-icons'; // Adjust path if necessary
    public $js = [
        'dist/feather.js',
    ];
}
