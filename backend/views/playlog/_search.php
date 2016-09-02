<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlaylogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="play-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'play_id') ?>

    <?= $form->field($model, 'player_id') ?>

    <?= $form->field($model, 'conduct_id') ?>

    <?= $form->field($model, 'experience') ?>

    <?= $form->field($model, 'integral') ?>

    <?php // echo $form->field($model, 'happen_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
