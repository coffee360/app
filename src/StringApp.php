<?php

namespace Phpfunction\App;

/**
 * 字符串
 * Class String
 * @package Phpfunction\App
 */
class StringApp
{

    /**
     * 全是中文
     * @param $str
     * @return int
     */
    public function isAllZhongWen($str)
    {
        if (preg_match('/^[\x7f-\xff]+$/', $str)) {
            return 1;
        } else {
            return 0;
        }
    }


    /**
     * 输出
     * @param        $msg
     * @param string $note
     */
    public function showLog($msg, $note = '')
    {
        if (is_object($msg)) {
            $msg = $msg->toArray();
        }

        if (!empty($note)) {
            echo PHP_EOL;
            print_r($note);
            echo PHP_EOL;
        } else {
            echo PHP_EOL;
        }
        print_r($msg);
        echo PHP_EOL;
    }


    /**
     * 移除表情符号
     * @param $text
     * @return string
     */
    public function removeEmoji($text)
    {
        if (empty($text)) {
            return '';
        }

        $len     = mb_strlen($text);
        $newText = '';
        for ($i = 0; $i < $len; $i++) {
            $str = mb_substr($text, $i, 1, 'utf-8');
            if (strlen($str) >= 4)
                continue;//emoji表情为4个字节
            $newText .= $str;
        }

        return $newText;
    }


    /**
     * 随机颜色值（16位）
     * @return string
     */
    public function getColorRandom()
    {
        $str = '0123456789ABCDE';

        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $str[rand(0, strlen($str) - 1)];
        }

        return $color;
    }


    /**
     * 生成永远唯一的密钥码
     * sha512(返回128位) sha384(返回96位) sha256(返回64位) md5(返回32位)
     * 还有很多Hash函数......
     * @param int    $type 返回格式：0大小写混合  1全大写  2全小写
     * @param string $func 启用算法：
     * @return string
     * @author xiaochaun
     */
    public function getUnique($type = 0, $func = 'md5')
    {
        $uid  = md5(uniqid(rand(), true) . microtime());
        $hash = hash($func, $uid);
        $arr  = str_split($hash);
        foreach ($arr as $v) {
            if ($type == 0) {
                $newArr[] = empty(rand(0, 1)) ? strtoupper($v) : $v;
            }
            if ($type == 1) {
                $newArr[] = strtoupper($v);
            }
            if ($type == 2) {
                $newArr[] = $v;
            }
        }

        return implode('', $newArr);
    }


}