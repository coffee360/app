<?php

namespace Phpfunction\App;

/**
 * 文件夹
 * Class DirectoryApp
 * @package Phpfunction\App
 */
class DirectoryApp
{

    /**
     * 删除当DIR路径下N天前创建的所有文件
     */
    public function delFileInDir($dir, $n = 7)
    {
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (false !== ($file = readdir($dh))) {
                    if ($file != "." && $file != "..") {
                        $fullpath = $dir . "/" . $file;
                        if (!is_dir($fullpath)) {
                            $filedate = date("Y-m-d", filemtime($fullpath));
                            $d1       = strtotime(date("Y-m-d"));
                            $d2       = strtotime($filedate);
                            $Days     = round(($d1 - $d2) / 3600 / 24);
                            if ($Days > $n) {
                                unlink($fullpath);  ////删除文件
                            }
                        }
                    }
                }
                closedir($dh);
            }
        }
    }


    /**
     * 删除文件夹及下面的所有文件
     * @param $path
     * @return bool
     */
    public function delDir($path)
    {
        //如果是目录则继续
        if (is_dir($path)) {
            //扫描一个文件夹内的所有文件夹和文件并返回数组
            $p = scandir($path);
            //如果 $p 中有两个以上的元素则说明当前 $path 不为空
            if (count($p) > 2) {
                foreach ($p as $val) {
                    //排除目录中的.和..
                    if ($val != "." && $val != "..") {
                        //如果是目录则递归子目录，继续操作
                        if (is_dir($path . $val)) {
                            //子目录中操作删除文件夹和文件
                            delDir($path . $val . '/');
                        } else {
                            //如果是文件直接删除
                            unlink($path . $val);
                        }
                    }
                }
            }
        }

        //删除目录
        return rmdir($path);
    }
}



