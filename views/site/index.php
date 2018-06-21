<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">

     <div class="col-md-2">
      <div class="thumbnail">
      <img src="<?= Yii::$app->request->baseUrl ?>/public/img/posts.png"  style="width:100%">
      <br/>
      <?= Html::a('Posts',['/read'],['class'=>'btn btn-lg btn-block btn-info'])  ?>
      </div>
    </div>

  <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1){ ?>
 <div class="col-md-2">
      <div class="thumbnail">
      <img src="<?= Yii::$app->request->baseUrl ?>/public/img/channel.png" style="width:100%">
      <br/>
      <?= Html::a('Channels',['/channel'],['class'=>'btn btn-lg btn-block btn-primary'])  ?>
      </div>
    </div>
	<?php } ?>
  
      <div class="col-md-2">
      <div class="thumbnail">
      <img src="<?= Yii::$app->request->baseUrl ?>/public/img/image.png" style="width:100%">
      <br/>
      <?= Html::a('Images',['#'],['class'=>'btn btn-lg btn-block btn-danger'])  ?>
      </div>
    </div>

      <div class="col-md-2">
      <div class="thumbnail">
      <img src="<?= Yii::$app->request->baseUrl ?>/public/img/video.png" style="width:100%">
      <br/>
      <?= Html::a('Videos',['#'],['class'=>'btn btn-lg btn-block btn-danger'])  ?>
      </div>
    </div>

      <div class="col-md-2">
      <div class="thumbnail">
      <img src="<?= Yii::$app->request->baseUrl ?>/public/img/account.png" style="width:100%">
      <br/>
      <?= Html::a('Account Setting',['/users'],['class'=>'btn btn-lg btn-block btn-warning'])  ?>
      </div>
    </div>

     <div class="col-md-2">
      <div class="thumbnail">
      <img src="<?= Yii::$app->request->baseUrl ?>/public/img/inbox.png" style="width:100%">
      <br/>
      <?= Html::a('Inbox',['#'],['class'=>'btn btn-lg btn-block btn-warning'])  ?>
      </div>
    </div>
           
        </div>

    </div>
</div>