<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use app\models\User;
use app\components\AccessRule;
/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
			
			'access' => [
                'class' => AccessControl::className(),
				'ruleConfig' => [
                       'class' => AccessRule::className(),
					   
                   ],
                'only' => ['index','changeprofilepicture','signup'],
                'rules' => [
                    [
                        'actions' => ['index','changeprofilepicture'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					[
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        $model->password = pack("H*",$model->password);
		$model->active = '1';
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
				
			Yii::$app->session->setFlash('savedata');
            return $this->refresh();
        
      } else {
        return $this->render('index', [
            'model' => $model,
        ]);
      }
    }
	
	 //Profile Change Profile Picture
    public function actionChangeprofilepicture() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        
        if ($model->load(Yii::$app->request->post())) {

          $model->image = UploadedFile::getInstance($model,'image');
          $model->image->saveAs('public/uploads/profile/'.sha1(Yii::$app->user->identity->id).'.jpg');


              //Create Thumbnail Image and Resize
       Image::thumbnail('public/uploads/profile/'.sha1(Yii::$app->user->identity->id).'.jpg',100,100)->save('public/uploads/profile/'.sha1(Yii::$app->user->identity->id).'.jpg');
            
           
        return $this->redirect(['index']);
      } else {
        return $this->render('changeprofilepicture', [
            'model' => $model,
        ]);
      }

    }

   

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSignup()
    {
		$this->layout = 'blank';
        $model = new Users();
		$model->joindate = date('Y-m-d H:i:s');
		$model->role = '3';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
