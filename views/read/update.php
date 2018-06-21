<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Read */

$this->title = 'Update Read: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_read]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="read-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
