<?php

namespace backend\controllers;

use Yii;
use backend\models\MutasiStock;
use backend\models\MutasiStockSearch;
use backend\models\MutasiStockItem;
use backend\models\MutasiStockItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MutasiStockController implements the CRUD actions for MutasiStock model.
 */
class MutasiStockController extends Controller
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
     * Lists all MutasiStock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MutasiStockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MutasiStock model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCetakSuratJalan($ip){
        $modelParent = $this->findModel($ip);

        $searchModel = new MutasiStockItemSearch();
        $searchModel->id_mutasi_stock = $modelParent->id_mutasi_stock;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPartial('cetak-surat-jalan/cetak-surat-jalan', [
            'modelParent' => $modelParent,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MutasiStock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MutasiStock();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mutasi_stock]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MutasiStock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mutasi_stock]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MutasiStock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCreateItem($ip)
    {
        $model = new MutasiStockItem();
        $modelParent = $this->findModel($ip);
        $model->id_mutasi_stock = $ip;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $ip]);
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('/mutasi-stock/item/create', [
                'model' => $model,
                'modelParent' => $modelParent,
            ]);
        } else {
            return $this->render('/mutasi-stock/item/create', [
                'model' => $model,
                'modelParent' => $modelParent,
            ]);
        }
    }

    public function actionDeleteItem($id_item, $id_parent)
    {
        $this->findModelItem($id_item)->delete();

        return $this->redirect(['view', 'id' => $id_parent]);
    }

    /**
     * Finds the MutasiStock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MutasiStock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MutasiStock::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelItem($id)
    {
        if (($model = MutasiStockItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
