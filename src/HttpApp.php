<?php

namespace Phpfunction\App;

/**
 * 数字
 * Class Number
 * @package Phpfunction\App
 */
class HttpApp
{

    /**
     * post
     * @param       $url
     * @param array $data
     * @return bool|string
     */
    public function get($url)
    {
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //不用https验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);

        //显示获得的数据
        return $data;
    }


    /**
     * post
     * @param       $url
     * @param array $data
     * @return bool|string
     */
    public function post($url, $data_arr = [])
    {
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //不用https验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_arr);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);

        //显示获得的数据
        return $data;
    }

}