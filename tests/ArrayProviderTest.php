<?php

namespace DCS\Role\Provider\ArrayBundle\Tests;

use DCS\Role\Provider\ArrayBundle\ArrayProvider;

class ArrayProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ArrayProvider
     */
    private $provider;

    protected function setUp()
    {
        $this->provider = new ArrayProvider([
            'ROLE_DEFAULT',
            'ROLE_USER',
            'ROLE_ADMIN',
        ]);
    }

    /**
     * @dataProvider getRoleProvider
     */
    public function testAllMethods($roleToFound, $roleExpected, $expectedResultCheck, $roleToAdd, $expectedCountRoles)
    {
        $this->assertEquals($expectedResultCheck, $this->provider->hasRole($roleToFound));
        $this->assertEquals($roleExpected, $this->provider->getRole($roleToFound));
        
        $this->provider->addRole($roleToAdd);

        $this->assertCount($expectedCountRoles, $this->provider->getRoles());
    }

    public function getRoleProvider()
    {
        return [
            ['ROLE_USER', 'ROLE_USER', true, 'ROLE_MANAGER', 4],
            ['ROLE_DEFAULT', 'ROLE_DEFAULT', true, 'ROLE_DEFAULT', 3],
            ['ROLE_MANAGER', null, false, 'ROLE_MANAGER', 4],
        ];
    }
}