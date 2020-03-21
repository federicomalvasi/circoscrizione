<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "assemblee_rapporti".
 *
 * @property int $id
 * @property int $assemblea_id
 * @property int $reparto_id
 * @property string $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Assemblee $assemblea
 * @property Reparti $reparto
 */
class Rapporto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assemblee_rapporti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['assemblea_id', 'reparto_id'], 'required'],
            [['assemblea_id', 'reparto_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at','updated_at'], 'safe'],
            [['assemblea_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assemblea::className(), 'targetAttribute' => ['assemblea_id' => 'id']],
            [['reparto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['reparto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assemblea_id' => 'Assemblea ID',
            'reparto_id' => 'Reparto ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    
    public function behaviors()
    {
        return [
            'fileBehavior' => [
                'class' => \nemmo\attachments\behaviors\FileBehavior::className()
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssemblea()
    {
        return $this->hasOne(Assemblea::className(), ['id' => 'assemblea_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReparto()
    {
        return $this->hasOne(Reparto::className(), ['id' => 'reparto_id']);
    }
}
