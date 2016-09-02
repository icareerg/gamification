<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RuleConduct */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => '行为配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-conduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'player' => $player,
        'rewards_penalties' => $rewards_penalties,
    ]) ?>

</div>
