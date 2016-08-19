<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RuleConduct */

$this->title = '修改行为: ' . $model->rule_id;
$this->params['breadcrumbs'][] = ['label' => '行为配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rule_id, 'url' => ['view', 'id' => $model->rule_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="rule-conduct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'player' => $player,
        'rewards_penalties' => $rewards_penalties,
    ]) ?>

</div>
