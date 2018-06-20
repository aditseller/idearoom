<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/public/css/login.css">
    <?= Html::csrfMetaTags() ?>
    <title>Login</title>
</head>

<body>

  <div class="logmod">
  <div class="logmod__wrapper">
    <span class="logmod__close">Close</span>
    <div class="logmod__container">
      <ul class="logmod__tabs">
        <li data-tabtar="lgm-2"><a href="#">Login</a></li>
        
      </ul>
      <div class="logmod__tab-wrapper">
     
      <div class="logmod__tab lgm-2">
         <div class="logmod__heading">
          <span class="logmod__heading-subtitle">You Don't Have an Account ? <strong><?= Html::a('Sign Up Here',['users/signup']) ?></strong></span>
        </div>
        <div class="logmod__form">

         <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'class' => 'simform'
    ]); ?>

    
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="loginform-username">Email*</label>
                <input type="text" id="loginform-email" class="string optional" name="LoginForm[email]" value="" autofocus="" aria-required="true" aria-invalid="true" height="200">
              </div>
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="loginform-password">Password *</label>
                <input type="password" id="loginform-password" class="string optional" name="LoginForm[password]" value="" aria-required="true" style="width:80%">
                <span class="hide-password" style="width:20%">Show</span>
              </div>
            </div>
            <div class="simform__actions">
            <?= Html::submitButton('Login', ['class' => 'sumbit', 'name' => 'login-button']) ?>  
              <span class="simform__actions-sidetext"><a class="special" role="link" href="#">Forgot your password?<br>Click here</a></span>
            
			
			</div> 
            <?php ActiveForm::end(); ?>


        </div> 
     
          </div>
      </div>
    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

  <script  src="<?= Yii::$app->request->baseUrl ?>/public/js/login.js"></script>




</body>
</html>

