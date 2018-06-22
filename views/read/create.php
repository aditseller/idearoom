<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
<script>
function forceLower(strInput) 
{
strInput.value=strInput.value.toLowerCase();
}​
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model app\models\Read */

$this->title = 'Add Post';
$this->params['breadcrumbs'][] = ['label' => 'Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-create">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'ng-model'=>'yourName']) ?>
	<?= $form->field($model, 'channel')->dropDownList(ArrayHelper::map(\app\models\Channel::find()->asArray()->all(), 'channel', 'channel'), ['prompt' => '-- Select Channel --', 'ng-model'=>'channel']) ?>
	
	<?= $form->field($model, 'url')->textInput(['maxlength' => true,'value'=>'{{channel}}-{{yourName}}','onkeyup'=>'return forceLower(this);' , 'readonly'=>true]) ?>
  <hr/>
	
	<?php echo froala\froalaeditor\FroalaEditorWidget::widget([
    'name' => 'content',
    'options'=>[// html attributes
        'id'=>'content'
    ],
    'clientOptions'=>[
        'toolbarInline'=> false,
        'theme' =>'royal',//optional: dark, red, gray, royal
		'height' => 370,
        'language'=>'en_us' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
    ]
]);; ?>
<hr/>
     

       <?= //work with ActiveForm
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
]); ?>

 

  

    <?= $form->field($model, 'poster')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true,'placeholder'=>'(Optional) Ignore if empty']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
