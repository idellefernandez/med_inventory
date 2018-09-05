<?php

namespace app\controllers;

use Yii;
use app\models\Warehouse;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WarehouseController implements the CRUD actions for Warehouse model.
 */
class WarehouseController extends Controller
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
     * Lists all Warehouse models.
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
           'query' => Warehouse::find()->where('id  like :key',[':key' => $key])
                                                ->orwhere('prod_id  like :key',[':key' => $key])
                                                ->orwhere('unit like :key',[':key' => $key])
                                                ->orwhere('unit_cost like :key',[':key' => $key])
                                                ->orwhere('qty like :key',[':key' => $key])
                                                ->orwhere('date_added like :key',[':key' => $key])
                                                ->orwhere('supplier like :key',[':key' => $key])
                                                ->orwhere('received_by like :key',[':key' => $key])
                                              
    ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Warehouse model.
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
     * Creates a new Warehouse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Warehouse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
     
            // var_dump($model);
            $product = Products::findOne($model->prod_id);
            $product->qty =   $product->qty + $model->qty;
            $product->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Warehouse model.
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
            $product->qty =   $product->qty + $model->qty;
            $product->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Warehouse model.
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
     * Finds the Warehouse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Warehouse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Warehouse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
