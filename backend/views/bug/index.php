<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BugSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '缺陷率';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bug-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'player_name','value' => 'player_name','enableSorting' => false],
            ['attribute'=>'happen_time','value' => 'happen_time','format'=>'datetime','enableSorting' => false],
            ['attribute'=>'severity','value'=>function($model){
                return  \common\lib\common::getSeverity($model->severity);
            },'enableSorting' => false],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url,$model,$key) {
                        return \yii\helpers\Html::a('查看', $url,['class' => 'btn btn-success btn-xs']);
                    },
                    'update' => function ($url,$model,$key) {
                        return \yii\helpers\Html::a('修改', $url,['class' => 'btn btn-primary btn-xs']);
                    },
                    'delete' => function ($url,$model,$key) {
                        return \yii\helpers\Html::a('删除', $url,['class' => 'btn btn-danger btn-xs','data' => [
                            'confirm' => '确定要删除该项吗?',
                            'method' => 'post',
                        ]]);
                    },
                ],

            ],

        ],
    ]); ?>
</div>
