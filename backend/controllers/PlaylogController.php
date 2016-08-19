<?php

namespace backend\controllers;

use common\models\Player;
use common\models\PlayLog;
use common\models\PlaylogSearch;
use common\models\Duration;
use common\models\RuleConduct;
use common\models\RuleDuration;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PlaylogController implements the CRUD actions for PlayLog model.
 */
class PlaylogController extends Controller
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
     * Lists all PlayLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlaylogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlayLog model.
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
     * Creates a new PlayLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PlayLog();
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($data = Yii::$app->request->post()) {
            //获取提交的数据
            $player_id = $data['PlayLog']['player_id'];
            $conduct_id = $data['PlayLog']['conduct_id'];
            $duration_id = $data['PlayLog']['duration_id'];
            //预构造
            $model->load(Yii::$app->request->post());
            //获取级别
            $player = Player::findOne($player_id);
            $level_id = $player->level->level_id;
            //获取级别对应的经验值和积分
            $play_rule_conduct = new RuleConduct();
            $experience = $play_rule_conduct->getConductrule($level_id,$conduct_id)->experience;
            $integral = $play_rule_conduct->getConductrule($level_id,$conduct_id)->integral;
            //获取时长对应的积分百分比
            $play_rule_duration = new RuleDuration();
            $percentage = $play_rule_duration->getDurationrule($conduct_id,$duration_id)->percentage;
            //构造写Playerlog表的数据
            $model->experience = $experience;
            $model->integral = $integral * $percentage;
            $model->player_id = $player_id;
            $model->conduct_id = $conduct_id;
            $model->duration_id = $duration_id;
            //构造写Player表数据
            $player = Player::findOne($player_id);
            $player->experience = $player->experience + $experience;
            $player->integral = $player->integral + $model->integral;
            if ($player->save() && $model->save())
            {
                //重定向到查看数据页
                return $this->redirect(['view', 'id' => $model->play_id]);
            }
//          return $this->redirect(['/debug']);     //调试用
        } else {
            $player = new Player();
            $duration = new Duration();
            return $this->render('create', [
                'model' => $model,
                'player' => $player,
                'duration' => $duration,
            ]);
        }
    }

    /**
     * Updates an existing PlayLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->play_id]);
        } else {
            $player = new Player();
            $duration = new Duration();
            $model->happen_time = date('Y-m-d h:i',$model->happen_time);
            return $this->render('update', [
                'model' => $model,
                'player' => $player,
                'duration' => $duration,
            ]);
        }
    }

    /**
     * Deletes an existing PlayLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $player = Player::findOne($this->findModel($id)->player_id);
        $player->experience = $player->experience - $this->findModel($id)->experience;
        $player->integral = $player->integral - $this->findModel($id)->integral;
        if ($player->save()){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the PlayLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PlayLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PlayLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
