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
    <title>Sign Up</title>
</head>

<body>

  <div class="logmod">
  <div class="logmod__wrapper">
    <span class="logmod__close">Close</span>
    <div class="logmod__container">
      <ul class="logmod__tabs">
        <li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>        
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
         <div class="logmod__heading">
          <span class="logmod__heading-subtitle">You Have Account ? <strong><?= Html::a('Login Here',['site/login']) ?></strong></span>
        </div>
        <div class="logmod__form">

        
			<?php $form = ActiveForm::begin(); ?>
          
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Email*</label>
                <input class="string optional" maxlength="255" id="users-email" name="Users[email]" type="email" size="50" />
              </div>
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="signupform-password">Password *</label>
                <input type="password" id="users-email" class="string optional" name="Users[password]" value="" aria-required="true" style="width:80%">
                <span class="hide-password" style="width:20%">Show</span>
              </div>
            </div>
			 <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="full-name">Fullname *</label>
                <input class="string optional" maxlength="255" id="users-fullname" name="Users[fullname]" type="text" size="50" />
              </div>
            </div>
			
			 <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="full-name">Phone *</label>
                <input class="string optional" maxlength="255" id="users-phone" name="Users[phone]" type="text" size="50" />
              </div>
            </div>
			
            <div class="simform__actions">
            <?= Html::submitButton('Sign Up', ['class' => 'sumbit', 'name' => 'signup-button']) ?>            
            <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
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

