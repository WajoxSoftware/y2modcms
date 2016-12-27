<?php
namespace wajox\y2modcms;

class Content extends \wajox\yii2base\modules\ModuleAbstract
{
	public $hasSessionController = false;

    protected function initModule()
    {
        parent::initModule();
        $this->layout = 'profile';
    }
}
