<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id_barang
 * @property string $nama
 * @property string $varian
 * @property string $harga_beli
 * @property string $harga_jual
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'varian', 'harga_beli', 'harga_jual'], 'required'],
            [['nama', 'varian', 'harga_beli', 'harga_jual'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'nama' => 'Nama Barang',
            'varian' => 'Varian',
            'harga_beli' => 'Harga Beli',
            'harga_jual' => 'Harga Jual',
        ];
    }
    public function getPesanan()
    {
        return $this->hasOne (Petugas::className(), ['id_barang'=>'id_barang']);
    }

    public function getPembelian()
    {
        return $this->hasOne (Petugas::className(), ['id_barang'=>'id_barang']);
    }

}
