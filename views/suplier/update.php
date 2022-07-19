<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Suplier */

$this->title = 'Update Suplier: ' . $model->id_suplier;
$this->params['breadcrumbs'][] = ['label' => 'Supliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_suplier, 'url' => ['view', 'id_suplier' => $model->id_suplier]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
