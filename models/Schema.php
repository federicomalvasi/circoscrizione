<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schemi".
 *
 * @property int $id
 * @property int $numero
 * @property string $titolo
 * @property int $titolo_ro
 *
 * @property OratoriSchemi[] $oratoriSchemis
 * @property Uomini[] $oratores
 */
class Schema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schemi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero', 'titolo', 'titolo_ro'], 'required'],
            [['numero'], 'integer'],
            [['titolo','titolo_ro'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Numero',
            'titolo' => 'Titolo',
            'titolo_ro' => 'Titolo Ro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOratoriSchemis()
    {
        return $this->hasMany(OratoriSchemi::className(), ['schema_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOratores()
    {
        return $this->hasMany(Uomini::className(), ['id' => 'oratore_id'])->viaTable('oratori_schemi', ['schema_id' => 'id']);
    }
}
