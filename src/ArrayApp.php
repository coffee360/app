<?php

namespace Phpfunction\App;

/**
 * 数组
 * Class String
 * @package Phpfunction\App
 */
class ArrayApp
{

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