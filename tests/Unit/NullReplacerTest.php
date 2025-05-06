<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use Cnaebadi\NullReplacer\Helpers\NullReplacer;

class NullReplacerTest extends TestCase
{
	 public function testReplaceStringWithTrueBool()
	 {
		  $request = Request::create('/', 'POST');
		  $request->merge(['is_active' => 'true']);

		  NullReplacer::handle($request, 'is_active', 'true');

		  $this->assertTrue($request->get('is_active'));
	 }

	 public function testReplaceStringWithFalseBool()
	 {
		  $request = Request::create('/', 'POST');
		  $request->merge(['is_active' => false]);

		  NullReplacer::handle($request, 'is_active', 'false');

		  $this->assertFalse($request->get('is_active'));
	 }

	 public function testReplaceNullWithCustomValue()
	 {
		  $request = Request::create('/', 'POST');
		  $request->merge(['email' => null]);

		  NullReplacer::handle($request, 'email', null,'default@example.com');

		  $this->assertEquals('default@example.com', $request->get('email'));
	 }

	 public function testRemoveAttributeIfNullAndNoParameter()
	 {
		  $request = Request::create('/', 'POST');
		  $request->merge(['status' => null]);

		  NullReplacer::handle($request, 'status', null);

		  $this->assertFalse($request->has('status'));
	 }

	 public function testDoNothingIfValueIsNotNull()
	 {
		  $request = Request::create('/', 'POST');
		  $request->merge(['email' => 'user@example.com']);

		  NullReplacer::handle($request, 'email', 'user@example.com');

		  $this->assertEquals('user@example.com', $request->get('email'));
	 }
}

