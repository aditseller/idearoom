<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Read', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_read',
              [
           'label'=>'title',
           'format' => 'raw',
       'value'=>function ($data) {
            return Html::a($data->title,$data->title,['target'=>'_blank']);
        },
    ],
            //'content:ntext',
            'channel',
            //'tag',
            'created_by',
            'created_at',
            //'url:url',
            //'poster',
            //'source',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
