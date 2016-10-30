[![Build Status](https://travis-ci.org/damianociarla/DCSRoleProviderArrayBundle.svg?branch=master)](https://travis-ci.org/damianociarla/DCSRoleProviderArrayBundle) [![Coverage Status](https://coveralls.io/repos/github/damianociarla/DCSRoleProviderArrayBundle/badge.svg?branch=master)](https://coveralls.io/github/damianociarla/DCSRoleProviderArrayBundle?branch=master)

# DCSRoleProviderArrayBundle

This bundle provides the provider implementation for [DCSRoleCoreBundle](https://github.com/damianociarla/DCSRoleCoreBundle). 
The logic of this provider revolves around the role management through array. Then the database of roles available in the application will be configured in the bundle settings.

There is a trait [(UserRoleArray)](https://github.com/damianociarla/DCSRoleProviderArrayBundle/blob/master/src/Model/UserRoleArray.php) that will expose some utility methods for role management to use in the implementation of the **User** class.

## Installation

### Prerequisites

This bundle requires [DCSRoleCoreBundle](https://github.com/damianociarla/DCSRoleCoreBundle).

### Require the bundle

Run the following command:

	$ composer require dcs/role-provider-array-bundle "~1.0@dev"

Composer will install the bundle to your project's `vendor/dcs/role-provider-array-bundle` directory.

### Enable the bundle

Enable the bundle in the kernel:

	<?php
	// app/AppKernel.php

	public function registerBundles()
	{
		$bundles = array(
			// ...
			new DCS\Role\Provider\ArrayBundle\DCSRoleProviderArrayBundle(),
			// ...
		);
	}

### Configure

Now that you have properly enabled this bundle, the next step is to configure it to work with the specific needs of your application.

Add the following configuration to your `config.yml`.

    dcs_role_provider_array:
        roles: LIST_OF_ROLES_AS_ARRAY

The following lines provide the configuration for the **DCSRoleCoreBundle**.        
        
    dcs_role_core:
        provider: dcs_role.provider.array

# Reporting an issue or a feature request

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/damianociarla/DCSRoleProviderArrayBundle/issues).