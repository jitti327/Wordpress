<?php
	global $wpdb;
	$t1 = $wpdb->prefix . "state";
	$t2 = $wpdb->prefix . "district";
	DependentTable(
		'country_id',
		$t1,
		'country_id',
		empty($_REQUEST['state_id']) ? '' : $_REQUEST['state_id']
	);
	DependentTable(
		'state_id',
		$t1,
		'state_id',
		empty($_REQUEST['district_id']) ? '' : $_REQUEST['district_id']
	);
?>