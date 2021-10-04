<?php

namespace frontend\controllers;

use common\models\LoginForm;
use backend\models\ContactUs;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

use backend\models\WebPage;

use common\utils\EncryptionDB;
use common\helpers\Timeanddate;
use common\helpers\IPAddressFunction;

use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex($lang="none")
    {
		$session = Yii::$app->session;
		$session->set('lang', $lang);
		
		$lang = $session->get('lang');
		switch($lang){
			case "none": 
				if($session->get('lang_id') == null){
					$session->set('lang_id', 1); 
				}
				break;
			case "en": $session->set('lang_id', 1); break;
			case "id": $session->set('lang_id', 2); break;
		}


        return $this->render('index', [

        ]);
		
        //return $this->render('index.html');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactUs();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionDownloadProductInfo($p)
    {
        $model = new RequestProductInfo();
		
		$id_product = EncryptionDB::encryptor('decrypt',$p);
		$product = $this->findProduct($id_product);
		$model->id_product = $product->id_product;
		$model->request_date = Timeanddate::getCurrentDate();
		$model->request_time = Timeanddate::getCurrentDateTime();
		$model->registered_ip_address = IPAddressFunction::getUserIPAddress();
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$u = EncryptionDB::encryptor('encrypt',$model->id_request_product_info);
            return $this->redirect(['download-product', 'p' => $p, 'u'=>$u]);
        }

        return $this->render('product/download_file_create', [
			'product' =>$product,
            'model' => $model,
        ]);
    } 
	
	public function actionDownloadProductFile($p){
        $id_product = EncryptionDB::encryptor('decrypt',$p);
		$product = $this->findProduct($id_product);
		
		if($product->manual_filename != ""){
			//Gunakan File dari yang sudah diupdate
			$path = Yii::getAlias('@webroot/').'uploads/template/'.$product->manual_filename;
			if (file_exists($path)) {
				return Yii::$app->response->sendFile($path);
			}else {
				throw new NotFoundHttpException("can't find {$product->manual_filename} file");
			}
		}else{
			//Gunakan file-file PDF dari yang default
			$path = Yii::getAlias('@webroot/').'file/products/product_'.$product->id_product.".pdf";
			if (file_exists($path)) {
				return Yii::$app->response->sendFile($path);
			}else {
				throw new NotFoundHttpException("can't find product_".$product->id_product.".pdf file");
			}
		}
    }
	
	public function actionSustainabilityReportDownload($n){
        $id = EncryptionDB::encryptor('decrypt',$n);
		$sr = $this->findSustainabilityReport($id);
		
		if($sr->manual_filename != ""){
			//Gunakan File dari yang sudah diupdate
			$path = Yii::getAlias('@webroot/').'file/sustainability_report/'.$sr->manual_filename;
			if (file_exists($path)) {
				return Yii::$app->response->sendFile($path);
			}else {
				throw new NotFoundHttpException("can't find {$sr->manual_filename} file");
			}
		}else{
			echo "Sustainability Report does not exist. Please contact us for further use!";
		}
    }
	
	protected function findProduct($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Product does not exist. Please repeat your request');
    }
	
	protected function findSustainabilityReport($id)
    {
        if (($model = SustainabilityReport::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Sustainability Report does not exist. Please repeat your request');
    }
	
	public function actionDownloadProduct($p, $u)
    {
        $model = new RequestProductInfo();
		
		$id_request_product_info = EncryptionDB::encryptor('decrypt',$u);
		$model = $this->findRequestProductInfo($id_request_product_info);
		
		$id_product = EncryptionDB::encryptor('decrypt',$p);
		$product = $this->findProduct($id_product);
		
        return $this->render('product/download_product', [
			'product' =>$product,
            'model' => $model,
			'p'=>$p
        ]);
    }
	
	protected function findRequestProductInfo($id)
    {
        if (($model = RequestProductInfo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Request Product Info ID does not exist. Please repeat your request');
    }
	
	public function actionNewsDetail($n,$t="")
    {		
		$id_news = EncryptionDB::encryptor('decrypt',$n);
		$news = $this->findNews($id_news);

		//mode 1 : news_detail
		//mode 3 : news-detail-mode3
        return $this->render('news/news-detail-mode3', [
			'news' =>$news,
            
        ]);
    } 
	
	protected function findNews($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('News does not exist. Please repeat your request');
    }

    public function actionApplication()
    {
        return $this->render('application');
    }
	
    public function actionImplementation()
    {
		$searchModelSusReport = new SustainabilityReportSearch();
        $dataProviderSusReport = $searchModelSusReport->search(Yii::$app->request->queryParams);

		/*
		//Mode Klasik - Ke bawah
		return $this->render('implementation', [
            'searchModelSusReport' => $searchModelSusReport,
            'dataProviderSusReport' => $dataProviderSusReport,
        ]);
		*/
		
		//Mode Tampilan dengan Tab
        return $this->render('implementation/implementation_mode_tab', [
            'searchModelSusReport' => $searchModelSusReport,
            'dataProviderSusReport' => $dataProviderSusReport,
        ]);
        //return $this->render('implementation');
    }
	
	public function actionImplementationDetail($c)
    {
		$id_news = EncryptionDB::encryptor('decrypt',$c);
		$news = $this->findSustainabilityNews($id_news);

        return $this->render('implementation/implementation-detail', [
			'news' =>$news,
            
        ]);
    }
	
	protected function findSustainabilityNews($id)
    {
        if (($model = SustainabilityImplNews::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Sustainability News does not exist. Please repeat your request');
    }


    public function actionCompany_logo()
    {
        return $this->render('company_logo');
    }

    public function actionCompany_profile()
    {
        return $this->render('company_profile');
    }

    public function actionLocation()
    {
        return $this->render('location');
    }

    public function actionVision()
    {
        return $this->render('vision');
    }

    public function actionGroup_policy()
    {
        return $this->render('group_policy');
    }

    public function actionCommitment()
    {
        return $this->render('commitment');
    }
	
	public function actionGroupCommitment()
    {
        return $this->render('group-commitment');
    }

    public function actionCertificate()
    {
        return $this->render('certificate');
    }

    public function actionProduct()
    {
        return $this->render('product');
    }

    public function actionSustainability()
    {
        return $this->render('sustainability');
    }

    public function actionGrievance()
    {
        return $this->render('grievance');
    }

    public function actionTraceability()
    {
        return $this->render('traceability');
    }

    public function actionSupplier()
    {
        return $this->render('supplier');
    }

    public function actionAbout()
    {
        return $this->goHome();

    }
	
	/*
	Untuk display page khusus yang bisa dicustom menurut selera user
	*/
	public function actionPage($p){
		$page = $this->findWebPage($p);
		
        return $this->render('web-page', [
			'page' =>$page,
        ]);
    }
	
	protected function findWebPage($p)
    {
        if (($model = WebPage::find()->where(['title'=>$p])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Web page does not exist. Please repeat your request');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
