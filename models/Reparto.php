<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reparti".
 *
 * @property int $id
 * @property string $nome
 * @property string $nome_ro
 * @property int $stima_n_uomini
 */
class Reparto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reparti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'nome_ro'], 'required'],
            [['stima_n_uomini'], 'integer'],
            [['nome', 'nome_ro'], 'string', 'max' => 100],
        	[['note'], 'string'],
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
            'nome_ro' => 'Nome Ro',
            'stima_n_uomini' => 'Stima N Uomini',
        ];
    }
    
    public function behaviors()
    {
    	return [
    			'fileBehavior' => [
    					'class' => \nemmo\attachments\behaviors\FileBehavior::className()
    			]
    		
    	];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUomini()
    {
    	return $this->hasMany(Uomo::className(), ['id' => 'uomo_id'])->viaTable('organigramma', ['uomo_id' => 'id']);
    }
}
