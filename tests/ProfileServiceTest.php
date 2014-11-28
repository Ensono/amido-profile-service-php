<?php

namespace Amido\ProfileService;

class ProfileServiceTest extends \PHPUnit_Framework_TestCase {
    private $profile_service;

    private $api;

    private $response;

    protected function setUp() {
        $this->profile_service = new ProfileService('subscription_key');
        $reflected_object = new \ReflectionObject($this->profile_service);

        $api_prop = $reflected_object->getProperty('api');
        $api_prop->setAccessible(true);

        $this->api = $this->getMockBuilder('Api')->disableOriginalConstructor()->getMock();

        $this->response = $this->getMockBuilder('Httpful\\Response')->disableOriginalConstructor()->getMock();

        $api_prop->setValue($this->profile_service, $this->api);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorThrowsErrorWhenNoSubscriptionKeyProvided() {
        new ProfileService(null);
    }

    public function test_get_profile_LoadsFromApi() {
//        $this->api->method('get')->with($this->equalTo('a'), $this->equalTo('b'))->willReturn($this->response);
//        $res = $this->profile_service->get_profile('a', 'b', 'c');
    }
}