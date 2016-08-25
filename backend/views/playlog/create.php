<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PlayLog */

$this->title = '新增数据';
$this->params['breadcrumbs'][] = ['label' => '数据', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="play-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?echo $this->render('_form', [
        'model' => $model,
        'player' => $player,
        'duration' => $duration,
        'rewards_penalties' => $rewards_penalties,
    ]);
    ?>

</div>
