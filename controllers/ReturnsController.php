<?php

namespace app\controllers;

use Yii;
use app\models\Returns;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReturnsController implements the CRUD actions for Returns model.
 */
class ReturnsController extends Controller
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
     * Lists all Returns models.
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
           'query' => Returns::find()->where('id  like :key',[':key' => $key])
                                                ->orwhere('prod_id  like :key',[':key' => $key])
                                                ->orwhere('qty like :key',[':key' => $key])
                                                ->orwhere('date_returned like :key',[':key' => $key])
                                              
    ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Returns model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Returns model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         $model = new Returns();

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
     * Updates an existing Returns model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
     * Deletes an existing Returns model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Returns model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Returns the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Returns::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
