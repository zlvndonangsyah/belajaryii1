<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Pembelian;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PembelianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PEMBELIAN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pembelian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pembelian',
            'id_barang',
            'id_suplier',
            'tgl',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pembelian $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pembelian' => $model->id_pembelian]);
                 }
            ],
        ],
    ]); ?>


</div>
