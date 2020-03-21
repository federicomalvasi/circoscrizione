<?php

namespace app\controllers;

use Yii;
use app\models\Organigramma;
use app\models\search\OrganigrammaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Reparto;
use app\models\Circoscrizione;
use app\models\Uomo;

/**
 * OrganigrammaController implements the CRUD actions for Organigramma model.
 */
class OrganigrammaController extends Controller
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
     * Lists all Organigramma models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrganigrammaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPrint()
    {
        $circoscrizione = Circoscrizione::find()->one();
        $co_uomo = Uomo::findOne($circoscrizione->co_uomo_id);
        
        
        $sa_uomo = Uomo::findOne($circoscrizione->sa_uomo_id);
        $asa_uomo = Uomo::findOne($circoscrizione->asa_uomo_id);
        
        $organigramma = Organigramma::find()
        //->leftJoin('reparto')
        ->joinWith(['reparto', 'uomo'])
        ->orderby('reparti.nome_ro ASC, organigramma.ruolo DESC')
        ->all();
        
        //$reparti = Reparto::find()->orderby('nome ASC')->all();
        
        //print_r($organigramma);
        //die;
        $htmlContent = $this->renderPartial('print', ['organigramma' => $organigramma, 'co_uomo' => $co_uomo, 'sa_uomo' => $sa_uomo, 'asa_uomo' => $asa_uomo]);
        $pdf = Yii::$app->pdf;
        $pdf->content = $htmlContent;
        return $pdf->render();
    
    }

    /**
     * Displays a single Organigramma model.
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
     * Creates a new Organigramma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Organigramma();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Organigramma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionMieiReparti()
    {
    	$modelUomo = Yii::$app->user->identity->uomo;
    	$reparti = $modelUomo->organigramma;
    	$generale = Reparto::find()->where(['is_hide' => 1])->one(); //Usato per i moduli e file visibili a tutti
    	
    	return $this->render('miei-reparti',[
    			'modelUomo' => $modelUomo,
    			'reparti' => $reparti,
    	        'generale' => $generale   
    	]);
    }
    
    
    
    /**
     * Finds the Organigramma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organigramma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organigramma::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
