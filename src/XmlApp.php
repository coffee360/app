<?php

namespace Phpfunction\App;

/**
 * xml
 * Class XmlApp
 * @package Phpfunction\App
 */
class XmlApp
{

    /**
     * xml转数组
     * @param $xml
     * @return mixed
     */
    public function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

        return $values;
    }
}