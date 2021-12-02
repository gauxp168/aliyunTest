<?php

/**
 * Created by PhpStorm.
 * User: liuhui
 * Date: 2021/11/29
 * Time: 15:45
 */
namespace wy\aliyun;
use AlibabaCloud\Client\AlibabaCloud;
use wy\aliyun\config\ConfigHandler;

abstract class AlibabaCloudClient
{
    private $config;

    function __construct(ConfigHandler $config){
        $this->config = $config;
    }

    /**
     * 设置阿里云默认客户端设置
     */
    function setDefaultClient(){
        AlibabaCloud::accessKeyClient(
            $this->config->get('accessId'),
            $this->config->get('accessKey')
        )->regionId($this->config->get('regionId'))->asDefaultClient();
    }

    abstract protected function getProduct();
}
