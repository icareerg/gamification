<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PlayLog */

$this->title = $model->play_id;
$this->params['breadcrumbs'][] = ['label' => '数据', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="play-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('修改', ['update', 'id' => $model->play_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->play_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该项吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'play_id',
            [
                'label' => $model->attributeLabels()['player_name'],
                'value' => $model->player->player_name,
            ],
            [
                'label' => $model->attributeLabels()['conduct_name'],
                'value' => $model->conduct->conduct_name,
            ],
            [
                'label' => $model->attributeLabels()['duration_name'],
                'value' => $model->duration->duration_name,
            ],
            [
                'label' => $model->attributeLabels()['rewards_penalties_name'],
                'value' => $model->rewardspenalties->rewards_penalties_name,
            ],
            'experience',
            'integral',
            'happen_time:datetime',
        ],
    ]) ?>

</div>
