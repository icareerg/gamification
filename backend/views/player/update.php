<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Player */

$this->title = '修改用户: ' . $model->player_name;
$this->params['breadcrumbs'][] = ['label' => '玩家清单', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->player_name, 'url' => ['view', 'id' => $model->player_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="player-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
