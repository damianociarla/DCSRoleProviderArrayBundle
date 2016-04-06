<?php

namespace DCS\Role\Provider\ArrayBundle;

use DCS\Role\CoreBundle\Provider\ProviderInterface;

class ArrayProvider implements ProviderInterface
{
    /**
     * Roles list
     *
     * @var array
     */
    private $roles;

    /**
     * ArrayProvider constructor.
     *
     * @param array $roles
     */
    public function __construct(array $roles = [])
    {
        $this->roles = $roles;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @inheritDoc
     */
    public function getRole($role)
    {
        if ($this->hasRole($role)) {
            return $role;
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function hasRole($role)
    {
        return in_array($role, $this->roles);
    }

    /**
     * @inheritDoc
     */
    public function addRole($role)
    {
        if (!$this->hasRole($role)) {
            $this->roles[] = $role;
        }
    }
}