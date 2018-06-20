<!-- Javascript For Clear Cache Profile Picture Showing -->
<script>
  document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
</script>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Account Setting';

$urlimg = Yii::$app->params['rootUrl']."public/uploads/profile/".sha1(Yii::$app->user->identity->id).'.jpg';
$header_response_urlimg = get_headers($urlimg, 1);

$modelRoles = app\models\Roles::find()->where(['id_role' => Yii::$app->user->identity->role])->one();
?>


<div class="col-md-4"></div>
<div class="col-md-4">
<div class="panel panel-warning">
      <div class="panel-heading"><?= $this->title ?></div>
      <div class="panel-body">
	  <?php if (Yii::$app->session->hasFlash('savedata')): ?>


  <div class="alert alert-success">
        <b><span class="glyphicon glyphicon-ok"></span> Saved</b>
    </div>
<?php endif; ?>
	<center>
	<?php if(strpos($header_response_urlimg[0],"404") !== false) { ?>
        <!-- No Picture -->
        <a href="<?= Yii::$app->homeUrl ?>users/changeprofilepicture"><img width="25%" class="img-circle" src="<?= Yii::$app->homeUrl ?>/public/img/nopic.png"></a>

        <?php } else { ?>

        <!-- Picture Profile Available -->
        <a href="<?= Yii::$app->homeUrl ?>users/changeprofilepicture"><img width="25%" class="img-circle" src="<?= Yii::$app->homeUrl ?>/public/uploads/profile/<?= sha1(Yii::$app->user->identity->id) ?>.jpg"></a>

        <?php } ?>
		
		<h4><?= $modelRoles->role; ?></h4>
		</center>
		
	  <hr/>
	  <div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-warning btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
	  
	  
	  </div>
    </div>
    </div>
<div class="col-md-4"></div>
