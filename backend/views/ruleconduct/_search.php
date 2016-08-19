<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RuleConductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rule-conduct-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rule_id') ?>

    <?= $form->field($model, 'level_id') ?>

    <?= $form->field($model, 'conduct_id') ?>

    <?= $form->field($model, 'experience') ?>

    <?= $form->field($model, 'integral') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
