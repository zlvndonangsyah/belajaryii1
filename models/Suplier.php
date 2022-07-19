<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suplier".
 *
 * @property int $id_suplier
 * @property string $nama
 * @property string $alamat
 * @property int $kode_post
 * @property string $kota
 */
class Suplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'kode_post', 'kota'], 'required'],
            [['kode_post'], 'integer'],
            [['nama', 'alamat', 'kota'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_suplier' => 'Id Suplier',
            'nama' => 'Nama Suplier',
            'alamat' => 'Alamat',
            'kode_post' => 'Kode Post',
            'kota' => 'Kota',
        ];
    }

    public function getPembelian()
    {
        return $this->hasOne (Petugas::className(), ['id_suplier'=>'id_suplier']);
    }
}
