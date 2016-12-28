<?php
namespace wajox\y2modcms\controllers;

use wajox\y2modcms\models\ContentNode;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class DefaultController extends \wajox\yii2base\controllers\Controller
{
    public function actionView($url)
    {
        $model = $this->findModel($url);

        $dataProvider = $this->createObject(ActiveDataProvider::className(), [
            ['query' => $model->getContentNodes()],
        ]);

        if ($model->layout == ContentNode::LAYOUT_EMPTY) {
            $this->layout = false;
        } else {
            $this->layout = $model->layout;
        }

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($url)
    {
        $conditions = ['url' => $url];

        $model = $this
            ->getRepository()
            ->find(ContentNode::className())
            ->byUrl($url)
            ->one();

        if ($model !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
