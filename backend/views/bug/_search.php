<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BugSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bug-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bug_id') ?>

    <?= $form->field($model, 'player_id') ?>

    <?= $form->field($model, 'happen_time') ?>

    <?= $form->field($model, 'severity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
