<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5) {
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)) {
			$silent=true;
		}

		// set up tables
		setupTable('depots', "create table if not exists `depots` (   `id` INT unsigned not null auto_increment , primary key (`id`), `sur_le_site` INT unsigned null , `par_le_membre` INT unsigned null , `dans_le_bac` INT unsigned null , `jour_heure` DATETIME null , `qte_vmh` DECIMAL(10,2) null , `qte_bds` DECIMAL(10,2) null , `niveau_du_bac` VARCHAR(64) null , `cree_par` VARCHAR(64) null , `date_maj` TIMESTAMP null ) CHARSET utf8", $silent);
		setupIndexes('depots', array('sur_le_site','par_le_membre','dans_le_bac'));
		setupTable('site_compostage', "create table if not exists `site_compostage` (   `id` INT unsigned not null auto_increment , primary key (`id`), `nom_du_site` VARCHAR(64) null , `adresse_postale` VARCHAR(64) null , `acces_au_site` TEXT null , `type_de_site` VARCHAR(64) null , `nom_du_responsable` VARCHAR(64) null , `email_du_responsable` VARCHAR(64) null default 'adresse@email.com' , `Telephone_du_responsable` VARCHAR(64) null , `Commentaires` TEXT null ) CHARSET utf8", $silent);
		setupTable('bacs_du_site', "create table if not exists `bacs_du_site` (   `id` INT unsigned not null auto_increment , primary key (`id`), `appartient_site` INT unsigned null , `type_de_bacs` VARCHAR(64) null , `niveau_de_remplissage` VARCHAR(64) null , `Commentaires` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('bacs_du_site', array('appartient_site'));
		setupTable('membres', "create table if not exists `membres` (   `id` INT unsigned not null auto_increment , primary key (`id`), `Nom` VARCHAR(64) null , `prenom` VARCHAR(64) null , `statut` VARCHAR(64) null default 'habitant' , `adresse_du_membre` TEXT null , `email_membre` VARCHAR(64) null , `Telephone_membre` VARCHAR(64) null ) CHARSET utf8", $silent);
		setupTable('transferts', "create table if not exists `transferts` (   `id` INT unsigned not null auto_increment , primary key (`id`), `sur_le_site` INT unsigned null , `par_le_membre` INT unsigned null , `jour_heure` DATETIME null , `du_bac` VARCHAR(64) null , `vers_bac` VARCHAR(64) null , `quantite` DECIMAL(10,2) null , `cree_par` VARCHAR(64) null , `date_maj` TIMESTAMP null ) CHARSET utf8", $silent);
		setupIndexes('transferts', array('sur_le_site','par_le_membre'));
		setupTable('intervention', "create table if not exists `intervention` (   `id` INT unsigned not null auto_increment , primary key (`id`), `demande_par` INT unsigned null , `date_demande` DATETIME null , `realise_par` INT unsigned null , `date_realisation` DATETIME null , `pour_site` INT unsigned null , `pour_bac` INT unsigned null , `type_intervention` VARCHAR(64) not null default 'Transfert' , `statut_intervention` VARCHAR(64) not null default 'En attente' , `description` TEXT null , `cree_par` VARCHAR(64) null , `date_maj` TIMESTAMP null ) CHARSET utf8", $silent);
		setupIndexes('intervention', array('demande_par','realise_par','pour_site','pour_bac'));


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')) {
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields) {
		if(!is_array($arrFields)) {
			return false;
		}

		foreach($arrFields as $fieldName) {
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")) {
				continue;
			}
			if(!$row=@db_fetch_assoc($res)) {
				continue;
			}
			if($row['Key']=='') {
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter='') {
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)) {
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)) {
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")) { // table already exists
			if($row = @db_fetch_array($res)) {
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)) {
					echo '<br>';
					foreach($arrAlter as $alter) {
						if($alter!='') {
							echo "$alter ... ";
							if(!@db_query($alter)) {
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!='') { // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")) { // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)) {
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)) {
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent) {
			echo $out;
		}
	}
?>