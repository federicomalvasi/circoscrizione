<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organigramma".
 *
 * @property int $id
 * @property int $uomo_id
 * @property int $reparto_id
 * @property string $ruolo
 *
 * @property Reparti $reparto
 * @property Uomini $uomo
 */
class Organigramma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organigramma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uomo_id', 'reparto_id', 'ruolo'], 'required'],
            [['uomo_id', 'reparto_id'], 'integer'],
            [['ruolo'], 'string', 'max' => 3],
            [['reparto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['reparto_id' => 'id']],
            [['uomo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Uomo::className(), 'targetAttribute' => ['uomo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uomo_id' => 'Uomo ID',
            'reparto_id' => 'Reparto ID',
            'ruolo' => 'Ruolo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReparto()
    {
        return $this->hasOne(Reparto::className(), ['id' => 'reparto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUomo()
    {
        return $this->hasOne(Uomo::className(), ['id' => 'uomo_id']);
    }
}
