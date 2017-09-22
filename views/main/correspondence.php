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
<?= $form->field($model, 'name', [
    'template' => '<div class="row"><div class="col-md-3">{label}</div><div class="col-md-9"> {input}{error}{hint}</div></div>'
])->textInput(); ?>
<?= $form->field($model, 'email', [
    'template' => '<div class="row"><div class="col-md-3">{label}</div><div class="col-md-9"> {input}{error}{hint}</div></div>'
])->textInput(); ?>
<?= $form->field($model, 'phone', [
    'template' => '<div class="row"><div class="col-md-3">{label}</div><div class="col-md-9"> {input}{error}{hint}</div></div>'
])->textInput(); ?>

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