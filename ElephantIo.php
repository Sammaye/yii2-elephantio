<?php
namespace common\components;

use yii\base\Component;
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;

class ElephantIo extends Component
{
	public $host = 'http://localhost:3000';
	
	private $_client;
	
	
	public function init()
	{
		parent::init();
		
		$this->_client = new Client(new Version1X($this->host));
		$this->_client->initialize();
	}
	
	public function emit($event, $params = [])
	{
		return $this->_client->emit($event, $params);
	}
	
	public function read()
	{
		return $this->_client->read();
	}
	
	public function close()
	{
		return $this->_client->close();
	}
}