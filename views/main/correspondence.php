<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use hrupin\message\MessageAsset;

/* @var $this yii\web\View */
/* @var $model hrupin\message\models\Message */
/* @var $message hrupin\message\models\Message */

MessageAsset::register($this);

function generateMeHtml($obj){
    $html = '';
    $html .= '<li class="right clearfix">';
    $html .= '<span class="chat-img pull-right">';
    $html .= '<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="'.$obj->name.'" class="img-circle" />';
    $html .= '</span>';
    $html .= '<div class="chat-body clearfix">'.
        '<div class="header">'.
        '<strong class="primary-font">'.$obj->name.'</strong>'.
        '<small class="pull-right text-muted">'.
        '<span class="glyphicon glyphicon-time"></span><time class="timeago" datetime="'.$obj->date.'">'.$obj->date.'</time></small>'.
        '</div>'.
        '<p></p>'.
        '</div>';
    $html .= '</li>';
    return $html;
}
function generateMyHtml($obj){
    $html = '';
    $html .= '<li class="left clearfix">';
    $html .= '<span class="chat-img pull-left">';
    $html .= '<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="'.$obj->name.'" class="img-circle" />';
    $html .= '</span>';
    $html .= '<div class="chat-body clearfix">'.
             '<div class="header">'.
             '<strong class="primary-font">'.$obj->name.'</strong>'.
             '<small class="pull-right text-muted">'.
             '<span class="glyphicon glyphicon-time"></span><time class="timeago" datetime="'.$obj->date.'">'.$obj->date.'</time></small>'.
             '</div>'.
             '<p>'.$obj->text.'</p>'.
             '</div>';
    $html .= '</li>';
    return $html;
}

?>
<h1><?= $message->theme; ?></h1>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'text', [
    'template' => '<div class="row"><div class="col-md-3">{label}</div><div class="col-md-9"> {input}{error}{hint}</div></div>'
])->textarea(); ?>
<?php
if(!$model->name){
    echo $form->field($model, 'name')->textInput(['placeholder' => Yii::t('message', 'Username')])->label(false);
}
else{
    echo $form->field($model, 'name')->hiddenInput()->label(false);
    echo '<a href="javascript:void(0);" class="onInput" data-input="message-name">'.$model->name.'</a>';
}
if(!$model->email){
    echo $form->field($model, 'email')->textInput(['placeholder' => Yii::t('message', 'email')])->label(false);
}
else{
    echo $form->field($model, 'email')->hiddenInput()->label(false);
    echo '<a href="javascript:void(0);" class="onInput" data-input="message-email">'.$model->email.'</a>';
}
if(!$model->phone){
    echo $form->field($model, 'phone')->textInput(['placeholder' => Yii::t('message', 'Phone')])->label(false);
}
else{
    echo $form->field($model, 'phone')->hiddenInput()->label(false);
    echo '<a href="javascript:void(0);" class="onInput" data-input="message-phone">'.$model->phone.'</a>';
}
?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('message', 'Submit'), ['class' => 'btn btn-primary pull-right']) ?>
</div>
<div class="clearfix"></div>
<?php ActiveForm::end(); ?>

<div class="clearfix"></div>
<hr>
<ul class="chat">
    <?= generateMeHtml($message); ?>
    <?php
        foreach ($message->childrenList as $item){
            echo ($item->sender == Yii::$app->user->id)? generateMeHtml($item): generateMyHtml($item);
        }
    ?>
</ul>