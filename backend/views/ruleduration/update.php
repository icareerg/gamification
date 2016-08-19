<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RuleDuration */

$this->title = '修改: ' . $model->rule_id;
$this->params['breadcrumbs'][] = ['label' => '时长配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rule_id, 'url' => ['view', 'id' => $model->rule_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rule-duration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'player' => $player,
        'duration' => $duration,
    ]) ?>

</div>