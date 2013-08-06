<?php

class FollowupsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'followups');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'followups/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'followups/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'followups/1/edit');
		$this->assertTrue($response->isOk());
	}
}
