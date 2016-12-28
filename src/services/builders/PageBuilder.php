<?php
namespace wajox\y2modcms\services\builders;

use wajox\y2modcms\models\form\PageForm;

class PageBuilder extends ContentNodeBuilderAbstract
{
    protected function createForm()
    {
        $this->setForm($this->createObject(PageForm::className()));

        return $this;
    }
}
