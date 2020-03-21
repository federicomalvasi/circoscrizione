<?php

namespace app\controllers;

use Yii;
use app\models\Notifica;
use app\models\search\NotificaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use app\models\NotificaDestinatario;

/**
 * NotificaController implements the CRUD actions for Notifica model.
 */
class NotificaController extends Controller
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
     * Lists all Notifica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotificaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notifica model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $uomo = Yii::$app->user->identity->uomo->id;
        $notifica_destinatario = NotificaDestinatario::find()->where(['notifica_id' => $model->id, 'uomo_id' => $uomo])->one();
        if(!$notifica_destinatario->letto){
            $notifica_destinatario->letto = 1;
            $notifica_destinatario->save();
        }
         
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Notifica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notifica();

        if ($model->load(Yii::$app->request->post())) {
            $model->mittente_id = Yii::$app->user->identity->uomo->id;
        	$model->data = new Expression('NOW()');
        	$model->save();
        	$insert_link = [];
        	foreach($model->destinatari as $destinatario){
        		$insert_link[] = [$destinatario, $model->id, '0']; 
        	}
            //Destinatari
        	Yii::$app->db->createCommand()->batchInsert('notifiche_destinatari',
        			['uomo_id', 'notifica_id', 'letto'],
        			$insert_link
        			)
        			->execute();
        	
        	return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Notifica model.
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
    
    public function actionListAjax()
    {
    	$notifiche = NotificaDestinatario::find()
    					->joinWith('notifica')
    					->where(['letto' => 0, 'uomo_id' => Yii::$app->user->identity->uomo->id])
    					->orderBy('data DESC')
    					->all();
    	
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$returnArray = [
    			'count' => count($notifiche),
    			'list' => $this->renderPartial('_list-ajax', ['notifiche' => $notifiche])	 
    		];
    	return $returnArray;
    
    }

    /**
     * Finds the Notifica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notifica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notifica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
