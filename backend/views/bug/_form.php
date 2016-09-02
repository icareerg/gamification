<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Bug */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bug-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if ($model->isNewRecord){
        echo $form->field($model, 'player_id')
        ->label($model->attributeLabels()['player_name'])
        ->dropDownList($player->getPlayers());
    }else{
        echo $form->field($model, 'player_id')
        ->label($model->attributeLabels()['player_name'])
        ->textInput(['value' => $model->player->player_name,'readonly'=>true]);
    }

    if ($model->isNewRecord) {
        $datepicker = date('Y-m-d');
    }else{
        $datepicker = date('Y-m-d', $model['happen_time']);
    }
    echo DatePicker::widget([
        'id' => 'bug-happen_time',
        'name' => 'Bug[happen_time]',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'removeButton' => false,
        'value' => $datepicker,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'severity')->dropDownList(\common\lib\common::getSeveritys()); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
