<?php

namespace DCS\Role\Provider\ArrayBundle\Tests\Model;

use DCS\Role\Provider\ArrayBundle\Model\UserRoleArray;
use DCS\User\CoreBundle\Model\User;

class UserRoleArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DemoUserWithUserRoleArray
     */
    private $demoUser;

    protected function setUp()
    {
        $this->demoUser = new DemoUserWithUserRoleArray();
    }

    public function testAddRole()
    {
        $this->demoUser->addRole('ROLE_USER');
        $this->assertCount(1, $this->demoUser->getRoles());
        $this->demoUser->addRole('ROLE_USER');
        $this->assertCount(1, $this->demoUser->getRoles());
        $this->demoUser->addRole('ROLE_ADMIN');
        $this->assertCount(2, $this->demoUser->getRoles());
    }

    public function testRemoveRole()
    {
        $this->demoUser->addRole('ROLE_USER');
        $this->assertCount(1, $this->demoUser->getRoles());
        $this->demoUser->removeRole('ROLE_ADMIN');
        $this->assertCount(1, $this->demoUser->getRoles());
        $this->demoUser->removeRole('ROLE_USER');
        $this->assertCount(0, $this->demoUser->getRoles());
    }

    public function testHasRole()
    {
        $this->assertFalse($this->demoUser->hasRole('ROLE_USER'));
        $this->demoUser->addRole('ROLE_USER');
        $this->assertTrue($this->demoUser->hasRole('ROLE_USER'));
    }
}

class DemoUserWithUserRoleArray extends User
{
    use UserRoleArray;
}