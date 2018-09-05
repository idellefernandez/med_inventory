<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Department;
use app\models\Products;
use app\models\Student;
/* @var $this yii\web\View */
/* @var $model app\models\Disbursement */
/* @var $form yii\widgets\ActiveForm */
?>
<center>

 <div class="well" style="width: 1000px">
<div class="disbursement-form">

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

   <?= $form->field($model, 'stud_id')->dropDownList(
        ArrayHelper::map(Student::find()->all(), 'id','id', 'fullname'),
        ['prompt'=>'Select Student'])?>

    <?= $form->field($model, 'prod_id')->dropDownList(
        ArrayHelper::map(Products::find()->all(), 'id','name','type'),
        ['prompt'=>'Select Product'])?>
    <?= $form->field($model, 'qty')->textInput(['type'=>'number']) ?>

     <?= $form->field($model, 'unit')->dropDownList(['Pc' => 'Pc', 'Box' => 'Box']) ?>

  <!--  <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>-->

    <?php echo $form->field($model, 'reason')->dropDownList(['Headache' => 'Headache', 'Diarrhea' => 'Diarrhea', 'Stomach Cramps' => 'Stomach Cramps', 'Muscle Pain' => 'Muscle Pain', 'Fever' => 'Fever', 'Others' => 'Others']); ?>

    <?= $form->field($model, 'date_released')->textInput(['type'=>'date']) ?>

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>
  </div>
  <div class="form-group col-sm-offset-4">
    </div></div>
</div>
  
    <?php ActiveForm::end(); ?>

</div>
