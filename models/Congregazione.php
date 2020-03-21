<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "congregazioni".
 *
 * @property int $id
 * @property string $nome
 * @property string $tipologia C=congregazione, G=Gruppo, P=Pregruppo
 * @property string $citta
 */
class Congregazione extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congregazioni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'citta'], 'required'],
            [['nome'], 'string', 'max' => 255],
            [['tipologia'], 'string', 'max' => 1],
            [['citta'], 'string', 'max' => 100],
            [['proclamatori'], 'integer'],
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
            'tipologia' => 'Tipologia',
            'citta' => 'Citta',
        ];
    }
}
