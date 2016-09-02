<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bug */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => '缺陷率', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bug-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'player' => $player,
    ]) ?>

</div>
