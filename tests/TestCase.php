<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Cnaebadi\NullReplacer\NullReplacerServiceProvider;

class TestCase extends BaseTestCase
{
	 protected function getPackageProviders($app)
	 {
		  return [
				NullReplacerServiceProvider::class,
		  ];
	 }
}


