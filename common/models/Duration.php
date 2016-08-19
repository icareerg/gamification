<?php

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "duration_rule".
 *
 * @property integer $duration_id
 * @property string $duration_name
 */
class Duration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'duration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['duration_name'], 'required'],
            [['duration_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'duration_id' => '时长类型ID',
            'duration_name' => '时长',
        ];
    }

    public static function getDurations()
    {
        return ArrayHelper::map(Duration::find()->All(),'duration_id', 'duration_name');
    }
}
