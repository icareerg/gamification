<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlaylogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '数据';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="play-log-index">

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

//            'play_id',
            ['attribute'=>'player_name','value' => 'player_name','enableSorting' => false],
//            'conducts.conduct_name',
            ['attribute'=>'conduct_name','value' => 'conduct_name','enableSorting' => false],
            ['attribute'=>'experience','value' => 'experience','enableSorting' => false],
            ['attribute'=>'integral','value' => 'integral','enableSorting' => false],
            ['attribute'=>'happen_time','value' => 'happen_time','format'=>'datetime','enableSorting' => false],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url,$model,$key) {
                        return \yii\helpers\Html::a('查看', $url,['class' => 'btn btn-primary btn-xs']);
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