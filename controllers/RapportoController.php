<?php

namespace app\controllers;

use Yii;
use app\models\Rapporto;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Assemblea;
use app\models\Organigramma;
use yii\helpers\ArrayHelper;
use app\models\Reparto;

/**
 * RapportoController implements the CRUD actions for Rapporto model.
 */
class RapportoController extends Controller
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
     * Lists all Rapporto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rapporto::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionMieiRapporti()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rapporto::find()->where(['created_by' => Yii::$app->user->identity->id]),
        ]);
        
        $oggi = date('Y-m-d');
        //$fratregiorni = Date('Y-m-d', strtotime("+3 days"));
        $assemblea_open = Assemblea::find()->where(['<=', 'data', $oggi])->andWhere(['>=', 'DATE_ADD(data, INTERVAL 3 DAY)', $oggi])->one();
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'assemblea' => $assemblea_open
        ]);
    }
    
    
    /**
     * Displays a single Rapporto model.
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
     * Creates a new Rapporto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($assemblea_id, $returnTo = null)
    {
        $model = new Rapporto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(is_null($returnTo))
                return $this->redirect(['miei-rapporti']);
        }
        
        $model->assemblea_id = $assemblea_id;
        
        $reparti_list = [];
        if(Yii::$app->user->identity->isAdmin)
            $reparti_list = ArrayHelper::map(Reparto::find()->where(['is_hide' => 0])->all(),'id','nome');
        else
            $reparti_list = ArrayHelper::map(Yii::$app->user->identity->uomo->reparti,'id','nome');
            
        return $this->render('create', [
            'model' => $model,
            'reparti_list' => $reparti_list
        ]);
    }

    /**
     * Updates an existing Rapporto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rapporto model.
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

    /**
     * Finds the Rapporto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rapporto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rapporto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
