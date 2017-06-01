<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../phpinc/includes/connexionDB.php");

if(!empty($_POST['canv'])){
	$data = $_POST['canv'];
	$data = substr($data,strpos($data,",")+1);
	$data = base64_decode($data);
	$file = "../images/". $_POST['category'] . "/" . $_POST['id'];
    $exploded_path = explode('/', $file);
    $file_name = array_pop(explode('/', $_POST['category'])) . "-" . time() . ".png";

    $request = 'UPDATE colonnes_accueil SET img="'. $file_name .'" WHERE colonnes_accueil.num = "'. $_POST["id"] .'" AND colonnes_accueil.zone = "'. $_POST["zone"] .'"';

		file_force_contents($file, $file_name, $data);

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
			if(!is_dir($dir .= "/$part")){
        echo "\n is not dir: \n" . $dir;
      	mkdir($dir);
    	}
	}

	echo "$dir/$file_name";
	file_put_contents("$dir/$file_name", $contents);

	$folder_files = glob("$dir/*");

	if(count($folder_files) > 10) {
		for($i = 0; $i < count($folder_files) - 10 ; $i++){

			unlink($folder_files[$i]);
		}

	}
}
?>
