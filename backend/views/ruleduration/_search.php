<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RuleDurationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rule-duration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rule_id') ?>

    <?= $form->field($model, 'conduct_id') ?>

    <?= $form->field($model, 'duration_id') ?>

    <?= $form->field($model, 'percentage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
