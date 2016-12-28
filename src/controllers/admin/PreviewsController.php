<?php
namespace wajox\y2modcms\controllers\admin;

use wajox\y2modcms\models\ContentNode;
use wajox\yii2base\models\UploadedImage;
use wajox\y2modcms\services\ContentNodesManager;
use wajox\yii2base\modules\admin\controllers\ApplicationController;
use yii\web\NotFoundHttpException;

class PreviewsController extends ApplicationController
{
    public function actionCreate($nodeId)
    {
        $request = $this->getApp()->request;
        $modelNode = $this->findNodeModel($nodeId);
        $modelFile = $this->createObject(UploadedImage::className());
        $success = false;

        if ($request->isPost) {
            $modelFile = $this->getManager()
                ->setNode($modelNode)
                ->savePreview($request);

            $success = !$modelFile->isNewRecord;
        }

        return $this->renderJs('create', [
                'model' => $modelNode,
                'model' => 'model',
                'success' => $success,
            ]);
    }

    public function actionDelete($nodeId)
    {
        $modelNode = $this->findNodeModel($nodeId);

        $this->getManager()->setNode($modelNode)->deletePreview();

        return $this->renderJs('delete');
    }

    public function getManager()
    {
        return  $this->createObject(
            ContentNodesManager::className(),
            [$this->getUser()]
        );
    }

    protected function findNodeModel($id)
    {
        return $this->findModelById(ContentNode::className(), $id);
    }
}
