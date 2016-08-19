<?php

namespace common\models;

/**
 * This is the model class for table "rule_duration".
 *
 * @property integer $rule_id
 * @property integer $level_id
 * @property integer $duration_id
 * @property string $percentage
 */
class RuleDuration extends \yii\db\ActiveRecord
{
    public $level_name;
    public $duration_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_duration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id', 'duration_id', 'percentage'], 'required'],
            [['level_id', 'duration_id'], 'integer'],
            [['level_name', 'duration_name'], 'string'],
            [['percentage'], 'number'],
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
            'duration_id' => '时长类型ID',
            'level_name' => '玩家级别',
            'duration_name' => '时长类型',
            'percentage' => '百分比',
        ];
    }

    public function getDurationrule($level_id,$duration_id)
    {
        return RuleDuration::findOne(['level_id' => $level_id,'duration_id' => $duration_id]);
    }

    public function getLevel()
    {
        return $this->hasOne(PlayerLevel::className(), ['level_id' => 'level_id']);
    }

    public function getDuration()
    {
        return $this->hasOne(Duration::className(), ['duration_id' => 'duration_id']);
    }
}
