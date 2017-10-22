<?php 
/*
 *	                  ....
 *	                .:   '':.
 *	                ::::     ':..
 *	                ::.         ''..
 *	     .:'.. ..':.:::'    . :.   '':.
 *	    :.   ''     ''     '. ::::.. ..:
 *	    ::::.        ..':.. .''':::::  .
 *	    :::::::..    '..::::  :. ::::  :
 *	    ::'':::::::.    ':::.'':.::::  :
 *	    :..   ''::::::....':     ''::  :
 *	    :::::.    ':::::   :     .. '' .
 *	 .''::::::::... ':::.''   ..''  :.''''.
 *	 :..:::'':::::  :::::...:''        :..:
 *	 ::::::. '::::  ::::::::  ..::        .
 *	 ::::::::.::::  ::::::::  :'':.::   .''
 *	 ::: '::::::::.' '':::::  :.' '':  :
 *	 :::   :::::::::..' ::::  ::...'   .
 *	 :::  .::::::::::   ::::  ::::  .:'
 *	  '::'  '':::::::   ::::  : ::  :
 *	            '::::   ::::  :''  .:
 *	             ::::   ::::    ..''
 *	             :::: ..:::: .:''
 *	               ''''  '''''
 *	
 *
 *	AUTOMAD
 *
 *	Copyright (c) 2014-2017 by Marc Anton Dahmen
 *	http://marcdahmen.de
 *
 *	Licensed under the MIT license.
 *	http://automad.org/license
 */


namespace Automad\GUI;
use Automad\Core as Core;


defined('AUTOMAD') or die('Direct access not permitted!');


/*
 *	Return the current status of a config item.
 */


$output = array();


if (isset($_POST['item'])) {
	
	$item = $_POST['item'];
	
	if ($item == 'cache') {
		
		$tab = Core\Str::sanitize(Text::get('sys_cache'));
		$button = 'uk-button uk-width-1-1 uk-text-left';
		
		if (AM_CACHE_ENABLED) {
			$output['status'] = '<a href="?context=system_settings#' . $tab . '" class="' . $button . '">' .
					    '<i class="uk-icon-toggle-on uk-icon-justify"></i>&nbsp;&nbsp;' . 
					    Text::get('sys_status_cache_enabled') . 
					    '</a>';
		} else {
			$output['status'] = '<a href="?context=system_settings#' . $tab . '" class="' . $button . '">' .
					    '<i class="uk-icon-toggle-off uk-icon-justify"></i>&nbsp;&nbsp;' . 
					    Text::get('sys_status_cache_disabled') . 
					    '</a>';
		}
		
	}
	
	if ($item == 'debug') {
		
		$tab = Core\Str::sanitize(Text::get('sys_debug'));
		$button = 'uk-button uk-width-1-1 uk-text-left';
		
		if (AM_DEBUG_ENABLED) {
			$output['status'] = '<a href="?context=system_settings#' . $tab . '" class="' . $button . '">' .
					    '<i class="uk-icon-toggle-on uk-icon-justify"></i>&nbsp;&nbsp;' . 
					    Text::get('sys_status_debug_enabled') . 
					    '</a>';
		} else {
			$output['status'] = '<a href="?context=system_settings#' . $tab . '" class="' . $button . '">' .
					    '<i class="uk-icon-toggle-off uk-icon-justify"></i>&nbsp;&nbsp;' . 
					    Text::get('sys_status_debug_disabled') . 
					    '</a>';
		}
		
	}
	
	if ($item == 'update') {
		
		$tab = Core\Str::sanitize(Text::get('sys_update'));
		$updateVersion = Update::getVersion();
		
		if (version_compare(AM_VERSION, $updateVersion, '<')) {
			$output['status'] = '<a href="?context=system_settings#' . $tab . '" class="uk-button uk-button-small uk-text-truncate">' .
					    '<span class="uk-hidden-small"><i class="uk-icon-refresh"></i>&nbsp;&nbsp;</span>' . 
					    Text::get('sys_status_update_available') . '&nbsp;&nbsp;' .
					    $updateVersion . 
					    '</a>';
		} else {
			$output['status'] = '<button class="uk-button uk-button-small uk-text-truncate" disabled>' .
					    '<i class="uk-icon-check"></i>&nbsp;&nbsp;' . 
					    Text::get('sys_status_update_not_available') . 
					    '</button>';
		}
		
	}
	
	if ($item == 'users') {
				
		$output['status'] = '<i class="uk-icon-users uk-icon-justify"></i>&nbsp;&nbsp;' . count(Accounts::get()) . ' ' . Text::get('sys_user_registered');

	}
	
}


echo json_encode($output);


?>