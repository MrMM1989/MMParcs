<?php
namespace MMProgramming\MMParcs\Libraries;

class FileLogger {
	
	/*
	 * If your applications index.php is in a subfolder of your server document root, define it here
	 * otherwise leave it empty
	 */
	protected $applicationDir = '/cvo/programmeren4/mmparcs';
	
	protected $logDir;
	
	public function __construct(){
		
		//Need constructor to initialise this variable because of $_SERVER superglobal
		$this->logDir = $_SERVER['DOCUMENT_ROOT'].$this->applicationDir.'/log';		
	}
	
	public function getLogList(){
		$dirname = $this->logDir.'/entity';
		$fileList = scandir($dirname);
		
		//remove '.' from file list
		unset($fileList[0]);
		
		//remove '..' from file list
		unset($fileList[1]);
		
		$logList = array();
		
		foreach($fileList as $file){
			$logList[] = basename($file, '.txt');
		}
				
		return $logList;		
	}
	
	public function log($entity, $action, $user) {
		
		$filename = $this->logDir.'/entity/'.$entity.'-'.$this->getLogFileNameDate().'.txt';
		
		if(file_exists($filename)){
		
			$log = file_get_contents($filename);
			$logArray = json_decode($log, true);
			
			$logArray[$entity][] = array(
				'date' => $this->getLogDate(),
				'user' => $user,
				'action' => $action
			);
			
			$logContent = json_encode($logArray);
			file_put_contents($filename, $logContent);
								
		}else{
						
			$logArray[$entity][] = array(
				'date' => $this->getLogDate(),
				'user' => $user,
				'action' => $action
			);
			
			$logContent = json_encode($logArray);
			file_put_contents($filename, $logContent);
		}		
	}
	
	public function readLog($logname){
		
		$filename = $this->logDir.'/entity/'.$logname.'.txt';
		
		$log = file_get_contents($filename);
		
		return json_decode($log, true);				
	}
	
	private function getLogDate(){
		
		return date('l d F Y - H:i:s');
	}
	
	private function getLogFileNameDate(){
		return date('F-Y');
	}
}
