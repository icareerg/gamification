<?php

namespace backend\controllers;

use common\models\Player;
use common\models\RewardsPenalties;
use common\models\RuleConduct;
use common\models\RuleConductSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RuleconductController implements the CRUD actions for RuleConduct model.
 */
class RuleconductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RuleConduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuleConductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RuleConduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RuleConduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RuleConduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rule_id]);
        } else {
            $player = new Player();
            $rewards_penalties = new RewardsPenalties();
            return $this->render('create', [
                'model' => $model,
                'player' => $player,
                'rewards_penalties' => $rewards_penalties,
            ]);
        }
    }

    /**
     * Updates an existing RuleConduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rule_id]);
        } else {
            $player = new Player();
            $rewards_penalties = new RewardsPenalties();
            return $this->render('update', [
                'model' => $model,
                'player' => $player,
                'rewards_penalties' => $rewards_penalties,
            ]);
        }
    }

    /**
     * Deletes an existing RuleConduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RuleConduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RuleConduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RuleConduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
