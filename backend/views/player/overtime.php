<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '超时记录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php $form = ActiveForm::begin([
        'id' => 'yearmonth-form',
        'method' => 'post',
//        'action' => '',
    ]); ?>
    <?php echo DatePicker::widget([
        'id' => 'yearmonth',
        'name' => 'yearmonth',
        'type' => DatePicker::TYPE_BUTTON,
//        'value' => date('Y-m'),
        'removeButton' => false,
        'options' => ['placeholder' => '选择'],
        'pluginEvents' => ["changeDate" => "function(e) { $('#yearmonth-form').submit(); }",],
        'pluginOptions' => [
            'format' => 'yyyy-mm',
            'autoclose'=>true,
            'todayHighlight' => true
    ]
    ]);
    ?>
    <?php ActiveForm::end(); ?>
    <?php
        if (Yii::$app->request->post()){
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['attribute'=>'player_id','value' => 'player_id','enableSorting' => false],
                    ['attribute'=>'player_name','value' => 'player_name','enableSorting' => false],
                    ['attribute'=>'overtime_count','value'=>function($model){
                              return  \common\models\Player::getOvertime($model->player_id,Yii::$app->request->post()['yearmonth']);
                            },'enableSorting' => false],
                ],
            ]);
        }else{
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['attribute'=>'player_id','value' => 'player_id','enableSorting' => false],
                    ['attribute'=>'player_name','value' => 'player_name','enableSorting' => false],
                    ['attribute'=>'overtime_count','value'=>function($model){
                        return  \common\models\Player::getOvertime($model->player_id,date("Y-m",time()));
                    },'enableSorting' => false],
                ],
            ]);
        }

    ?>
</div>