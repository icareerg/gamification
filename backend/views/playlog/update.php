<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlayLog */

$this->title = '修改数据: ' . $model->play_id;
$this->params['breadcrumbs'][] = ['label' => '数据', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->play_id, 'url' => ['view', 'id' => $model->play_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="play-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'player' => $player,
        'duration' => $duration,
        'rewards_penalties' => $rewards_penalties,
    ]) ?>

</div>
