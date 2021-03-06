<?php

namespace app\controllers;

use app\models\Category;
use app\models\ImageUpload;
use Yii;
use app\models\Advert;
use app\models\AdvertSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CabinetController implements the CRUD actions for Advert model.
 */
class CabinetController extends Controller
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
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advert model.
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
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,

            ]);
        }
    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {


        $model = $this->findModel($id);

        if (!Yii::$app->user->can('updateOwnAdvert', ['post'=>$model]) && (!Yii::$app->user->can('updateAdvert', ['post'=>$model])))

        {
            throw new ForbiddenHttpException("Ошибка доступа", 1);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (!Yii::$app->user->can('updateOwnAdvert', ['post'=>$model]) && (!Yii::$app->user->can('updateAdvert', ['post'=>$model])))

        {
            throw new ForbiddenHttpException("Ошибка доступа", 1);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionSetCategory($id)
    {
       $advert = $this->findModel($id);

       var_dump($advert->category);
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost)
        {
            $advert = $this->findModel($id);

            $file = UploadedFile::getInstance($model, 'image');

            if($advert->saveImage($model->uploadFile($file, $advert->image)))
            {
                return $this->redirect(['view','id'=>$advert->id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }
}
