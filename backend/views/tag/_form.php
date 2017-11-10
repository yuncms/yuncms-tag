<?php

use yii\helpers\Html;
use xutl\inspinia\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\Tag */
/* @var $form ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
]); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'title') ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'keywords') ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'description')->textarea() ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'slug')->textInput() ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'letter')->textInput() ?>
<div class="hr-line-dashed"></div>

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('tag', 'Create') : Yii::t('tag', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>


