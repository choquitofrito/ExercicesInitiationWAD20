<?php

	// inclusion de l'autoload général pour tous nos librairies
	require "./vendor/autoload.php";
	
	// IMDB - imdbphp/imdbphp - pour accéder à la IMDB (films)
	$config = new \Imdb\Config();
	$config->language = 'en';
	$imdb = new \Imdb\Title(335266, $config); // 335266 est l'id de "Lost in translation" chez IMDB
	echo "<h4>IMDB</h4>";
	echo ("<br>".$imdb->title()); // Lost in Translation - Zwischen den Welten
	echo ("<br>".$imdb->orig_title()); // Lost in Translation
	
	
	
	// FAKER - fzaninotto/faker - librairie pour créer de données fakes (ex: remplir une base de données)
	$faker = Faker\Factory::create(); // on ne fait pas new. On fait appel à une méthode 
									// statique de la classe qui renvoie un objet
									// (pattern Factory)

	// la méthode magique __set() est surchargé pour qu'elle génère
	// une nouvelle donnée A CHAQUE FOIS qu'on accède à une propriété
	echo "<h4>FAKER</h4>";
	echo $faker->name;
	// 'Lucy Cechtelar';
	echo "<br>";
	echo $faker->name;
	// 'Pedro Jiménez';  
	echo "<br>";
	echo $faker->address;
	  // "426 Jordy Lodge
	  // Cartwrightshire, SC 88120-6700"
	echo "<br><br>";
	echo $faker->text;
	  


	echo "<br><br><br>";
	
	// MONOLOG - monolog/monolog - pour créer de fichiers de log dans le disque
	echo "<h4>MONOLOG</h4>";
	
	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;
	// create un objet Logger et écrire un fichier de log dans le disque
	$log = new Logger('monObjetLogger');
	$log->pushHandler(new StreamHandler('./monFichierLog.txt', Logger::WARNING));
	// écrire dans le log
	$log->warning('Voici un warning!');
	$log->error('Voici une erreur!');
	echo "Ouvrez le fichier \"monFichierLog.txt\"";
	
	
?>