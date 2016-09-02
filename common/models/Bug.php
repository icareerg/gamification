<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bug".
 *
 * @property integer $bug_id
 * @property integer $player_id
 * @property integer $happen_time
 * @property integer $severity
 */
class Bug extends \yii\db\ActiveRecord
{
    public $player_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bug';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['happen_time', 'severity'], 'required'],
            [['severity'], 'integer'],
            [['player_name'],'string'],
            [['happen_time'],'date','format'=>'yyyy-MM-dd'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bug_id' => '缺陷ID',
            'player_id' => '玩家ID',
            'happen_time' => '发生时间',
            'severity' => '严重程度',
            'player_name' => '玩家姓名',
        ];
    }

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

    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['player_id' => 'player_id']);
    }
}
