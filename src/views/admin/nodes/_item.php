<?php
use yii\helpers\Url;

?>
<li class="collection-item avatar">
    <img class="circle" src="<?= $model->previewImageThumbUrl ?>"/>
    <span class="title">
      <a href="<?= Url::toRoute(['index', 'id' => $model->id]) ?>">
        <?= $model->title ?>
      </a>
    </span>

    <p><?= $model->type ?></p>
    <p><?= $model->createdDateTime ?></p>

    <span class="secondary-content">
      <a  href="<?= Url::toRoute(['index', 'id' => $model->id]) ?>"><i class="material-icons">open_in_browser</i></a> |
      <a  href="<?= Url::toRoute(['update', 'id' => $model->id]) ?>"><i class="material-icons">edit</i></a>
    </span>
</li>
