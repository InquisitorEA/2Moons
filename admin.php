<?php

##############################################################################
# *                                                                          #
# * 2MOONS                                                                   #
# *                                                                          #
# * @copyright Copyright (C) 2010 By ShadoX from titanspace.de               #
# *                                                                          #
# *	                                                                         #
# *  This program is free software: you can redistribute it and/or modify    #
# *  it under the terms of the GNU General Public License as published by    #
# *  the Free Software Foundation, either version 3 of the License, or       #
# *  (at your option) any later version.                                     #
# *	                                                                         #
# *  This program is distributed in the hope that it will be useful,         #
# *  but WITHOUT ANY WARRANTY; without even the implied warranty of          #
# *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           #
# *  GNU General Public License for more details.                            #
# *                                                                          #
##############################################################################

define('INSIDE'  , true);
define('INSTALL' , false);
define('IN_ADMIN', true);

define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');

require_once(ROOT_PATH . 'extension.inc');
require_once(ROOT_PATH . 'common.' . PHP_EXT);

if ($USER['authlevel'] < AUTH_MOD) exit;

if(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != $USER['password'])
{
	include_once(ROOT_PATH . 'includes/pages/adm/ShowLoginPage.' . PHP_EXT);
	ShowLoginPage();
	exit;
}

$page = request_var('page', '');
$uni = request_var('uni', 0);

if($USER['authlevel'] == AUTH_ADM && !empty($uni))
	$_SESSION['adminuni'] = $uni;
if(empty($_SESSION['adminuni']))
	$_SESSION['adminuni'] = $UNI;

switch($page)
{
	case 'infos':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowInformationPage.php');
		ShowInformationPage();
	break;
	case 'rights':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowRightsPage.php');
		ShowRightsPage();
	break;
	case 'config':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowConfigPage.php');
		ShowConfigPage();
	break;
	case 'teamspeak':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowTeamspeakPage.php');
		ShowTeamspeakPage();
	break;
	case 'facebook':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowFacebookPage.php');
		ShowFacebookPage();
	break;
	case 'module':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowModulePage.php');
		ShowModulePage();
	break;
	case 'statsconf':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowStatsPage.php');
		ShowStatsPage();
	break;
	case 'update':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowUpdatePage.php');
		ShowUpdatePage();
	break;
	case 'create':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowCreatorPage.php');
		ShowCreatorPage();
	break;
	case 'accounteditor':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowAccountEditorPage.php');
		ShowAccountEditorPage();
	break;
	case 'active':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowActivePage.php');
		ShowActivePage();
	break;
	case 'bans':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowBanPage.php');
		ShowBanPage();
	break;
	case 'messagelist':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowMessageListPage.php');
		ShowMessageListPage();
	break;
	case 'globalmessage':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowSendMessagesPage.php');
		ShowSendMessagesPage();
	break;
	case 'fleets':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowFlyingFleetPage.php');
		ShowFlyingFleetPage();
	break;
	case 'accountdata':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowAccountDataPage.php');
		ShowAccountDataPage();
	break;
	case 'support':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowSupportPage.php');
		ShowSupportPage();
	break;
	case 'password':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowPassEncripterPage.php');
		ShowPassEncripterPage();
	break;
	case 'search':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowSearchPage.php');
		ShowSearchPage();
	break;
	case 'qeditor':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowQuickEditorPage.php');
		ShowQuickEditorPage();
	break;
	case 'statsupdate':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowStatUpdatePage.php');
		ShowStatUpdatePage();
	break;
	case 'reset':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowResetPage.php');
		ShowResetPage();
	break;
	case 'news':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowNewsPage.php');
		ShowNewsPage();
	break;
	case 'topnav':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowTopnavPage.php');
		ShowTopnavPage();
	break;
	case 'mods':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowModVersionPage.php');
		ShowModVersionPage();
	break;
	case 'overview':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowOverviewPage.php');
		ShowOverviewPage();
	break;
	case 'menu':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowMenuPage.php');
		ShowMenuPage();
	break;
	case 'clearcache':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowClearCachePage.php');
		ShowClearCachePage();
	break;
	case 'universe':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowUniversePage.php');
		ShowUniversePage();
	break;
	case 'multiips':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowMultiIPPage.php');
		ShowMultiIPPage();
	break;
	default:
		include_once(ROOT_PATH . 'includes/pages/adm/ShowIndexPage.php');
		ShowIndexPage();
	break;
}

?>