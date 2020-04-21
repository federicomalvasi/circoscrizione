<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "uomini".
 *
 * @property int $id
 * @property int $cognome
 * @property int $nome
 * @property int $congregazione_id
 * @property string $nomina A/SM
 * @property int $pioniere
 * @property int $oratore
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 * @property string $email_jw
 * @property int $anno_nascita
 *
 * @property OratoriSchemi[] $oratoriSchemis
 * @property Schemi[] $schemas
 */
class Uomo extends \yii\db\ActiveRecord
{
    
    public $has_account;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uomini';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cognome', 'nome', 'congregazione_id','email'], 'required'],
            [['congregazione_id', 'pioniere', 'oratore'], 'integer'],
            [['cognome', 'nome'], 'string', 'max' => 255],
            [['nomina'], 'string', 'max' => 2],
            [['anno_nascita'], 'string', 'max' => 4],
            [['telefono1', 'telefono2'], 'string', 'max' => 20],
            [['email', 'email_jw'], 'string', 'max' => 100],
        ];
    }
    
    public function behaviors()
    {
    	return [
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cognome' => 'Cognome',
            'nome' => 'Nome',
            'congregazione_id' => 'Congregazione ID',
            'nomina' => 'Nomina',
            'pioniere' => 'Pioniere',
            'oratore' => 'Oratore',
            'telefono1' => 'Telefono1',
            'telefono2' => 'Telefono2',
            'email' => 'Email',
            'email_jw' => 'Email Jw',
        	'has_account' => 'Associare un account'	
        ];
    }
	
    public function getDenominazione()
    {
    	return $this->cognome . ' ' . $this->nome . ' (' . Yii::$app->params['nomine'][$this->nomina] . ')';
    }
    
    public function getFullName()
    {
    	return  $this->nome . ' ' . $this->cognome;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongregazione()
    {
    	return $this->hasOne(Congregazione::className(), ['id' => 'congregazione_id']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOratoriSchemis()
    {
        return $this->hasMany(OratoriSchemi::className(), ['oratore_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemas()
    {
        return $this->hasMany(Schemi::className(), ['id' => 'schema_id'])->viaTable('oratori_schemi', ['oratore_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReparti()
    {
    	return $this->hasMany(Reparto::className(), ['id' => 'reparto_id'])->viaTable('organigramma', ['uomo_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganigramma()
    {
    	return $this->hasMany(Organigramma::className(), ['uomo_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
    	return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }
    
}
