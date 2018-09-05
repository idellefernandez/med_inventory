<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>


     <?php
       echo Html::beginForm(  ["products/index"]   ); 
   
    ?>

    <div class="col-lg-3">
    <div class="input-group">
   
    <input type="text" class="form-control" placeholder="Search" name="q" value="<?php if(isset($_POST['q'])){echo $_POST['q']; }?>"><span class="input-group-btn">
        <button class="btn btn-default" type="submit">Search</button>
    </span>
    </div>
    </div>
    
    <?php 
    echo Html::endForm();
    ?>

<div class="well">
<div class="products-index">

    <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'type',
            'qty',
            'qty_unit',
             'reorder_level',

             ['header'=>'Action', 'class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>