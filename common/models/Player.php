<?php

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "player".
 *
 * @property integer $player_id
 * @property string $player_name
 * @property string $passwd
 * @property integer $level_id
 * @property string $experience
 * @property string $integral
 */
class Player extends \yii\db\ActiveRecord
{
    public $level_name;
    public $overtime_count;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['player_id', 'player_name', 'passwd', 'level_id'], 'required'],
            [['player_id', 'level_id','overtime_count'], 'integer'],
            [['level_name'], 'string'],
            [['experience', 'integral'], 'double'],
            [['player_name', 'passwd'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'player_id' => '玩家ID',
            'player_name' => '玩家名称',
            'passwd' => '密码',
            'level_name' => '玩家级别',
            'level_id' => '等级ID',
            'experience' => '玩家经验值',
            'integral' => '玩家积分',
            'overtime_count' => '当月超时次数',
        ];
    }

    public function beforeSave($insert)
    {
        $this->passwd = md5($this->passwd);
        return true;
    }

    public static function getOvertime($id,$yearmonth)
    {
//        $datas = PlayLog::find()->where('player_id = :player_id and integral < :number',[':number'=>0,':player_id'=>$id])->count();
        $datas = PlayLog::find()
            ->andFilterWhere(['player_id'=>$id])
            ->andFilterWhere(['<','integral',0])
            ->andFilterWhere(['between','happen_time',Player::get_month_time('first',$yearmonth),Player::get_month_time('end',$yearmonth)])
            ->count();
        return $datas;
    }

    public function getLevel()
    {
        return $this->hasOne(PlayerLevel::className(), ['level_id' => 'level_id']);
    }

    public static function getPlayers()
    {
        return ArrayHelper::map(Player::find()->All(),'player_id', 'player_name');
    }

    public static function getConducts()
    {
        return ArrayHelper::map(PlayerConduct::find()->All(),'conduct_id', 'conduct_name');
    }

    public static function getLevels()
    {
        return ArrayHelper::map(PlayerLevel::find()->All(),'level_id', 'level_name');
    }
    /**
     * 获取本月第一天/最后一天的时间戳
     * @param string $type
     * @return integer
     */
    public static function get_month_time($type,$yearmonth) {
        /* 获取本月第一天/最后一天的时间戳 */
        $year = date( "Y",strtotime($yearmonth) );
        $month = date( "m",strtotime($yearmonth) );
        $allday = date( "t",strtotime($yearmonth) );
        if ( $type == 'first' ) {
            $start_time = strtotime( $year . "-" . $month . "-1" );
            return $start_time;
        } else {
            $end_time = strtotime($year."-".$month."-".$allday);
            return $end_time;
        }
    }
}
