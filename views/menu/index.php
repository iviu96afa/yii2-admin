<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
            'attribute' => 'menuParent.name',
            'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                'class' => 'form-control', 'id' => null
            ]),
            'label' => Yii::t('rbac-admin', 'Parent'),
        ],
        'route',
        'order',
        ['class' => 'yii\grid\ActionColumn'],
    ];
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'responsive' => true,
        'floatHeader' => true,
        'hover' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> ' . $this->title . ' </h3>',
            'type' => 'default',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-info']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . Yii::t('app', 'Reset Grid'), ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ]
    ]);
    ?>

</div>
