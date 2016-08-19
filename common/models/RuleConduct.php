<?php

namespace common\models;

/**
 * This is the model class for table "rule_conduct".
 *
 * @property integer $rule_id
 * @property integer $level_id
 * @property integer $conduct_id
 * @property integer $experience
 * @property integer $integral
 */
class RuleConduct extends \yii\db\ActiveRecord
{
    public $level_name;
    public $conduct_name;
    public $rewards_penalties_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_conduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id', 'conduct_id', 'experience', 'integral'], 'required'],
            [['level_id', 'conduct_id', 'rewards_penalties_id'], 'integer'],
            [['experience', 'integral'], 'number'],
            [['level_name','conduct_name', 'rewards_penalties_name'],'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rule_id' => '主键',
            'level_id' => '玩家级别ID',
            'level_name' => '玩家级别',
            'conduct_id' => '行为类别ID',
            'conduct_name' => '行为类别',
            'rewards_penalties_id' => '奖惩类型ID',
            'rewards_penalties_name' => '奖惩类型',
            'experience' => '经验值',
            'integral' => '积分',
        ];
    }

    public function getConductrule($level_id,$conduct_id)
    {
        return RuleConduct::findOne(['level_id' => $level_id,'conduct_id' => $conduct_id]);
    }

    public function getRewardspenalties()
    {
        return $this->hasOne(RewardsPenalties::className(), ['rewards_penalties_id' => 'rewards_penalties_id']);
    }

    public function getLevel()
    {
        return $this->hasOne(PlayerLevel::className(), ['level_id' => 'level_id']);
    }

    public function getConduct()
    {
        return $this->hasOne(PlayerConduct::className(), ['conduct_id' => 'conduct_id']);
    }
}
