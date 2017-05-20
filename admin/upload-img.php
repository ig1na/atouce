<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!empty($_POST['canv'])){
	$data = $_POST['canv'];
	$data = substr($data,strpos($data,",")+1);
	$data = base64_decode($data);
	$file = $_POST['savePath'];
	file_force_contents($file, $data);
	//file_put_contents($file, $data);
}

//créer les dossiers s'ils n'existent pas
	function file_force_contents($dir, $contents){
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        echo "file: " . $file;
        echo "\n";
        $dir = '';
        if($parts[0] == "..") {
        	$dir .= "..";
        	array_shift($parts);
        }
        foreach($parts as $part) {
        	echo "\n part: " . $part . "\n";
    		if(!is_dir($dir .= "/$part")){
            	echo "\n is not dir: \n" . $dir;
            	mkdir($dir);
        	}            
    	}	

    	
    	file_put_contents("$dir/$file", $contents);

    	$folder_files = glob("$dir/*");

    	if(count($folder_files) > 10) {
    		for($i = 0; $i < count($folder_files) - 10 ; $i++){

    			unlink($folder_files[$i]);
    		}
    		
    	}
    }
?>
