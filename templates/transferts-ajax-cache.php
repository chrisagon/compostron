<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'transferts';

		/* data for selected record, or defaults if none is selected */
		var data = {
			sur_le_site: <?php echo json_encode(array('id' => $rdata['sur_le_site'], 'value' => $rdata['sur_le_site'], 'text' => $jdata['sur_le_site'])); ?>,
			par_le_membre: <?php echo json_encode(array('id' => $rdata['par_le_membre'], 'value' => $rdata['par_le_membre'], 'text' => $jdata['par_le_membre'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for sur_le_site */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'sur_le_site' && d.id == data.sur_le_site.id)
				return { results: [ data.sur_le_site ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for par_le_membre */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'par_le_membre' && d.id == data.par_le_membre.id)
				return { results: [ data.par_le_membre ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

