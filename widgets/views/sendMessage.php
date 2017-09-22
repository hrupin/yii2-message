<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model hrupin\message\models\Message */
/* @var $form ActiveForm */
?>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                'class' => 'form-horizontal',
                                'data-pjax' => true
                            ],
                            'fieldConfig' => [
                                'template' => '<div class="col-md-3">{label}</div><div class="col-md-9">{input}</div><div class="col-md-9 col-md-offset-3">{error}</div>',
                                'labelOptions' => ['class' => ''],
                            ],
                        ]); ?>
                            <?= $form->field($model, 'theme')->textInput(['options' => ['class' =>  'form-inline']]); ?>
                            <?= $form->field($model, 'text')->textarea(); ?>
                            <?= $form->field($model, 'name'); ?>
                            <?= $form->field($model, 'email'); ?>
                            <?= $form->field($model, 'phone'); ?>
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('message', 'Submit'), ['class' => 'btn btn-primary pull-right']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>