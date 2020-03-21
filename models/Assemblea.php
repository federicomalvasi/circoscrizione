<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assemblee".
 *
 * @property int $id
 * @property string $tema
 * @property string $tema_ro
 * @property string $data
 * @property string $luogo
 * @property string $tipologia
 * @property int $n_presenti
 * @property int $n_battezzati
 * @property string $contribuzioni
 */
class Assemblea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assemblee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tema_ro', 'data', 'tipologia'], 'required'],
            [['data'], 'safe'],
            [['n_presenti', 'n_battezzati'], 'integer'],
            [['contribuzioni'], 'number'],
            [['tema', 'tema_ro', 'luogo'], 'string', 'max' => 255],
            [['tipologia'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tema' => 'Tema',
            'tema_ro' => 'Tema Ro',
            'data' => 'Data',
            'luogo' => 'Luogo',
            'tipologia' => 'Tipologia',
            'n_presenti' => 'N Presenti',
            'n_battezzati' => 'N Battezzati',
            'contribuzioni' => 'Contribuzioni',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRapporti()
    {
        return $this->hasMany(Rapporto::className(), ['assemblea_id' => 'id']);
    }
}
