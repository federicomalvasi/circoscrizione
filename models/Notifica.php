<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notifiche".
 *
 * @property int $id
 * @property string $data
 * @property string $oggetto
 * @property string $messaggio
 */
class Notifica extends \yii\db\ActiveRecord
{
    public $destinatari;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifiche';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'oggetto', 'messaggio', 'destinatari', 'mittente_id'], 'required'],
            [['data'], 'safe'],
            [['messaggio'], 'string'],
            [['oggetto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'oggetto' => 'Oggetto',
            'messaggio' => 'Messaggio',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMittente()
    {
        return $this->hasOne(Uomo::className(), ['id' => 'mittente_id']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUomini()
    {
        return $this->hasMany(Uomo::className(), ['id' => 'uomo_id'])->viaTable('notifiche_destinatari', ['notifica_id' => 'id']);
    }
}
