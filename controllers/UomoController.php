<?php

namespace app\controllers;

use app\models\Account;
use app\models\OratoreSchema;
use app\models\search\UomoSearch;
use app\models\Uomo;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UomoController implements the CRUD actions for Uomo model.
 */
class UomoController extends Controller
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
     * Lists all Uomo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UomoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Uomo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Uomo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($from = null)
    {
        $model = new Uomo();
        $modelAccount = new Account();
        
        if ($model->load(Yii::$app->request->post())) {
        	
        	//Crea account
        	$modelAccount->load(Yii::$app->request->post());
        	$modelAccount->email = $model->email;
        	$modelAccount->setPassword(Yii::$app->getSecurity()->generateRandomString(10));
        	$modelAccount->generateAuthKey();
        	$modelAccount->save();
        	
        	//Uomo
        	$model->account_id = $modelAccount->id;
        	$model->save();
        	
        	//To-do send email
        	
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        if(!is_null($from))
        	if($from == 'oratore')
        		$model->oratore = 1;
        	
        return $this->render('create', [
            'model' => $model,
        	'modelAccount' => $modelAccount
        ]);
    }

    /**
     * Updates an existing Uomo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelAccount = $model->account;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $modelAccount->load(Yii::$app->request->post());
        	if(!is_null($model->account) && $model->account->email != $model->email){
        		$modelAccount->email = $model->email;
        	}
        	$modelAccount->save();
        	return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('update', [
            'model' => $model,
            'modelAccount' => $modelAccount
        ]);
    }

    /**
     * Deletes an existing Uomo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        OratoreSchema::deleteAll('oratore_id = '.$id);
        $account_id = $model->account_id; 
        $model->delete();
        Account::findOne($account_id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Uomo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uomo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uomo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
