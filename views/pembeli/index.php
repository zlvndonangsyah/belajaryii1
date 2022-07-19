<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Pembeli ;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PembeliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PEMBELI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembeli-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pembeli', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pembeli',
            'nama',
            'jk',
            'alamat',
            'kode_pos',
            'kota',
            'tgl_lahir',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pembeli $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pembeli' => $model->id_pembeli]);
                 }
            ],
        ],
    ]); ?>


</div>
