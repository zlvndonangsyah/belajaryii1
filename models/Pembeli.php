<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembeli".
 *
 * @property int $id_pembeli
 * @property string $nama
 * @property string $jk
 * @property string $alamat
 * @property int $kode_pos
 * @property string $kota
 * @property string $tgl_lahir
 */
class Pembeli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembeli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jk', 'alamat', 'kode_pos', 'kota', 'tgl_lahir'], 'required'],
            [['jk'], 'string'],
            [['kode_pos'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['nama', 'alamat', 'kota'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembeli' => 'Id Pembeli',
            'nama' => 'Nama Pembeli',
            'jk' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'kode_pos' => 'Kode Pos',
            'kota' => 'Kota',
            'tgl_lahir' => 'Tanggal Lahir',
        ];
    }

    public function getPesanan()
    {
        return $this->hasOne (Petugas::className(), ['id_pembeli'=>'id_pembeli']);
    }
}
