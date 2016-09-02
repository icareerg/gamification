<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Player */

$this->title = '新增玩家';
$this->params['breadcrumbs'][] = ['label' => '玩家', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
