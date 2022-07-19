<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Suplier;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SUPLIER';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suplier-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Suplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_suplier',
            'nama',
            'alamat',
            'kode_post',
            'kota',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Suplier $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_suplier' => $model->id_suplier]);
                 }
            ],
        ],
    ]); ?>


</div>
