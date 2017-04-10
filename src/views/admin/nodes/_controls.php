<?php
use yii\helpers\Url;
use wajox\y2modcms\models\ContentNode;

$parentNodeId = $parentNode == null ? 0 : $parentNode->id;
$availableTypes = [
        ContentNode::TYPE_ID_CATALOG,
        ContentNode::TYPE_ID_PAGE,
    ];

if ($parentNode != null && $parentNode->type_id == ContentNode::TYPE_ID_PAGE) {
    $availableTypes = [];
}

if ($parentNode != null && $parentNode->type_id == ContentNode::TYPE_ID_CATALOG) {
    $availableTypes = [
            ContentNode::TYPE_ID_CATALOG,
            ContentNode::TYPE_ID_PAGE,
        ];
}

if ($parentNode != null) {
    $this->params['pageControls']['items'][] = [
        'title' => \Yii::t('app/general', 'View'),
        'url' => $parentNode->pageUrl,
        'icon' => 'open_in_browser',
      ];

    $this->params['pageControls']['items'][] = [
        'title' => \Yii::t('app/general', 'Edit'),
        'url' => ['update', 'id' => $parentNode->id],
        'icon' => 'edit',
      ];
}

if (in_array(ContentNode::TYPE_ID_CATALOG, $availableTypes)) {
    $this->params['pageControls']['items'][] = [
        'title' => \Yii::t('app/attributes', 'Content Node Type Catalog'),
        'url' => ['create', 'typeId' => ContentNode::TYPE_ID_CATALOG, 'parentId' => $parentNodeId, 'suffix' => '.js'],
        'icon' => 'create_new_folder',
        'class' => 'js-remote-link',
      ];
}

if (in_array(ContentNode::TYPE_ID_PAGE, $availableTypes)) {
    $this->params['pageControls']['items'][] = [
        'title' => \Yii::t('app/attributes', 'Content Node Type Page'),
        'url' => ['create', 'typeId' => ContentNode::TYPE_ID_PAGE, 'parentId' => $parentNodeId, 'suffix' => '.js'],
        'icon' => 'note_add',
        'class' => 'js-remote-link',
      ];
}
