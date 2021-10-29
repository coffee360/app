<?php

namespace Phpfunction\App;

/**
 * 数组
 * Class String
 * @package Phpfunction\App
 */
class ArrayApp
{

    /**
     * 下级所有tree结构
     * @param        $data          数组
     * @param string $son_key       下标
     * @param string $parent_id_key 上级id字段
     * @param string $own_id        当前id字段
     * @return array
     */
    public function getChild($data, $son_key = "child", $parent_id_key = "parent_id", $own_id = "id")
    {
        $items = [];
        foreach ($data as $v) { //将数组存入$items,且$items的键为$data中的id
            $items[$v['id']] = $v;
        }

        $tree = [];
        foreach ($items as $item) {
            if (isset($items[$item[$parent_id_key]])) { //通过pid判断$items中是否有对应的数组,$itms[0]不存在
                $items[$item[$parent_id_key]][$son_key][] =& $items[$item[$own_id]];
            } else {
                $tree[] =& $items[$item[$own_id]];
            }
        }

        return $tree;
    }
}