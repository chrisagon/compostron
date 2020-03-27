<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bacs_du_site';

		/* data for selected record, or defaults if none is selected */
		var data = {
			appartient_site: <?php echo json_encode(array('id' => $rdata['appartient_site'], 'value' => $rdata['appartient_site'], 'text' => $jdata['appartient_site'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for appartient_site */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'appartient_site' && d.id == data.appartient_site.id)
				return { results: [ data.appartient_site ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

