<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notifiche_destinatari".
 *
 * @property int $id
 * @property int $notifica_id
 * @property int $uomo_id
 * @property int $letto
 */
class NotificaDestinatario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifiche_destinatari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notifica_id', 'uomo_id'], 'required'],
            [['notifica_id', 'uomo_id', 'letto'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'notifica_id' => 'Notifica ID',
            'uomo_id' => 'Uomo ID',
            'letto' => 'Letto',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifica()
    {
    	return $this->hasOne(Notifica::className(), ['id' => 'notifica_id']);
    }
}
