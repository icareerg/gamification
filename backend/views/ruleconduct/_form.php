<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RuleConduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rule-conduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level_id')->label($model->attributeLabels()['level_name'])->dropDownList($player->getLevels());?>

    <?= $form->field($model, 'conduct_id')->label($model->attributeLabels()['conduct_name'])->dropDownList($player->getConducts());?>

    <?= $form->field($model, 'rewards_penalties_id')->label($model->attributeLabels()['rewards_penalties_name'])->dropDownList($rewards_penalties->getRewardspenalties());?>

    <?= $form->field($model, 'experience')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'integral')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
