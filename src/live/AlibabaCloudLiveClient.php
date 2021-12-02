<?php
/**
 * Created by PhpStorm.
 * User: liuhui
 * Date: 2021/11/29
 * Time: 15:45
 */
namespace wy\aliyun\live;
use AlibabaCloud\Client\AlibabaCloud;
use wy\aliyun\AlibabaCloudClient;

class AlibabaCloudLiveClient extends AlibabaCloudClient {

    private  $version = '2016-11-01';
    private  $host = 'live.aliyuncs.com';

    protected function getProduct()
    {
        return 'live';
    }

    /**
     * 通过 post方法 请求API
     * @param $action
     * @param $options
     * @return array
     * @throws \AlibabaCloud\Client\Exception\ClientException
     * @throws \AlibabaCloud\Client\Exception\ServerException
     */
    public function requestByPost($action,$options){
        $this->setDefaultClient();
        $result = AlibabaCloud::rpc()
            ->product($this->getProduct())
            ->version($this->version)
            ->action($action)
            ->method('POST')
            ->host($this->host)
            ->options(['query' => $options])
            ->request();
        return $result->toArray();
    }

    /**
     * 通过 get方法 请求API
     * @param $action
     * @param $options
     * @return array
     * @throws \AlibabaCloud\Client\Exception\ClientException
     * @throws \AlibabaCloud\Client\Exception\ServerException
     */
    public function requestByGet($action,$options){
        $this->setDefaultClient();
        $result = AlibabaCloud::rpc()
            ->product($this->getProduct())
            ->version($this->version)
            ->action($action)
            ->method('GET')
            ->host($this->host)
            ->options(['query' => $options])
            ->request();
        return $result->toArray();
    }
}
