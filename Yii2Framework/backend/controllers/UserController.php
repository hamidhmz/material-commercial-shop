<?php
namespace backend\controllers;
use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class UserController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate() {
        $model = new User();
        $model->scenario = 'create';
        
        if ($model->load(Yii::$app->request->post())) {

            $model->status = 1;
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->created_at = time();
            $model->updated_at = time();
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            $model->password_hash = null;
        }

        return $this->render('create', ['model' => $model]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $lastPass = $model->password_hash;

        if ($model->load(Yii::$app->request->post())) {

            if ($model->password_hash) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            }
            else {
                $model->password_hash = $lastPass;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        $model->password_hash = null;
        return $this->render('update', ['model' => $model]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}