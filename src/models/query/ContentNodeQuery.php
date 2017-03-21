<?php
namespace wajox\y2modcms\models\query;

use wajox\yii2base\components\db\ActiveQuery;

class ContentNodeQuery extends ActiveQuery
{
    public function byUrl($id)
    {
        return $this->where([
            'url' => htmlspecialchars($url),
        ]);
    }

    public function byParentId($parentId)
    {
        return $this->where([
            'parent_node_id' => intval($parentId),
        ]);
    }
}
