<?php
/**
 * @link https://github.com/borodulin/yii2-datatables
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-datatables/blob/master/LICENSE
 */

namespace odilov\datatables\assets;

use yii\web\AssetBundle;

/**
 * Class DatatablesAsset
 * @package odilov\datatables\assets
 */
class DatatablesAsset extends AssetBundle
{
    public $sourcePath = '@odilov/datatables/assets/datatables.net';

    public $js = [
        'jquery.dataTables.min.js',
    ];

    public $css = [
        'jquery.dataTables.css',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
