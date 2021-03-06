<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RuleConduct */

$this->title = $model->rule_id;
$this->params['breadcrumbs'][] = ['label' => '行为配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-conduct-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->rule_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->rule_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该项吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rule_id',
            [
                'label' => $model->attributeLabels()['level_name'],
                'value' => $model->level->level_name,
            ],
            [
                'label' => $model->attributeLabels()['conduct_name'],
                'value' => $model->conduct->conduct_name,
            ],
            [
                'label' => $model->attributeLabels()['rewards_penalties_name'],
                'value' => $model->rewardspenalties->rewards_penalties_name,
            ],
            'experience',
            'integral',
        ],
    ]) ?>

</div>
