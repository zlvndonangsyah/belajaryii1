<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembelian".
 *
 * @property int $id_pembelian
 * @property int $id_barang
 * @property int $id_suplier
 * @property string $tgl
 */
class Pembelian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembelian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'id_suplier', 'tgl'], 'required'],
            [['id_barang', 'id_suplier'], 'integer'],
            [['tgl'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembelian' => 'Id Pembelian',
            'id_barang' => 'Id Barang',
            'id_suplier' => 'Id Suplier',
            'tgl' => 'Tanggal Pembelian',
        ];
    }
    public function getBarang()
    {
        return $this->hasOne (Petugas::className(), ['id_barang'=>'id_barang']);
    }

    public function getSuplier()
    {
        return $this->hasOne (Petugas::className(), ['id_suplier'=>'id_suplier']);
    }
}
