<?php

namespace backend\controllers;

use Yii;
use backend\models\MaterialIn;
use backend\models\MaterialInSearch;
use backend\models\MaterialInItemProc;
use backend\models\MaterialInItemProcSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialInController implements the CRUD actions for MaterialIn model.
 */
class PendapatanController extends Controller
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
     * Lists all MaterialIn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiMaterial()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Menghitung total rekapitulasi per material
        $models = $dataProvider->getModels();
        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;
        foreach ($models as $model) {
            //echo $model->yard_awal." ";
            $total_yard_awal = $total_yard_awal + $model->total_yard_awal;
            $total_yard_hasil = $total_yard_hasil + $model->total_yard_hasil;
            $total_buang = $total_buang + $model->total_buang;
        }

        // echo $total_yard_awal." <br>";
        // echo $total_yard_hasil." <br>";
        // echo $total_buang." <br>";


        return $this->render('rekapitulasi-material', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }


    public function actionLaporanHarian()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        /*
SELECT b.tanggal_proses, count(a.id_material_in_item_proc) as jml_transaksi,
SUM(a.yard_awal) as total_yard_awal,
SUM(a.yard_hasil1) as total_yard_hasil1,
SUM(a.yard_hasil2) as total_yard_hasil2,
SUM(a.yard_hasil3) as total_yard_hasil3,
SUM(a.yard_hasil4) as total_yard_hasil4,
SUM(a.yard_hasil5) as total_yard_hasil5,
SUM(a.yard_hasil6) as total_yard_hasil6
FROM `material_in_item_proc` a
LEFT JOIN material_in b on a.id_material_in = b.id_material_in
group by b.tanggal_proses
        */
        $query = new yii\db\Query();
        $query->select('material_in.tanggal_proses, 
                count(material_in_item_proc.id_material_in_item_proc) as jml_transaksi,
                SUM(material_in_item_proc.yard_awal) as total_yard_awal,
                (SUM(material_in_item_proc.yard_hasil1) +
                    SUM(material_in_item_proc.yard_hasil2) +
                    SUM(material_in_item_proc.yard_hasil3) +
                    SUM(material_in_item_proc.yard_hasil4) +
                    SUM(material_in_item_proc.yard_hasil5) +
                    SUM(material_in_item_proc.yard_hasil6)) as total_yard_hasil,

                (SUM(material_in_item_proc.buang1) +
                    SUM(material_in_item_proc.buang2)) as total_buang

                ')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['material_in.tanggal_proses']);
        $query->orderBy('material_in.tanggal_proses DESC');

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        //Menghitung total rekapitulasi per material

        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;


        return $this->render('laporan/laporan-harian', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionLaporanHarianDetail($tanggal_proses)
    {
        $searchModel = new MaterialInItemProcSearch();
        //$searchModel->tanggal_proses = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('*')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            ['LEFT JOIN', 'material', 'material_in.id_material = material_in.id_material'],
        ];
        $query->andFilterWhere([
            'material_in.tanggal_proses' => $tanggal_proses,
        ]);

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        return $this->render('laporan/laporan-harian-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tanggal_proses' => $tanggal_proses,
        ]);
    }

    public function actionLaporanBulanan()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('EXTRACT(YEAR_MONTH FROM material_in.tanggal_proses) as tanggal_proses, 
                count(material_in_item_proc.id_material_in_item_proc) as jml_transaksi,
                SUM(material_in_item_proc.yard_awal) as total_yard_awal,
                (SUM(material_in_item_proc.yard_hasil1) +
                    SUM(material_in_item_proc.yard_hasil2) +
                    SUM(material_in_item_proc.yard_hasil3) +
                    SUM(material_in_item_proc.yard_hasil4) +
                    SUM(material_in_item_proc.yard_hasil5) +
                    SUM(material_in_item_proc.yard_hasil6)) as total_yard_hasil,
                
                (SUM(material_in_item_proc.buang1) +
                    SUM(material_in_item_proc.buang2)) as total_buang
                
                ')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['MONTH(material_in.tanggal_proses)']);
        $query->orderBy('MONTH(material_in.tanggal_proses) DESC');

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        //Menghitung total rekapitulasi per material

        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;


        return $this->render('laporan/laporan-bulanan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionLaporanBulananDetail($tanggal_proses)
    {
        $searchModel = new MaterialInItemProcSearch();
        //$searchModel->tanggal_proses = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('*')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
        ];
        $query->andFilterWhere([
            'EXTRACT(YEAR_MONTH FROM material_in.tanggal_proses)' => $tanggal_proses,
        ]);

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        return $this->render('laporan/laporan-bulanan-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tanggal_proses' => $tanggal_proses,
        ]);
    }

    public function actionLaporanTahunan()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('EXTRACT(YEAR FROM material_in.tanggal_proses) as tanggal_proses, 
                count(material_in_item_proc.id_material_in_item_proc) as jml_transaksi,
                SUM(material_in_item_proc.yard_awal) as total_yard_awal,
                (SUM(material_in_item_proc.yard_hasil1) +
                    SUM(material_in_item_proc.yard_hasil2) +
                    SUM(material_in_item_proc.yard_hasil3) +
                    SUM(material_in_item_proc.yard_hasil4) +
                    SUM(material_in_item_proc.yard_hasil5) +
                    SUM(material_in_item_proc.yard_hasil6)) as total_yard_hasil,
                
                (SUM(material_in_item_proc.buang1) +
                    SUM(material_in_item_proc.buang2)) as total_buang
                
                ')
        ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['YEAR(material_in.tanggal_proses)']);
        $query->orderBy('YEAR(material_in.tanggal_proses) DESC');

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        //Menghitung total rekapitulasi per material

        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;


        return $this->render('laporan/laporan-tahunan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionLaporanTahunanDetail($tanggal_proses)
    {
        $searchModel = new MaterialInItemProcSearch();
        //$searchModel->tanggal_proses = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('*')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
        ];
        $query->andFilterWhere([
            'EXTRACT(YEAR FROM material_in.tanggal_proses)' => $tanggal_proses,
        ]);

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        return $this->render('laporan/laporan-tahunan-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tanggal_proses' => $tanggal_proses,
        ]);
    }

    /**
     * Displays a single MaterialIn model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //Ini Item Proc
        $searchModel = new MaterialInItemProcSearch();
        $searchModel->id_material_in = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Menghitung total rekapitulasi per material
        $models = $dataProvider->getModels();
        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_lebih = 0;
        $total_selisih_kurang = 0;

        foreach ($models as $model) {
            //echo $model->yard_awal." ";
            $total_yard_awal = $total_yard_awal + $model->yard_awal;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil1;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil2;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil3;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil4;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil5;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil6;
            $total_buang = $total_buang + $model->buang1;
            $total_buang = $total_buang + $model->buang2;

            if ($model->yard_hasil1 > $model->yard_awal) {
                $model->selisih_lebih = ($model->yard_hasil1 + $model->yard_hasil2 + $model->yard_hasil3 + $model->yard_hasil4 + $model->yard_hasil5 + $model->yard_hasil6 + $model->buang1 + $model->buang2) - $model->yard_awal;
            } elseif ($model->yard_hasil1 < $model->yard_awal) {
                $model->selisih_kurang = $model->yard_awal - ($model->yard_hasil1 + $model->yard_hasil2 + $model->yard_hasil3 + $model->yard_hasil4 + $model->yard_hasil5 + $model->yard_hasil6 + $model->buang1 + $model->buang2);
            } else {
                $model->selisih_lebih = 0;
                $model->selisih_kurang = 0;
            }

            $total_selisih_lebih = $total_selisih_lebih + $model->selisih_lebih;
            $total_selisih_kurang = $total_selisih_kurang + $model->selisih_kurang;
        }

        //echo "<br>".$total_yard_awal;
        //echo "<br>".$total_yard_hasil;
        //echo "<br>".$total_buang;


        //Proses untuk menyimpan hasil ke dalam database
        $model = $this->findModel($id);
        $model->total_yard_awal = $total_yard_awal;
        $model->total_yard_hasil = $total_yard_hasil;
        $model->total_buang = $total_buang;
        $model->save(false); //Sace tanpa validasi

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionViewItem($id_item)
    {
        //Ini Item Proc
        $searchModel = new MaterialInItemProcSearch();
        $searchModel->id_material_in = $id_item;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Menghitung total rekapitulasi per material
        $models = $dataProvider->getModels();
        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        foreach ($models as $model) {
            //echo $model->yard_awal." ";
            $total_yard_awal = $total_yard_awal + $model->yard_awal;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil1;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil2;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil3;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil4;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil5;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil6;
            $total_buang = $total_buang + $model->buang1;
            $total_buang = $total_buang + $model->buang2;
        }
        //echo "<br>".$total_yard_awal;
        //echo "<br>".$total_yard_hasil;
        //echo "<br>".$total_buang;

        //Proses untuk menyimpan hasil ke dalam database
        $model = $this->findModelItem($id_item);
        // $model->total_yard_awal = $total_yard_awal;
        // $model->total_yard_hasil = $total_yard_hasil;
        // $model->total_buang = $total_buang;
        $model->save(false); //Sace tanpa validasi

        return $this->render('/material-in/item/view_add', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id_item,
            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
        ]);
    }

    /**
     * Creates a new MaterialIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialIn();

        //Diberikan default value tanggal hari ini
        $model->tanggal_proses = \common\helpers\Timeanddate::getCurrentDate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_material_in]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MaterialIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_material_in]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateItem($id_item, $id_parent)
    {
        $model = $this->findModelItem($id_item);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id_parent]);
        }

        return $this->render('/material-in/item/create_add_mode3', [
            'model' => $model,
        ]);
    }

    /*
    $ip = id parent ($id_material_in)
    */
    public function actionCreateItem($ip)
    {
        $model = new MaterialInItemProc();
        $model->id_material_in = $ip;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->generateBarcodeNumber();
            return $this->redirect(['view', 'id' => $ip]);
        }

        return $this->render('/material-in/item/create_add', [
            'model' => $model,
        ]);
    }

    public function actionGenerateBarcode($id_item, $id_parent)
    {
        return $this->render('/material-in/barcode/generate-barcode', [
            'id_item' => $id_item,
            'id_parent' => $id_parent
        ]);
    }

    public function actionGenerateBarcodeNew($id_item, $id_parent)
    {
        return $this->render('/material-in/barcode/generate-barcode-new', [
            'id_item' => $id_item,
            'id_parent' => $id_parent
        ]);
    }

    public function actionGenerateBarcodeMaterial($id_item, $id_parent, $label)
    {
        $model = $this->findModelItem($id_item);

        return $this->render('/material-in/barcode/generate-barcode-material', [
            'id_item' => $id_item,
            'id_parent' => $id_parent,
            'model' => $model,
            'label' => $label,
        ]);
    }


    /**
     * Deletes an existing MaterialIn model.
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
     * Finds the MaterialIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialIn::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteItem($id_item, $id_parent)
    {
        $this->findModelItem($id_item)->delete();

        return $this->redirect(['view', 'id' => $id_parent]);
    }

    /**
     * Finds the MaterialInItemProc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialInItemProc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelItem($id)
    {
        if (($model = MaterialInItemProc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
