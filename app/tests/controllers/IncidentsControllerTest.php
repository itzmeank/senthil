<?php

class IncidentsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'incidents');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'incidents/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'incidents/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'incidents/1/edit');
		$this->assertTrue($response->isOk());
	}
}
