<?php
/**
 * @link https://github.com/borodulin/yii2-datatables
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-datatables/blob/master/LICENSE
 */

namespace odilov\datatables\assets;

use yii\web\AssetBundle;

/**
 * Class DatatablesFixedColumnsAsset
 * @package odilov\datatables\assets
 */
class DatatablesFixedColumnsAsset extends AssetBundle
{
    public $sourcePath = '@odilov/datatables/assets/datatables.net-fixedcolumns';

    public $js = [
        'dataTables.fixedColumns.min.js',
    ];

    public $css = [
        'fixedColumns.dataTables.min.css',
    ];

    public $depends = [
        'odilov\datatables\assets\DatatablesAsset',
    ];
}
