<?php

use hrupin\message\MessageAsset;

/* @var $this yii\web\View */
/* @var $model hrupin\message\models\Message */
/* @var $title string */

MessageAsset::register($this);

?>

<div class="bs-example" data-example-id="simple-table">
    <table class="table-responsive" data-row-style="rowStyle" data-toggle="table" data-click-to-select="true">
        <caption><?= $title; ?></caption>
        <thead>
            <tr>
                <th data-field="dd" data-checkbox="true"></th>
                <th data-sortable="true"><?= Yii::t('message', 'Id message'); ?></th>
                <th data-sortable="true"><?= Yii::t('message', 'Date message'); ?></th>
                <th data-sortable="true"><?= Yii::t('message', 'Name'); ?></th>
                <th data-sortable="true"><?= Yii::t('message', 'Theme'); ?></th>
                <th><?= Yii::t('message', 'Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($model as $item){
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>