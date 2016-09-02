<?php
/**
 * @file /common/lib/common.php
 * @module Index
 * @author 陈岩 <yan.chen@icareer.com.cn>
 * @last 陈岩 <yan.chen@icareer.com.cn>
 * @version v 0.1 16/9/115:57
 * @link doc/***.doc
 */
namespace common\lib;

use yii\helpers\ArrayHelper;
use yii\base\InvalidParamException;

class common
{
    public static function getSeverity($Key)
    {
        switch ($Key)
        {
            case 1:
                return '轻微';
            case 2:
                return '一般';
            case 3:
                return '严重';
            case '轻微':
                return 1;
            case '一般':
                return 2;
            case '严重':
                return 3;
        }
    }

    const Severity_Type_1 = 1;
    const Severity_Type_2 = 2;
    const Severity_Type_3 = 3;

    /**
     * 缺陷严重程度类型
     * @param null $key
     * @return string
     */
    public static function getSeveritys($key = null)
    {
        $items = [
            self::Severity_Type_1 => '轻微',
            self::Severity_Type_2 => '一般',
            self::Severity_Type_3 => '严重',
        ];
        return self::getItems($items, $key);
    }

    public static function getItems($items, $key = null, $throw = false)
    {
        if ($key !== null) {
            if (key_exists($key, $items)) {
                return $items[$key];
            }
            if ($throw) {
                throw new InvalidParamException();
            }
            return '未设置';
        }
        return $items;
    }
}