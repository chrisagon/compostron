<?php

// Data functions (insert, update, delete, form) for table transferts

// This script and data application were generated by AppGini 5.82
// Download AppGini for free from https://bigprof.com/appgini/download/

function transferts_insert() {
	global $Translation;

	// mm: can member insert record?
	$arrPerm = getTablePermissions('transferts');
	if(!$arrPerm[1]) return false;

	$data = array();
	$data['sur_le_site'] = $_REQUEST['sur_le_site'];
		if($data['sur_le_site'] == empty_lookup_value) { $data['sur_le_site'] = ''; }
	$data['par_le_membre'] = $_REQUEST['par_le_membre'];
		if($data['par_le_membre'] == empty_lookup_value) { $data['par_le_membre'] = ''; }
	$data['jour_heure'] = mysql_datetime($_REQUEST['jour_heure']);
		if($data['jour_heure'] == empty_lookup_value) { $data['jour_heure'] = ''; }
	$data['du_bac'] = $_REQUEST['du_bac'];
		if($data['du_bac'] == empty_lookup_value) { $data['du_bac'] = ''; }
	$data['vers_bac'] = $_REQUEST['vers_bac'];
		if($data['vers_bac'] == empty_lookup_value) { $data['vers_bac'] = ''; }
	$data['quantite'] = $_REQUEST['quantite'];
		if($data['quantite'] == empty_lookup_value) { $data['quantite'] = ''; }
	$data['cree_par'] = parseCode('<%%creatorUsername%%>', true);

	// hook: transferts_before_insert
	if(function_exists('transferts_before_insert')) {
		$args = array();
		if(!transferts_before_insert($data, getMemberInfo(), $args)) { return false; }
	}

	$error = '';
	// set empty fields to NULL
	$data = array_map(function($v) { return ($v === '' ? NULL : $v); }, $data);
	insert('transferts', backtick_keys_once($data), $error);
	if($error)
		die("{$error}<br><a href=\"#\" onclick=\"history.go(-1);\">{$Translation['< back']}</a>");

	$recID = db_insert_id(db_link());

	// hook: transferts_after_insert
	if(function_exists('transferts_after_insert')) {
		$res = sql("select * from `transferts` where `id`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)) {
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!transferts_after_insert($data, getMemberInfo(), $args)) { return $recID; }
	}

	// mm: save ownership data
	set_record_owner('transferts', $recID, getLoggedMemberID());

	// if this record is a copy of another record, copy children if applicable
	if(!empty($_REQUEST['SelectedID'])) transferts_copy_children($recID, $_REQUEST['SelectedID']);

	return $recID;
}

function transferts_copy_children($destination_id, $source_id) {
	global $Translation;
	$requests = array(); // array of curl handlers for launching insert requests
	$eo = array('silentErrors' => true);
	$uploads_dir = realpath(dirname(__FILE__) . '/../' . $Translation['ImageFolder']);
	$safe_sid = makeSafe($source_id);

	// launch requests, asynchronously
	curl_batch($requests);
}

function transferts_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false) {
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('transferts');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='transferts' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='transferts' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3) { // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: transferts_before_delete
	if(function_exists('transferts_before_delete')) {
		$args=array();
		if(!transferts_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	sql("delete from `transferts` where `id`='$selected_id'", $eo);

	// hook: transferts_after_delete
	if(function_exists('transferts_after_delete')) {
		$args=array();
		transferts_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='transferts' and pkValue='$selected_id'", $eo);
}

function transferts_update($selected_id) {
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('transferts');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='transferts' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='transferts' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3) { // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['sur_le_site'] = makeSafe($_REQUEST['sur_le_site']);
		if($data['sur_le_site'] == empty_lookup_value) { $data['sur_le_site'] = ''; }
	$data['par_le_membre'] = makeSafe($_REQUEST['par_le_membre']);
		if($data['par_le_membre'] == empty_lookup_value) { $data['par_le_membre'] = ''; }
	$data['jour_heure'] = mysql_datetime($_REQUEST['jour_heure']);
		if($data['jour_heure'] == empty_lookup_value) { $data['jour_heure'] = ''; }
	$data['du_bac'] = makeSafe($_REQUEST['du_bac']);
		if($data['du_bac'] == empty_lookup_value) { $data['du_bac'] = ''; }
	$data['vers_bac'] = makeSafe($_REQUEST['vers_bac']);
		if($data['vers_bac'] == empty_lookup_value) { $data['vers_bac'] = ''; }
	$data['quantite'] = makeSafe($_REQUEST['quantite']);
		if($data['quantite'] == empty_lookup_value) { $data['quantite'] = ''; }
	$data['date_maj'] = parseCode('<%%editingTimestamp%%>', false, true);
	$data['selectedID'] = makeSafe($selected_id);

	// hook: transferts_before_update
	if(function_exists('transferts_before_update')) {
		$args = array();
		if(!transferts_before_update($data, getMemberInfo(), $args)) { return false; }
	}

	$o = array('silentErrors' => true);
	sql('update `transferts` set       `sur_le_site`=' . (($data['sur_le_site'] !== '' && $data['sur_le_site'] !== NULL) ? "'{$data['sur_le_site']}'" : 'NULL') . ', `par_le_membre`=' . (($data['par_le_membre'] !== '' && $data['par_le_membre'] !== NULL) ? "'{$data['par_le_membre']}'" : 'NULL') . ', `jour_heure`=' . (($data['jour_heure'] !== '' && $data['jour_heure'] !== NULL) ? "'{$data['jour_heure']}'" : 'NULL') . ', `du_bac`=' . (($data['du_bac'] !== '' && $data['du_bac'] !== NULL) ? "'{$data['du_bac']}'" : 'NULL') . ', `vers_bac`=' . (($data['vers_bac'] !== '' && $data['vers_bac'] !== NULL) ? "'{$data['vers_bac']}'" : 'NULL') . ', `quantite`=' . (($data['quantite'] !== '' && $data['quantite'] !== NULL) ? "'{$data['quantite']}'" : 'NULL') . ', `date_maj`=' . "'{$data['date_maj']}'" . " where `id`='".makeSafe($selected_id)."'", $o);
	if($o['error']!='') {
		echo $o['error'];
		echo '<a href="transferts_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: transferts_after_update
	if(function_exists('transferts_after_update')) {
		$res = sql("SELECT * FROM `transferts` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) {
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['id'];
		$args = array();
		if(!transferts_after_update($data, getMemberInfo(), $args)) { return; }
	}

	// mm: update ownership data
	sql("update `membership_userrecords` set `dateUpdated`='" . time() . "' where `tableName`='transferts' and `pkValue`='" . makeSafe($selected_id) . "'", $eo);

}

function transferts_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = '') {
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('transferts');
	if(!$arrPerm[1] && $selected_id=='') { return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != '') {
		$dvprint = true;
	}

	$filterer_sur_le_site = thisOr(undo_magic_quotes($_REQUEST['filterer_sur_le_site']), '');
	$filterer_par_le_membre = thisOr(undo_magic_quotes($_REQUEST['filterer_par_le_membre']), '');

	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: sur_le_site
	$combo_sur_le_site = new DataCombo;
	// combobox: par_le_membre
	$combo_par_le_membre = new DataCombo;
	// combobox: du_bac
	$combo_du_bac = new Combo;
	$combo_du_bac->ListType = 0;
	$combo_du_bac->MultipleSeparator = ', ';
	$combo_du_bac->ListBoxHeight = 10;
	$combo_du_bac->RadiosPerLine = 1;
	if(is_file(dirname(__FILE__).'/hooks/transferts.du_bac.csv')) {
		$du_bac_data = addslashes(implode('', @file(dirname(__FILE__).'/hooks/transferts.du_bac.csv')));
		$combo_du_bac->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions($du_bac_data)));
		$combo_du_bac->ListData = $combo_du_bac->ListItem;
	}else{
		$combo_du_bac->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions("D&#233;p&#244;t;;Fermentation;;Maturation;;Affinage")));
		$combo_du_bac->ListData = $combo_du_bac->ListItem;
	}
	$combo_du_bac->SelectName = 'du_bac';
	// combobox: vers_bac
	$combo_vers_bac = new Combo;
	$combo_vers_bac->ListType = 0;
	$combo_vers_bac->MultipleSeparator = ', ';
	$combo_vers_bac->ListBoxHeight = 10;
	$combo_vers_bac->RadiosPerLine = 1;
	if(is_file(dirname(__FILE__).'/hooks/transferts.vers_bac.csv')) {
		$vers_bac_data = addslashes(implode('', @file(dirname(__FILE__).'/hooks/transferts.vers_bac.csv')));
		$combo_vers_bac->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions($vers_bac_data)));
		$combo_vers_bac->ListData = $combo_vers_bac->ListItem;
	}else{
		$combo_vers_bac->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions("D&#233;p&#244;t;;Fermentation;;Maturation;;Affinage")));
		$combo_vers_bac->ListData = $combo_vers_bac->ListItem;
	}
	$combo_vers_bac->SelectName = 'vers_bac';

	if($selected_id) {
		// mm: check member permissions
		if(!$arrPerm[2]) {
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='transferts' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='transferts' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID) {
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID) {
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3) {
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("SELECT * FROM `transferts` WHERE `id`='" . makeSafe($selected_id) . "'", $eo);
		if(!($row = db_fetch_array($res))) {
			return error_message($Translation['No records found'], 'transferts_view.php', false);
		}
		$combo_sur_le_site->SelectedData = $row['sur_le_site'];
		$combo_par_le_membre->SelectedData = $row['par_le_membre'];
		$combo_du_bac->SelectedData = $row['du_bac'];
		$combo_vers_bac->SelectedData = $row['vers_bac'];
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
	} else {
		$combo_sur_le_site->SelectedData = $filterer_sur_le_site;
		$combo_par_le_membre->SelectedData = $filterer_par_le_membre;
		$combo_du_bac->SelectedText = ( $_REQUEST['FilterField'][1]=='5' && $_REQUEST['FilterOperator'][1]=='<=>' ? (get_magic_quotes_gpc() ? stripslashes($_REQUEST['FilterValue'][1]) : $_REQUEST['FilterValue'][1]) : "");
		$combo_vers_bac->SelectedText = ( $_REQUEST['FilterField'][1]=='6' && $_REQUEST['FilterOperator'][1]=='<=>' ? (get_magic_quotes_gpc() ? stripslashes($_REQUEST['FilterValue'][1]) : $_REQUEST['FilterValue'][1]) : "");
	}
	$combo_sur_le_site->HTML = '<span id="sur_le_site-container' . $rnd1 . '"></span><input type="hidden" name="sur_le_site" id="sur_le_site' . $rnd1 . '" value="' . html_attr($combo_sur_le_site->SelectedData) . '">';
	$combo_sur_le_site->MatchText = '<span id="sur_le_site-container-readonly' . $rnd1 . '"></span><input type="hidden" name="sur_le_site" id="sur_le_site' . $rnd1 . '" value="' . html_attr($combo_sur_le_site->SelectedData) . '">';
	$combo_par_le_membre->HTML = '<span id="par_le_membre-container' . $rnd1 . '"></span><input type="hidden" name="par_le_membre" id="par_le_membre' . $rnd1 . '" value="' . html_attr($combo_par_le_membre->SelectedData) . '">';
	$combo_par_le_membre->MatchText = '<span id="par_le_membre-container-readonly' . $rnd1 . '"></span><input type="hidden" name="par_le_membre" id="par_le_membre' . $rnd1 . '" value="' . html_attr($combo_par_le_membre->SelectedData) . '">';
	$combo_du_bac->Render();
	$combo_vers_bac->Render();

	ob_start();
	?>

	<script>
		// initial lookup values
		AppGini.current_sur_le_site__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['sur_le_site'] : $filterer_sur_le_site); ?>"};
		AppGini.current_par_le_membre__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['par_le_membre'] : $filterer_par_le_membre); ?>"};

		jQuery(function() {
			setTimeout(function() {
				if(typeof(sur_le_site_reload__RAND__) == 'function') sur_le_site_reload__RAND__();
				if(typeof(par_le_membre_reload__RAND__) == 'function') par_le_membre_reload__RAND__();
			}, 10); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
		function sur_le_site_reload__RAND__() {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#sur_le_site-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_sur_le_site__RAND__.value, t: 'transferts', f: 'sur_le_site' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="sur_le_site"]').val(resp.results[0].id);
							$j('[id=sur_le_site-container-readonly__RAND__]').html('<span id="sur_le_site-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=site_compostage_view_parent]').hide(); }else{ $j('.btn[id=site_compostage_view_parent]').show(); }


							if(typeof(sur_le_site_update_autofills__RAND__) == 'function') sur_le_site_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term) { /* */ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page) { /* */ return { s: term, p: page, t: 'transferts', f: 'sur_le_site' }; },
					results: function(resp, page) { /* */ return resp; }
				},
				escapeMarkup: function(str) { /* */ return str; }
			}).on('change', function(e) {
				AppGini.current_sur_le_site__RAND__.value = e.added.id;
				AppGini.current_sur_le_site__RAND__.text = e.added.text;
				$j('[name="sur_le_site"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=site_compostage_view_parent]').hide(); }else{ $j('.btn[id=site_compostage_view_parent]').show(); }


				if(typeof(sur_le_site_update_autofills__RAND__) == 'function') sur_le_site_update_autofills__RAND__();
			});

			if(!$j("#sur_le_site-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_sur_le_site__RAND__.value, t: 'transferts', f: 'sur_le_site' },
					success: function(resp) {
						$j('[name="sur_le_site"]').val(resp.results[0].id);
						$j('[id=sur_le_site-container-readonly__RAND__]').html('<span id="sur_le_site-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=site_compostage_view_parent]').hide(); }else{ $j('.btn[id=site_compostage_view_parent]').show(); }

						if(typeof(sur_le_site_update_autofills__RAND__) == 'function') sur_le_site_update_autofills__RAND__();
					}
				});
			}

		<?php }else{ ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_sur_le_site__RAND__.value, t: 'transferts', f: 'sur_le_site' },
				success: function(resp) {
					$j('[id=sur_le_site-container__RAND__], [id=sur_le_site-container-readonly__RAND__]').html('<span id="sur_le_site-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=site_compostage_view_parent]').hide(); }else{ $j('.btn[id=site_compostage_view_parent]').show(); }

					if(typeof(sur_le_site_update_autofills__RAND__) == 'function') sur_le_site_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function par_le_membre_reload__RAND__() {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#par_le_membre-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_par_le_membre__RAND__.value, t: 'transferts', f: 'par_le_membre' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="par_le_membre"]').val(resp.results[0].id);
							$j('[id=par_le_membre-container-readonly__RAND__]').html('<span id="par_le_membre-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=membres_view_parent]').hide(); }else{ $j('.btn[id=membres_view_parent]').show(); }


							if(typeof(par_le_membre_update_autofills__RAND__) == 'function') par_le_membre_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term) { /* */ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page) { /* */ return { s: term, p: page, t: 'transferts', f: 'par_le_membre' }; },
					results: function(resp, page) { /* */ return resp; }
				},
				escapeMarkup: function(str) { /* */ return str; }
			}).on('change', function(e) {
				AppGini.current_par_le_membre__RAND__.value = e.added.id;
				AppGini.current_par_le_membre__RAND__.text = e.added.text;
				$j('[name="par_le_membre"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=membres_view_parent]').hide(); }else{ $j('.btn[id=membres_view_parent]').show(); }


				if(typeof(par_le_membre_update_autofills__RAND__) == 'function') par_le_membre_update_autofills__RAND__();
			});

			if(!$j("#par_le_membre-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_par_le_membre__RAND__.value, t: 'transferts', f: 'par_le_membre' },
					success: function(resp) {
						$j('[name="par_le_membre"]').val(resp.results[0].id);
						$j('[id=par_le_membre-container-readonly__RAND__]').html('<span id="par_le_membre-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=membres_view_parent]').hide(); }else{ $j('.btn[id=membres_view_parent]').show(); }

						if(typeof(par_le_membre_update_autofills__RAND__) == 'function') par_le_membre_update_autofills__RAND__();
					}
				});
			}

		<?php }else{ ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_par_le_membre__RAND__.value, t: 'transferts', f: 'par_le_membre' },
				success: function(resp) {
					$j('[id=par_le_membre-container__RAND__], [id=par_le_membre-container-readonly__RAND__]').html('<span id="par_le_membre-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=membres_view_parent]').hide(); }else{ $j('.btn[id=membres_view_parent]').show(); }

					if(typeof(par_le_membre_update_autofills__RAND__) == 'function') par_le_membre_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	if($dvprint) {
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/transferts_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	}else{
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/transferts_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Transfert details', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert) {
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return transferts_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return transferts_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']) {
		$backAction = 'AppGini.closeParentModal(); return false;';
	}else{
		$backAction = '$j(\'form\').eq(0).attr(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id) {
		if(!$_REQUEST['Embedded']) $templateCode = str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$j(\'form\').eq(0).prop(\'novalidate\', true); document.myform.reset(); return true;" title="' . html_attr($Translation['Print Preview']) . '"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate) {
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return transferts_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3) { // allow delete?
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');" title="' . html_attr($Translation['Delete']) . '"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)) {
		$jsReadOnly .= "\tjQuery('#sur_le_site').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#sur_le_site_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#par_le_membre').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#par_le_membre_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#jour_heure').parents('.input-group').replaceWith('<div class=\"form-control-static\" id=\"jour_heure\">' + (jQuery('#jour_heure').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#du_bac').replaceWith('<div class=\"form-control-static\" id=\"du_bac\">' + (jQuery('#du_bac').val() || '') + '</div>'); jQuery('#du_bac-multi-selection-help').hide();\n";
		$jsReadOnly .= "\tjQuery('#vers_bac').replaceWith('<div class=\"form-control-static\" id=\"vers_bac\">' + (jQuery('#vers_bac').val() || '') + '</div>'); jQuery('#vers_bac-multi-selection-help').hide();\n";
		$jsReadOnly .= "\tjQuery('#quantite').replaceWith('<div class=\"form-control-static\" id=\"quantite\">' + (jQuery('#quantite').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif($AllowInsert) {
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
		$locale = isset($Translation['datetimepicker locale']) ? ", locale: '{$Translation['datetimepicker locale']}'" : '';
		$jsEditable .= "\tjQuery('#jour_heure').addClass('always_shown').parents('.input-group').datetimepicker({ toolbarPlacement: 'top', sideBySide: true, showClear: true, showTodayButton: true, showClose: true, icons: { close: 'glyphicon glyphicon-ok' }, format: AppGini.datetimeFormat('dt') {$locale} });";
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(sur_le_site)%%>', $combo_sur_le_site->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(sur_le_site)%%>', $combo_sur_le_site->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(sur_le_site)%%>', urlencode($combo_sur_le_site->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(par_le_membre)%%>', $combo_par_le_membre->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(par_le_membre)%%>', $combo_par_le_membre->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(par_le_membre)%%>', urlencode($combo_par_le_membre->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(du_bac)%%>', $combo_du_bac->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(du_bac)%%>', $combo_du_bac->SelectedData, $templateCode);
	$templateCode = str_replace('<%%COMBO(vers_bac)%%>', $combo_vers_bac->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(vers_bac)%%>', $combo_vers_bac->SelectedData, $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array('sur_le_site' => array('site_compostage', 'Sur le site'), 'par_le_membre' => array('membres', 'Par le technicien'), );
	foreach($lookup_fields as $luf => $ptfc) {
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']) {
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-md" id="' . $ptfc[0] . '_view_parent" title="' . html_attr($Translation['View'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']) {
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent hspacer-md" id="' . $ptfc[0] . '_add_new" title="' . html_attr($Translation['Add New'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode = str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(sur_le_site)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(par_le_membre)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(jour_heure)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(du_bac)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(vers_bac)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(quantite)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(cree_par)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(date_maj)%%>', '', $templateCode);

	// process values
	if($selected_id) {
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(sur_le_site)%%>', safe_html($urow['sur_le_site']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(sur_le_site)%%>', html_attr($row['sur_le_site']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(sur_le_site)%%>', urlencode($urow['sur_le_site']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(par_le_membre)%%>', safe_html($urow['par_le_membre']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(par_le_membre)%%>', html_attr($row['par_le_membre']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(par_le_membre)%%>', urlencode($urow['par_le_membre']), $templateCode);
		$templateCode = str_replace('<%%VALUE(jour_heure)%%>', app_datetime($row['jour_heure'], 'dt'), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(jour_heure)%%>', urlencode(app_datetime($urow['jour_heure'], 'dt')), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(du_bac)%%>', safe_html($urow['du_bac']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(du_bac)%%>', html_attr($row['du_bac']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(du_bac)%%>', urlencode($urow['du_bac']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(vers_bac)%%>', safe_html($urow['vers_bac']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(vers_bac)%%>', html_attr($row['vers_bac']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(vers_bac)%%>', urlencode($urow['vers_bac']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(quantite)%%>', safe_html($urow['quantite']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(quantite)%%>', html_attr($row['quantite']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(quantite)%%>', urlencode($urow['quantite']), $templateCode);
		$templateCode = str_replace('<%%VALUE(cree_par)%%>', safe_html($urow['cree_par']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cree_par)%%>', urlencode($urow['cree_par']), $templateCode);
		$templateCode = str_replace('<%%VALUE(date_maj)%%>', safe_html($urow['date_maj']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(date_maj)%%>', urlencode($urow['date_maj']), $templateCode);
	}else{
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(sur_le_site)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(sur_le_site)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(par_le_membre)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(par_le_membre)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(jour_heure)%%>', '<%%creationDateTime%%>', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(jour_heure)%%>', urlencode('<%%creationDateTime%%>'), $templateCode);
		$templateCode = str_replace('<%%VALUE(du_bac)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(du_bac)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(vers_bac)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(vers_bac)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(quantite)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(quantite)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(cree_par)%%>', '<%%creatorUsername%%>', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cree_par)%%>', urlencode('<%%creatorUsername%%>'), $templateCode);
		$templateCode = str_replace('<%%VALUE(date_maj)%%>', '<%%editingTimestamp%%>', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(date_maj)%%>', urlencode('<%%editingTimestamp%%>'), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans) {
		$templateCode = str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode = str_replace('<%%', '<!-- ', $templateCode);
	$templateCode = str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == '') {
		$templateCode .= "\n\n<script>\$j(function() {\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption) {
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id) {
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	/* default field values */
	$rdata = $jdata = get_defaults('transferts');
	if($selected_id) {
		$jdata = get_joined_record('transferts', $selected_id);
		if($jdata === false) $jdata = get_defaults('transferts');
		$rdata = $row;
	}
	$templateCode .= loadView('transferts-ajax-cache', array('rdata' => $rdata, 'jdata' => $jdata));

	// hook: transferts_dv
	if(function_exists('transferts_dv')) {
		$args=array();
		transferts_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>