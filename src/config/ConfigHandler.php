<?php


namespace wy\aliyun\config;


class ConfigHandler
{
    private $accessId;
    private $accessKey;
    private $regionId;

    public function __construct($accessId = null, $accessKey = null, $regionId = null)
    {
        $this->accessId = $accessId;
        $this->accessKey = $accessKey;
        $this->regionId = $regionId;
    }

    public function set($key, $value)
    {
        $this->$key && $this->$key = $value;
    }

    public function get($key)
    {
        return $this->$key??null;
    }
}
