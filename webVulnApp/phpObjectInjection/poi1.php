<?php
class LogWriter{
	public $logfile = null;
	public $logdata = null;
	function __destruct(){
		file_put_contents($this->logfile, $this->logdata);
	}
}
echo $_GET['data'];
$input = unserialize($_GET['data']);
?>
