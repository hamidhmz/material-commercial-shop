<?php
namespace backend\controllers;
use Yii;
use common\models\Products;
use common\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Types;
use common\models\Categories;
use yii\web\UploadedFile;
use common\models\Gallery;

class ProductsController extends Controller {
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
        $searchModel = new ProductsSearch();
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
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image = UploadedFile::getInstanceByName('image');
            if ($image) {
                $fileName = uniqid(time(), true) . '.' . $image->extension;
                if ($image->saveAs("../uploads/$fileName")) {
                    $gallery = new Gallery();
                    $gallery->product_id = $model->id;
                    $gallery->address = $fileName;
                    $gallery->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $types = Types::find()->orderBy(['name' => SORT_ASC])->all();
        $categories = Categories::find()->orderBy(['name' => SORT_ASC])->all();
        return $this->render('create', [
            'model' => $model,
            'types' => $types,
            'categories' => $categories
                ]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image = UploadedFile::getInstanceByName('image');
            if ($image) {
                $fileName = uniqid(time(), true) . '.' . $image->extension;
                if ($image->saveAs("../uploads/$fileName")) {
                    $gallery = new Gallery();
                    $gallery->product_id = $model->id;
                    $gallery->address = $fileName;
                    $gallery->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $types = Types::find()->orderBy(['name' => SORT_ASC])->all();
        $categories = Categories::find()->orderBy(['name' => SORT_ASC])->all();
        return $this->render('update', ['model' => $model, 'types' => $types, 'categories' => $categories]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id) {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}