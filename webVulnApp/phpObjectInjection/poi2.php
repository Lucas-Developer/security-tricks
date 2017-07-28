<?php
class App{
	public $logFile = 'logs.txt';
	public $logData = 'test';

	public function checkServices(){
		echo "[+] Checking Services...<br>";
		$this->logData = 'Success';
	}

	public function __destruct(){
		file_put_contents(__DIR__ . '/' . $this->logFile, $this->logData);
		echo "[+] Writing log data...<br>";
	}
}

$userInput = $_GET['data'] ?? '';
$someData = unserialize($userInput);
$app = new App;
$app->checkServices();
?>
