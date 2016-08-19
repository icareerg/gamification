<?php

namespace common\models;

/**
 * This is the model class for table "player_level".
 *
 * @property integer $level_id
 * @property string $level_name
 */
class PlayerLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_name'], 'required'],
            [['level_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => '级别ID',
            'level_name' => '级别名称',
        ];
    }

}
