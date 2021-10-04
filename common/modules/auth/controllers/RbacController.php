<?php

namespace common\modules\auth\controllers;

use common\modules\auth\models\AuthItem;
use common\modules\auth\rbac\AuthorRule;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    // user assigment
    public function actionAssigment()
    {

        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');

        $auth->assign($author, 1);
        $auth->assign($admin, 2);
    }

    // Create rule
    public function actionCreate_rule()
    {
        $auth = Yii::$app->authManager;

        // add the rule
        $rule = new AuthorRule();
        $auth->add($rule);

        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

        $updatePost = $auth->createPermission('auth/post/update');
        // "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnPost, $updatePost);

        $author = $auth->createPermission('author');
        // allow "author" to update their own posts
        $auth->addChild($author, $updateOwnPost);
    }

    // Create Role
    public function actionCreate_role()
    {
        $auth = Yii::$app->authManager;
        //Author -> index/create/view
        //Admin -> (Author) and update/delete - > index/create/view/update/delete

        // add "index" permission
        $index = $auth->createPermission('auth/post/index');
        $create = $auth->createPermission('auth/post/create');
        $view = $auth->createPermission('auth/post/view');

        $update = $auth->createPermission('auth/post/update');
        $delete = $auth->createPermission('auth/post/delete');


        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $index);
        $auth->addChild($author, $create);
        $auth->addChild($author, $view);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $delete);
    }

    // Create permission
    public function actionCreate_permission()
    {
        $auth = Yii::$app->authManager;

        // add "index" permission
        $index = $auth->createPermission('auth/post/index');
        $index->description = 'Create a index';
        $auth->add($index);

        // add "createPost" permission
        $create = $auth->createPermission('auth/post/create');
        $create->description = 'Create post';
        $auth->add($create);

        // add "viewPost" permission
        $view = $auth->createPermission('auth/post/view');
        $view->description = 'Views post';
        $auth->add($view);

        // add "updatePost" permission
        $update = $auth->createPermission('auth/post/update');
        $update->description = 'Update post';
        $auth->add($update);

        // add "deleteePost" permission
        $delete = $auth->createPermission('auth/post/delete');
        $delete->description = 'Delete post';
        $auth->add($delete);
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
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
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
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
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
