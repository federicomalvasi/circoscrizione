<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "circoscrizione".
 *
 * @property int $id
 * @property string $nome
 * @property string $sigla
 * @property string $parte
 * @property int $co_uomo_id
 * @property int $sa_uomo_id
 * @property int $asa_uomo_id
 */
class Circoscrizione extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'circoscrizione';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nome'], 'required'],
            [['id', 'co_uomo_id', 'sa_uomo_id', 'asa_uomo_id'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['sigla'], 'string', 'max' => 10],
            [['parte'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'sigla' => 'Sigla',
            'parte' => 'Parte',
            'co_uomo_id' => 'Co Uomo ID',
            'sa_uomo_id' => 'Sa Uomo ID',
            'asa_uomo_id' => 'Asa Uomo ID',
        ];
    }
}
