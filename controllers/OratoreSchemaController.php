<?php

namespace app\controllers;

use Yii;
use app\models\OratoreSchema;
use app\models\search\OratoreSchema as OratoreSchemaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Schema;
use app\models\search\SchemaSearch;
use app\models\Oratore;
use yii\helpers\ArrayHelper;

/**
 * OratoreSchemaController implements the CRUD actions for OratoreSchema model.
 */
class OratoreSchemaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all OratoreSchema models.
     * @return mixed
     */
    public function actionIndex($editMode = null,$oratore_id = null)
    {
        if(is_null($oratore_id) && $editMode != null && $editMode != 1)
    	   $oratore_id = Yii::$app->user->identity->uomo->id;
    	
    	   
    	$modelOratore = Oratore::findOne($oratore_id);
        $searchModel = new SchemaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        $schemi_assegnati = ArrayHelper::getColumn($modelOratore->schemi, 'id');
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	'modelOratore' => $modelOratore,
        	'schemi_assegnati' => $schemi_assegnati		
        ]);
    }

    /**
     * Creates a new OratoreSchema model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($oratore_id, $schema_id)
    {
        $model = new OratoreSchema();
		$model->oratore_id = $oratore_id;
		$model->schema_id = $schema_id;
		$model->save();

       	return $this->redirect(['index', 'oratore_id' => $model->oratore_id]);
       
    }

    /**
     * Deletes an existing OratoreSchema model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $oratore_id
     * @param integer $schema_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($oratore_id, $schema_id)
    {
        $this->findModel($oratore_id, $schema_id)->delete();

        return $this->redirect(['index', 'oratore_id' => $oratore_id]);
    }

    /**
     * Finds the OratoreSchema model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $oratore_id
     * @param integer $schema_id
     * @return OratoreSchema the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($oratore_id, $schema_id)
    {
        if (($model = OratoreSchema::findOne(['oratore_id' => $oratore_id, 'schema_id' => $schema_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
