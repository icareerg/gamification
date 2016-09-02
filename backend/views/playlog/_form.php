<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use common\models\Player;
//use common\models\PlayLog;
//use common\models\PlayerConduct;
//use common\models\PlayRule;
//use common\models\DurationRule;
//use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\PlayLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="play-log-form">

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
        echo $form->field($model, 'conduct_id')
        ->label($model->attributeLabels()['conduct_name'])
        ->dropDownList($player->getConducts());

        echo $form->field($model, 'duration_id')
        ->label($duration->attributeLabels()['duration_name'])
        ->dropDownList($duration->getDurations());

        echo $form->field($model, 'rewards_penalties_id')
        ->label($rewards_penalties->attributeLabels()['rewards_penalties_name'])
        ->dropDownList($rewards_penalties->getRewardspenalties());

    if ($model->isNewRecord) {
        echo $form->field($model, 'happen_time')->textInput(['readonly' => true,'value' => date('Y-m-d H:i')]);
    }else{
        echo $form->field($model, 'happen_time')->textInput(['readonly' => true]);
    }
    ?>

    <?
    /*
    echo $form->field($model, 'experience')->textInput(['maxlength' => true]);

    echo $form->field($model, 'integral')->textInput(['maxlength' => true]);

    echo $form->field($model, 'happen_time')->widget(DateTimePicker::className(), [
            'removeButton' => false,
            'convertFormat' => true,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-MM-dd HH:mm'
            ]
        ]);
    echo '<label class="control-label">时间</label>';
    echo DateTimePicker::widget([
        'id' => 'playlog-happen_time',
        'name' => 'PlayLog[happen_time]',
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
//        'value' => date('Y-m-d h:i:m',$model['happen_time']),
//        'value' => $model['happen_time'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd HH:mm'
        ]
    ]);
    */
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
