<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesanan".
 *
 * @property int $id_pesanan
 * @property int $id_pembeli
 * @property int $id_barang
 * @property string $tgl_pesanan
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembeli', 'id_barang', 'tgl_pesanan'], 'required'],
            [['id_pembeli', 'id_barang'], 'integer'],
            [['tgl_pesanan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesanan' => 'Id Pesanan',
            'id_pembeli' => 'Id Pembeli',
            'id_barang' => 'Id Barang',
            'tgl_pesanan' => 'Tgl Pesanan',
        ];
    }

    public function getBarang()
    {
        return $this->hasOne (Petugas::className(), ['id_barang'=>'id_barang']);
    }

    public function getPembeli()
    {
        return $this->hasOne (Petugas::className(), ['id_pembeli'=>'id_pembeli']);
    }
}
