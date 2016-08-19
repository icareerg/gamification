<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Player */

$this->title = $model->player_name;
$this->params['breadcrumbs'][] = ['label' => '玩家', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->player_id], ['class' => 'btn btn-primary']) ?>
        <?/*= Html::a('删除', ['delete', 'id' => $model->player_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该项吗?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => '玩家编号',
                'value' => $model->level_id,
            ],
            'player_name',
            [
                'label' => $model->attributeLabels()['level_name'],
                'value' => $model->level->level_name,
            ],
            'experience',
            'integral',
        ],
    ]) ?>

</div>
