<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'intervention';

		/* data for selected record, or defaults if none is selected */
		var data = {
			demande_par: <?php echo json_encode(array('id' => $rdata['demande_par'], 'value' => $rdata['demande_par'], 'text' => $jdata['demande_par'])); ?>,
			realise_par: <?php echo json_encode(array('id' => $rdata['realise_par'], 'value' => $rdata['realise_par'], 'text' => $jdata['realise_par'])); ?>,
			pour_site: <?php echo json_encode(array('id' => $rdata['pour_site'], 'value' => $rdata['pour_site'], 'text' => $jdata['pour_site'])); ?>,
			pour_bac: <?php echo json_encode(array('id' => $rdata['pour_bac'], 'value' => $rdata['pour_bac'], 'text' => $jdata['pour_bac'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for demande_par */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'demande_par' && d.id == data.demande_par.id)
				return { results: [ data.demande_par ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for realise_par */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'realise_par' && d.id == data.realise_par.id)
				return { results: [ data.realise_par ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for pour_site */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'pour_site' && d.id == data.pour_site.id)
				return { results: [ data.pour_site ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for pour_bac */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'pour_bac' && d.id == data.pour_bac.id)
				return { results: [ data.pour_bac ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

