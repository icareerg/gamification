<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '玩家清单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'player_id','value' => 'player_id','enableSorting' => false,'options'=>array('style'=>"width:150px")],
            ['attribute'=>'player_name','value' => 'player_name','enableSorting' => false,'options'=>array('style'=>"width:150px")],
            ['attribute'=>'level_name','value' => 'level_name','enableSorting' => false,'options'=>array('style'=>"width:150px")],
            ['attribute'=>'experience','value' => 'experience','enableSorting' => false,'options'=>array('style'=>"width:150px")],
            ['attribute'=>'integral','value' => 'integral','enableSorting' => false,'options'=>array('style'=>"width:150px")],
            ['attribute'=>'overtime_count','value'=>function($model){
                      return  \common\models\Player::getOvertime($model->player_id,date("Y-m",time()));
                    },'enableSorting' => false,'options'=>array('style'=>"width:150px")],
            ['attribute'=>'bugs','value'=>function($model){
                      return  \common\models\Player::getBugs($model->player_id,date("Y-m",time()));
                    },'enableSorting' => false,'options'=>array('style'=>"width:150px")],
            [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{view} {update}',
            'buttons' => [
                'view' => function ($url,$model,$key) {
                    return \yii\helpers\Html::a('查看', $url,['class' => 'btn btn-primary btn-xs']);
                },
                'update' => function ($url,$model,$key) {
                    return \yii\helpers\Html::a('修改', $url,['class' => 'btn btn-danger btn-xs']);
                },
                ],
            
                ],
            ],
    ]); ?>
</div>
