<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Department;
use app\models\Products;
use app\models\BackendUser;
/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="well" width="1000px">
<div class="warehouse-form">

   <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-5',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-3',
            'error' => '',
            'hint' => '',

        ],
    ],
]);
?>

    <?= $form->field($model, 'prod_id')->dropDownList(
        ArrayHelper::map(Products::find()->all(), 'id','name','type'),
        ['prompt'=>'Select Product'])?>

    <?= $form->field($model, 'qty')->textInput(['type'=>'number']) ?>

         <?= $form->field($model, 'unit')->dropDownList(['Pc' => 'Pc', 'Box' => 'Box']) ?>

    <?= $form->field($model, 'unit_cost')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'date_added')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'received_by')->dropDownList(
        ArrayHelper::map(BackendUser::find()->all(), 'fullname','fullname'),
        ['prompt'=>'Select a Name'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
