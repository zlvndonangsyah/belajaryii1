<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Pesanan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PESANAN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pesanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pesanan',
            'id_pembeli',
            'id_barang',
            'tgl_pesanan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pesanan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pesanan' => $model->id_pesanan]);
                 }
            ],
        ],
    ]); ?>


</div>
