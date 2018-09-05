<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
       echo Html::beginForm(  ["warehouse/index"]   ); 
   
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
<div class="warehouse-index">

    <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <p>
        <?= Html::a('Add Item', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

           //'id',
            'prod_id',
                ['header'=>'Product Name', 'value'=>'products.name'],
            'unit',
            'unit_cost',
            'qty',
            'date_added',
            'supplier',
            'received_by',

           ['header'=>'Action', 'class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
</div>
</div>