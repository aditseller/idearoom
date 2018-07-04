<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;

use dosamigos\fileupload\FileUploadUI;
/* @var $this yii\web\View */
/* @var $model app\models\Read */

$this->title = 'Update Read: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_read]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="read-update">

     <?php $form = ActiveForm::begin(); ?>




    <div class="col-md-12"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
	 <div class="col-md-4"><?= $form->field($model, 'channel')->dropDownList(ArrayHelper::map(\app\models\Channel::find()->asArray()->all(), 'channel', 'channel'), ['prompt' => '-- Select Channel --']) ?></div>
     <div class="col-md-4"><?= $form->field($model, 'source')->textInput(['maxlength' => true,'placeholder'=>'(Optional) Ignore if empty']) ?></div>
	
	 <div class="col-md-4"> <?= //work with ActiveForm
$form->field($model, 'tag')->widget(\xj\tagit\Tagit::className(), [
    'clientOptions' => [
        'tagSource' => Url::to(['tag/get-autocomplete']),
        'autocomplete' => [
            'delay' => 200,
            'minLength' => 1,
        ],
        'singleField' => true,
        'beforeTagAdded' => new JsExpression(<<<EOF
function(event, ui){
    if (!ui.duringInitialization) {
        console.log(event);
        console.log(ui);
    }
}
EOF
),
    ],
]); ?></div>
  
	
	 <div class="col-md-12"><?php echo froala\froalaeditor\FroalaEditorWidget::widget([
    'name' => 'content',
    'model' => $model,
    'attribute' => 'content',
    'options'=>[// html attributes
        'id'=>'content'
    ],
    'clientOptions'=>[
        'toolbarInline'=> false,
        'theme' =>'gray',//optional: dark, red, gray, royal
		'height' => 300,
        'language'=>'en_us' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
    ]
]); ?></div>
 
     

      

 

<div class="col-md-12"> 
    <hr/>

    

    <div class="form-group">
        <?= Html::submitButton('Publish', ['class' => 'btn btn-lg btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>
</div>
