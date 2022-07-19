<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Suplier */

$this->title = $model->id_suplier;
$this->params['breadcrumbs'][] = ['label' => 'Supliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="suplier-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_suplier' => $model->id_suplier], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_suplier' => $model->id_suplier], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_suplier',
            'nama',
            'alamat',
            'kode_post',
            'kota',
        ],
    ]) ?>

</div>
