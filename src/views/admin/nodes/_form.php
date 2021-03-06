<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wajox\y2modcms\models\ContentNode;
use wajox\yii2base\helpers\FormHelper;

$formViewsMap = [
    $modelNode::TYPE_ID_CATALOG => 'fields/_catalog',
    $modelNode::TYPE_ID_PAGE => 'fields/_page',
];

$formFieldsView = $formViewsMap[$model->typeId];
?>

<div class="content-node-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col m12">
        <?= FormHelper::renderUrlPartField($form, $model, 'url', [$modelNode::VIEW_ROUTE, 'url' => '...']) ?>
      </div>
    </div>


    <div class="row">
        <div class="col m12">
            <?= $form->field($model, 'layout')->dropDownList(
                ContentNode::getLayoutsList(),
                ['prompt' => \Yii::t('app/general', 'Select')]
            ); ?>
        </div>
    </div>

    <div class="row">
        <div class="col m12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
      <div class="colm m12">
        <?= $form->field($model, 'tags')->textInput(['maxlength' => true, 'class' => 'tagsinput', 'data-role' => 'tagsinput']) ?>
      </div>
    </div>

    <?= $this->render($formFieldsView, ['model' => $model, 'form' => $form]); ?>

    <div class="form-group text-right">

        <?= Html::a(\Yii::t('app/general', 'Delete'), ['delete', 'id' => $modelNode->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => \Yii::t('app/general', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

          <?= Html::submitButton(\Yii::t('app/general', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
