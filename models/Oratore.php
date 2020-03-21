<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oratori".
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
 */
class Oratore extends Uomo
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uomini';
    }

    public static function primaryKey(){
    	return ['id'];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','congregazione_id', 'pioniere', 'oratore'], 'integer'],
            [['cognome', 'nome', 'congregazione_id'], 'required'],
            [['nomina'], 'string', 'max' => 2],
            [['telefono1', 'telefono2'], 'string', 'max' => 20],
            [['email', 'email_jw'], 'string', 'max' => 100],
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
            'schemi' => 'Schemi'
        ];
    }

    public static function find() {
        return parent::find ()
         ->onCondition ( [ 'and' ,
             [ '=' , static::tableName () . '.oratore', 1 ] ,
         ] );
     }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemi()
    {
        //return $this->hasMany(Schema::className(), ['oratore_id' => 'id'])->viaTable('');

        return $this->hasMany(Schema::className(), ['id' => 'schema_id'])
            ->viaTable('oratori_schemi', ['oratore_id' => 'id']);
    }


}
