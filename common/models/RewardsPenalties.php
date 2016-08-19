<?php

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rewards_penalties".
 *
 * @property integer $id
 * @property string $rewards_penalties_name
 */
class RewardsPenalties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rewards_penalties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rewards_penalties_name'], 'required'],
            [['rewards_penalties_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rewards_penalties_id' => '奖惩类型ID',
            'rewards_penalties_name' => '奖惩类型',
        ];
    }

    public static function getRewardspenalties()
    {
        return ArrayHelper::map(RewardsPenalties::find()->All(),'rewards_penalties_id', 'rewards_penalties_name');
    }
}
