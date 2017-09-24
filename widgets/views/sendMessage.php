<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model hrupin\message\models\Message */
/* @var $form ActiveForm */

?>
<a href="#" data-toggle="modal" data-target="#formSendMessage">
    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?= Yii::t('message', 'Write and send message'); ?>
</a>
<div class="modal fade" id="formSendMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="clearfix"></div>
                <div class="site-index">
                    <?php Pjax::begin(['enablePushState' => false]); ?>
                        <?php $form = ActiveForm::begin([
                            'action' => Url::toRoute('/message/main/send'),
                            'options' => [
                                'data-pjax' => true
                            ],
                        ]); ?>
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
                            <?= $form->field($model, 'theme', [
                                    'template' => '<div class="row"><div class="col-md-3">{label}</div><div class="col-md-9"> {input}{error}{hint}</div></div>'
                            ])->textInput(['options' => ['class' =>  'form-inline']]); ?>
                            <?= $form->field($model, 'text', [
                                'template' => '<div class="row"><div class="col-md-3">{label}</div><div class="col-md-9"> {input}{error}{hint}</div></div>'
                            ])->textarea(); ?>
                            <?= $form->field($model, 'sender')->hiddenInput()->label(false); ?>
                            <?= $form->field($model, 'recipient')->hiddenInput()->label(false); ?>
                            <?= $form->field($model, 'parent_id')->hiddenInput()->label(false); ?>
                            <?= $form->field($model, 'children')->hiddenInput()->label(false); ?>
                            <?= $form->field($model, 'status_sender')->hiddenInput()->label(false); ?>
                            <?= $form->field($model, 'status_recipient')->hiddenInput()->label(false); ?>
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('message', 'Submit'), ['class' => 'btn btn-primary pull-right']) ?>
                            </div>
                            <div class="clearfix"></div>
                        <?php ActiveForm::end(); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>