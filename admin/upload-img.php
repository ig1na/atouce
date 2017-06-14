<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../phpinc/includes/connexionDB.php");

if(!empty($_POST['canv'])){
	$data = $_POST['canv'];
	$data = substr($data,strpos($data,",")+1);
	$data = base64_decode($data);
	$cat = $_POST['category'];
	$zone = array_pop(explode('/', $cat));

	$table = "";

	if(strstr($cat, "accueil/")) {
		$table = "colonnes_accueil";
	} else if(strstr($cat, "news/")) {
		$table = "news";
	}


	

	if($zone) {
		$dir = "images/". $cat . "/" . $_POST['id'];
		$file_name = $dir. "/" .$zone . "-" . time() . ".png";
		$request = 'UPDATE '. $table .' SET img="'. $file_name .'" WHERE '. $table .'.num = "'. $_POST["id"] .'" AND '. $table .'.zone = "'. $zone .'"';
		
	} else {
		$dir = "images/". $cat . $_POST['id'];
		$file_name = $dir. "/" .time() . ".png";
		$request = 'UPDATE '. $table .' SET img="'. $file_name .'" WHERE '. $table .'.num = "'. $_POST["id"] .'"';
		
	}
    

    

    echo $request;

	file_force_contents($dir, $file_name, $data);

    $db->query($request);
	//file_put_contents($file, $data);
}

//créer les dossiers s'ils n'existent pas
function file_force_contents($dir, $file_name, $contents){
    $parts = explode('/', $dir);

    $dir = '';
    if($parts[0] == "..") {
    	$dir .= "..";
    	array_shift($parts);
    }

    foreach($parts as $part) {
			if(!is_dir($dir .= "$part/")){
        echo "\n is not dir: \n" . $dir;
      	mkdir($dir);
    	}
	}

	
	file_put_contents("../$file_name", $contents);

	$folder_files = glob("$dir/*");

	if(count($folder_files) > 10) {
		for($i = 0; $i < count($folder_files) - 10 ; $i++){

			unlink($folder_files[$i]);
		}

	}
}
?>
