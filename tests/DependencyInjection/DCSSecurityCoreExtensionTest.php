<?php

namespace DCS\Role\Provider\ArrayBundle\Tests\DependencyInjection;

use DCS\Role\Provider\ArrayBundle\DependencyInjection\DCSRoleProviderArrayExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DCSSecurityCoreExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $container = new ContainerBuilder();

        $mock = $this->getMockBuilder(DCSRoleProviderArrayExtension::class)
            ->setMethods(['processConfiguration'])
            ->getMock();

        $config = [
            'dcs_role_provider_array' => [
                'roles' => [
                    'ROLE_USER',
                    'ROLE_ADMIN',
                ],
            ]
        ];

        $mock->load($config, $container);

        $this->assertTrue($container->hasParameter('dcs_role_provider_array.roles'));
        $this->assertCount(2, $container->getParameter('dcs_role_provider_array.roles'));
    }
}
