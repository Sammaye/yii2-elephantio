	<?php
	namespace sammaye\elephantio;
	
	use yii\base\Component;
	use ElephantIO\Client;
	use ElephantIO\Engine\SocketIO\Version1X;
	
	class ElephantIo extends Component
	{
		public $host = 'http://localhost:3000';
		
		public $options = [];
		
		public $namespace = '/';
		
		private $_client;
		
		
		public function init()
		{
			parent::init();
			
			$host = $this->host;
			
			$this->_client = new Client(new Version1X(is_callable($host) ? $host() : $host, $this->options));
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
		
		public function setNamespace($namespace)
		{
			if(method_exists ($this->_client,'of'))
			{
				$this->_client->of($namespace);  
			}
		}
	}
