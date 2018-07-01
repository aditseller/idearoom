<?php

namespace app\controllers;

use Yii;
use app\models\Read;
use app\models\ReadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\helpers\Json;
/**
 * ReadController implements the CRUD actions for Read model.
 */
class ReadController extends Controller
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
     * Lists all Read models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Read model.
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
     * Creates a new Read model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Read();
        

        if ($model->load(Yii::$app->request->post())) {

            $model->poster = 'public/uploads/read/'.sha1($model->title).'.jpg';

        if($model->save()) {

            $linkPoster = 'public/uploads/read/';
            $renamePoster = rename($linkPoster.'postby'.sha1(Yii::$app->user->identity->id). '.jpg', $linkPoster.sha1($model->title).'.jpg'); 

             //Create Thumbnail Image and Resize
            Image::thumbnail($linkPoster.sha1($model->title).'.jpg',700,393)->save($linkPoster.sha1($model->title).'.jpg');
            
            return $this->redirect(['index']);
        }
             

            return $this->redirect(['view', 'id' => $model->id_read]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


     //Poster Upload
    public function actionUpload() {
    $model = new Read();

    $imageFile = UploadedFile::getInstance($model, 'poster');

    $directory = 'public/uploads/read/';
    if (!is_dir($directory)) {
        FileHelper::createDirectory($directory);
    }

    if ($imageFile) {
        $uid = uniqid(time(), true);
        $fileName = 'postby'.sha1(Yii::$app->user->identity->id). '.jpg';
        $filePath = $directory . $fileName;
        if ($imageFile->saveAs($filePath)) {
            $path = $filePath;
            return Json::encode([
                'files' => [
                    [
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        'url' => Yii::$app->request->baseUrl.'/public/uploads/read/'.$fileName,
                        'thumbnailUrl' => Yii::$app->request->baseUrl.'/public/uploads/read/'.$fileName,
                        'deleteUrl' => 'image-delete?name=' . $fileName,
                        'deleteType' => 'POST',
                    ],
                ],
            ]);
        }
    }

    return '';
}

    /**
     * Updates an existing Read model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_read]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Read model.
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
     * Finds the Read model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Read the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Read::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
