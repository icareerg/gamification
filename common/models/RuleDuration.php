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
    public $conduct_name;
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
            [['conduct_id', 'duration_id', 'percentage'], 'required'],
            [['conduct_id', 'duration_id'], 'integer'],
            [['conduct_name', 'duration_name'], 'string'],
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
            'conduct_id' => '行为级别ID',
            'duration_id' => '时长类型ID',
            'conduct_name' => '行为级别',
            'duration_name' => '时长类型',
            'percentage' => '百分比',
        ];
    }

    public function getDurationrule($conduct_id,$duration_id)
    {
        return RuleDuration::findOne(['conduct_id' => $conduct_id,'duration_id' => $duration_id]);
    }

    public function getConduct()
    {
        return $this->hasOne(PlayerConduct::className(), ['conduct_id' => 'conduct_id']);
    }

    public function getDuration()
    {
        return $this->hasOne(Duration::className(), ['duration_id' => 'duration_id']);
    }
}
