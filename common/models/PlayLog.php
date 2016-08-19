<?php

namespace common\models;

/**
 * This is the model class for table "play_log".
 *
 * @property integer $play_id
 * @property integer $player_id
 * @property integer $conduct_id
 * @property integer $duration_id
 * @property string $experience
 * @property string $integral
 * @property integer $happen_time
 */
class PlayLog extends \yii\db\ActiveRecord
{
    public $conduct_name;
    public $player_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'play_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['player_id', 'conduct_id', 'duration_id', 'experience', 'integral'], 'required'],
            [['player_id', 'conduct_id', 'duration_id' ], 'integer'],
            [['conduct_name','player_name'],'string'],
            [['experience', 'integral'], 'double'],
            [['happen_time'],'date','format'=>'yyyy-MM-dd HH:mm'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'play_id' => '数据ID',
            'player_id' => '玩家ID',
            'player_name' => '玩家姓名',
            'conduct_id' => '行为ID',
            'conduct_name' => '行为类别',
            'duration_id' => '时长类型ID',
            'duration_name' => '时长',
            'experience' => '经验值',
            'integral' => '积分',
            'happen_time' => '时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if ($this->happen_time != '') {
            $this->happen_time = strtotime($this->happen_time);
            return true;
        } else {
            $this->happen_time = 0;
            return false;
        }
    }

    public function getConduct()
    {
        return $this->hasOne(PlayerConduct::className(), ['conduct_id' => 'conduct_id']);
    }

    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['player_id' => 'player_id']);
    }

    public function getDuration()
    {
        return $this->hasOne(Duration::className(), ['duration_id' => 'duration_id']);
    }
}
