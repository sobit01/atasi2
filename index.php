<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<?php
  if(isset($_POST['taille'])){
      $taille = $_POST['taille'];
  }else{
      $taille = "";
  }
    if(isset($_POST['color'])){
        if($_POST['color'] != null){
           $color = "style=\"color:".$_POST['color']."\""; 
        }else{
            $color = "";
        }
      
  }else{
      $color = "";
  }
    $chemin = 'lib/font-awesome-4.7.0/fonts/fontawesome-webfont.svg';
    $monfichier = fopen($chemin, 'r');
    if(!$monfichier){
        echo "ouverture impossible";
    }else{
        echo "ouverture ok";
        // 2 : on fera ici nos opérations sur le fichier...
        ?>
		<form method="post" action="index.php">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="">Taille :</span>
				</div>

				<select name="taille" class="custom-select">
                	<option></option>
                	<option value="fa-lg">fa-lg</option>
				 	<option value="fa-2x">fa-2x</option>
                 	<option value="fa-3x">fa-3x</option>
                 	<option value="fa-4x">fa-4x</option>
                 	<option value="fa-5x">fa-5x</option>
			 	</select>
				<div class="input-group-prepend">
					<span class="input-group-text" id="">Couleur :</span>
				</div>
				<input type="text" name="color" value="<?php if(isset($_POST['color'])){echo $_POST['color'];}?>" class="form-control">
				<input type="submit" class="btn btn-outline-secondary">

			</div>
		</form>
		<?php
        while($ligne = fgets($monfichier)){
 		?>

			<?php
		 	$pos_search_debut = stripos($ligne,"glyph-name=\"");
            if($pos_search_debut > 0){
               //     echo substr($ligne,$pos_search_debut)."</br>";
			 	$pos_search_debut = $pos_search_debut +12;
                     $pos_search_fin = stripos($ligne,"\"",$pos_search_debut);
               //     echo ">".$pos_search_debut."-".$pos_search_fin."<</br>";
                   //  echo "2--->";
                //    echo "<pre>".$ligne."</pre>";
                //    echo "3<--</br>";
                    
                    $class_icone = substr($ligne,$pos_search_debut,$pos_search_fin-$pos_search_debut);
                    $class_icone = str_replace("_","-",$class_icone);
			 		$tab_icone[] = $class_icone; 
                   // echo $class_icone."</br>";
                    echo "<i class=\"fa fa-". $class_icone ." ".$taille." \"".$color."  ></i>
                    &lti class=\"fa fa-". $class_icone ."\" ".$color."&gt</i> fa-".$class_icone ."</br>";
                }
            
        }
      
        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);    
    }
    


?>
				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
