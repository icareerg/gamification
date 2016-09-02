<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bug */

$this->title = $model->bug_id;
$this->params['breadcrumbs'][] = ['label' => '缺陷率', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bug-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->bug_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->bug_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bug_id',
            [
                'label' => $model->attributeLabels()['player_name'],
                'value' => $model->player->player_name,
            ],
            'happen_time:datetime',
            [
                'label' => $model->attributeLabels()['severity'],
                'value' => \common\lib\common::getSeverity($model->severity),
            ],

        ],
    ]) ?>

</div>
