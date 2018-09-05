<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Lorma School Clinic',
        'options' => [
            'class' =>'navbar-inverse navbar-fixed-top',
            // 'style' =>'background-color: maroon;',
        ],
    ]);
?>

    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
        [
            'label' => 'Home',
            'url' => ['site/index'],'visible'=>!Yii::$app->user->isGuest
        
        ],

        [ 'label' => 'Edit Account', 
        'url' => ['/backend-user/index'],'visible'=>!Yii::$app->user->isGuest
        ],

         [ 'label' => 'Reports', 
        'url' => ['/reports/index'],'visible'=>!Yii::$app->user->isGuest
        ],

        [
            'label' => 'Menu',
            'items' => [
                '<center><li class="dropdown-header"><b><u>TRANSACTIONS</u></b></li></center>',
                 ['label' => 'Products', 'url' => ['/products/index'],'visible'=>!Yii::$app->user->isGuest],
                 '<li class="divider"></li>',

                  ['label' => 'Disbursement', 'url' => ['/disbursement/index'],'visible'=>!Yii::$app->user->isGuest],
                  '<li class="divider"></li>',

                   ['label' => 'Returns', 'url' => ['/returns/index'],'visible'=>!Yii::$app->user->isGuest],
                  '<li class="divider"></li>',

                  '<center><li class="dropdown-header"><b><u>DATA STORAGE</u></b></li></center>',
                  ['label' => 'Warehouse', 'url' => ['/warehouse/index'],'visible'=>!Yii::$app->user->isGuest],
                  '<li class="divider"></li>',
                // '<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Students', 'url' => ['/student/index'],'visible'=>!Yii::$app->user->isGuest],
                  '<li class="divider"></li>',

                ['label' => 'Departments', 'url' => ['/department/index'],'visible'=>!Yii::$app->user->isGuest],
                '<li class="divider"></li>',



               

            ],
        ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Team B PROJECT <?= date('Y') ?></p>-->

      
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
