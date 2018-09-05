<?php

namespace app\controllers;

use Yii;
use app\models\Disbursement;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DisbursementController implements the CRUD actions for Disbursement model.
 */
class DisbursementController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Disbursement models.
     * @return mixed
     */
    public function actionIndex()
    {
       $key = "%";
         if (isset($_POST['q']))
         {
            $key =  $_POST['q'] . "%";
         }
    
        $dataProvider = new ActiveDataProvider([
           'query' => Disbursement::find()->where('id  like :key',[':key' => $key])
                                                ->orwhere('stud_id  like :key',[':key' => $key])
                                                ->orwhere('prod_id  like :key',[':key' => $key])
                                                ->orwhere('qty like :key',[':key' => $key])
                                                ->orwhere('unit like :key',[':key' => $key])
                                                ->orwhere('reason like :key',[':key' => $key])
                                                ->orwhere('date_released like :key',[':key' => $key])
                                              
    ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Disbursement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Disbursement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Disbursement();

         if ($model->load(Yii::$app->request->post()) && $model->save()) {
     
            // var_dump($model);
            $product = Products::findOne($model->prod_id);
            $product->qty =   $product->qty - $model->qty;
            $product->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Disbursement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
          $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post()) && $model->save()) {
     
            // var_dump($model);
            $product = Products::findOne($model->prod_id);
            $product->qty =   $product->qty - $model->qty;
            $product->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Disbursement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Disbursement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Disbursement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Disbursement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
