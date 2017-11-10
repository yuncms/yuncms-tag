<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use xutl\bootstrap\tagsinput\TagsinputAsset;

/**
 * The leaps-tagsinput is a leaps 3 wrapper for bootstrap-tagsinput.
 * See more: https://github.com/timschlechter/bootstrap-tagsinput
 *
 */
class TagsinputWidget extends InputWidget
{
    /**
     * @var array the JQuery plugin options for the bootstrap-tagsinput plugin.
     * @see http://timschlechter.github.io/bootstrap-tagsinput/examples/#options
     */
    public $clientOptions = [];

    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        //$this->options['data-role'] = 'tagsinput';
        $this->registerClientScript();
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
    }

    /**
     * Registers the needed client script and options.
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        TagsinputAsset::register($view);
        $clientOptions = Json::encode($this->clientOptions);
        $view->registerJs("jQuery(\"#{$this->options['id']}\").tagsinput({$clientOptions});");
    }
}