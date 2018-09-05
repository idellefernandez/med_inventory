<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>
<center>

 <div class="well" style="width: 950px">
   
<div class="student-form">

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

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'lastname')->textInput(['autofocus' => true, 'style'=> 'text-transform:capitalize;']) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, 'style'=> 'text-transform:capitalize;']) ?>

    <?= $form->field($model, 'department_id')->dropDownList(
        ArrayHelper::map(Department::find()->all(), 'id','shortname','description'),
        ['prompt'=>'Select Department'])?>

    <?= $form->field($model, 'birthdate')->textInput(['type' => 'date']) ?>

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
