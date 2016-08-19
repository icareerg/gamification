<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RuleDuration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rule-duration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level_id')->label($model->attributeLabels()['level_name'])->dropDownList($player->getLevels());?>

    <?= $form->field($model, 'duration_id')->label($model->attributeLabels()['duration_name'])->dropDownList($duration->getDurations());?>

    <?= $form->field($model, 'percentage')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
