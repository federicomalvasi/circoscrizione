<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oratori_schemi".
 *
 * @property int $oratore_id
 * @property int $schema_id
 *
 * @property Uomini $oratore
 * @property Schemi $schema
 */
class OratoreSchema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oratori_schemi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oratore_id', 'schema_id'], 'required'],
            [['oratore_id', 'schema_id'], 'integer'],
            [['oratore_id', 'schema_id'], 'unique', 'targetAttribute' => ['oratore_id', 'schema_id']],
            [['oratore_id'], 'exist', 'skipOnError' => true, 'targetClass' => Uomo::className(), 'targetAttribute' => ['oratore_id' => 'id']],
            [['schema_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schema::className(), 'targetAttribute' => ['schema_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'oratore_id' => 'Oratore ID',
            'schema_id' => 'Schema ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOratore()
    {
        return $this->hasOne(Uomini::className(), ['id' => 'oratore_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchema()
    {
        return $this->hasOne(Schemi::className(), ['id' => 'schema_id']);
    }
}
