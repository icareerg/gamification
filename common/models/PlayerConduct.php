<?php

namespace common\models;

/**
 * This is the model class for table "player_conduct".
 *
 * @property integer $conduct_id
 * @property string $conduct_name
 */
class PlayerConduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player_conduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conduct_name'], 'required'],
            [['conduct_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'conduct_id' => '行为ID',
            'conduct_name' => '行为类别',
        ];
    }

}
