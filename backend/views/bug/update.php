<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bug */

$this->title = '修改: ' . $model->bug_id;
$this->params['breadcrumbs'][] = ['label' => '缺陷率', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bug_id, 'url' => ['view', 'id' => $model->bug_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="bug-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
