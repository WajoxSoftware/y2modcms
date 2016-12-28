<?php
namespace wajox\y2modcms\services\builders;

use wajox\y2modcms\models\form\CatalogForm;

class CatalogBuilder extends ContentNodeBuilderAbstract
{
    protected function createForm()
    {
        $this->setForm($this->createObject(CatalogForm::className()));

        return $this;
    }
}
