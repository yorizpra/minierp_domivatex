<?php

namespace backend\controllers;

use Yii;
use backend\models\PembelianMaterialSupport;
use backend\models\PembelianMaterialSupportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembelianMaterialSupportController implements the CRUD actions for PembelianMaterialSupport model.
 */
class PembelianMaterialSupportController extends Controller
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
     * Lists all PembelianMaterialSupport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembelianMaterialSupportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        /*
        $query = new yii\db\Query();
        $query->select('salary_monthly.id_pegawai FROM salary_monthly')
        ->from('salary_monthly');

        $query->join = [
            ['LEFT JOIN', 'hrm_pegawai', 'salary_monthly.id_pegawai = hrm_pegawai.id_pegawai'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);
        */

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    // public function actionIndex()
    // {
    //     $searchModel = new SalaryMonthlySearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     $query = new yii\db\Query();
    //     $query->select('salary_monthly.id_pegawai FROM salary_monthly')
    //     ->from('salary_monthly');

    //     $query->join = [
    //         ['LEFT JOIN', 'hrm_pegawai', 'salary_monthly.id_pegawai = hrm_pegawai.id_pegawai'],
    //         //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
    //     ];

    //     $pagination = 10;
    //     $dataProvider = new yii\data\ActiveDataProvider([
    //         'query' => $query,
    //         'pagination' => ['pageSize' => $pagination],
    //         //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
    //     ]);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,

    //         // 'id_pegawai' => $id_pegawai,
    //     ]);
    // }

    /**
     * Displays a single PembelianMaterialSupport model.
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
     * Creates a new PembelianMaterialSupport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PembelianMaterialSupport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pembelian_material_support]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PembelianMaterialSupport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pembelian_material_support]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PembelianMaterialSupport model.
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
     * Finds the PembelianMaterialSupport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PembelianMaterialSupport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PembelianMaterialSupport::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
