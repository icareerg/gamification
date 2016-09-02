<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RuleDuration */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => '时长配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-duration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'player' => $player,
        'duration' => $duration,
    ]) ?>

</div>
