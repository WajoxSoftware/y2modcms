<?php
namespace wajox\y2modcms\modules\content;

class Content extends \wajox\yii2base\modules\ModuleAbstract
{
	public $hasSessionController = false;

    protected function initModule()
    {
        $this->controllerNamespace = 'wajox\y2modcms\\'.$this->id.'\controllers';
        $this->layout = 'profile';
        $this->getApp()->user->loginUrl = ['/'.$this->id.'/session'];
    }
}
