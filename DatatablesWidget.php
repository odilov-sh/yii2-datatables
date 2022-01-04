<?php

namespace odilov\datatables;

use odilov\datatables\assets\DatatablesAsset;
use odilov\datatables\assets\DatatablesFixedColumnsAsset;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;

/**
 * DatatablesWidget by Odilov Shukurullo
 */
class DatatablesWidget extends \yii\base\Widget
{
    /**
     * @var string jquery selector for table
     */
    public $selector;

    /**
     * @var array additional plugin options
     */
    public $pluginOptions = [];

    /**
     * FixedColumns "freezes" in place the left most columns in a scrolling DataTable,
     * to provide a guide to the end user (for example an index column).
     * @var boolean|array
     * @link https://datatables.net/extensions/fixedcolumns/
     */
    public $fixedColumns;

    /**
     * Horizontal scrolling
     * @var boolean
     */
    public $scrollX;

    /**
     * Vertical scrolling
     * @var string
     */
    public $scrollY;

    /**
     * Feature control search (filtering) abilities
     * @var boolean
     */
    public $filter = true;

    /**
     * Feature control ordering abilities
     * @var boolean
     */
    public $ordering = true;

    /**
     * @var bool
     */
    public $scrollCollapse = true;

    /**
     * @var bool
     */
    public $paging = false;


    public function init()
    {
        parent::init();
        if ($this->selector == null){
            throw new InvalidArgumentException("`selector` property must be set");
        }
    }

    public function run()
    {
        $this->renderOptions();
        $this->registerAssets();
    }

    public function renderOptions()
    {
        $options = [
            'filter' => $this->filter,
            'ordering' => $this->ordering,
            'scrollCollapse' => $this->scrollCollapse,
            'paging' => $this->paging,
        ];

        if ($this->scrollX) {
            $options['scrollX'] = $this->scrollX;
        }

        if ($this->scrollY) {
            $options['scrollY'] = $this->scrollY;
        }

        if ($this->fixedColumns) {
            DatatablesFixedColumnsAsset::register($this->view);
            $options['fixedColumns'] = $this->fixedColumns;
        }

        $this->pluginOptions = ArrayHelper::merge($options, $this->pluginOptions);
    }

    public function registerAssets()
    {
        DatatablesAsset::register($this->view);
        $options = json_encode($this->pluginOptions);


        $js = <<<JS
            var table = $('$this->selector').DataTable($options);
JS;
        $this->view->registerJs($js);

    }
}
