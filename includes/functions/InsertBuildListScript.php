<?php

##############################################################################
# *																			 #
# * XG PROYECT																 #
# *  																		 #
# * @copyright Copyright (C) 2008 - 2009 By lucky from Xtreme-gameZ.com.ar	 #
# *																			 #
# *																			 #
# *  This program is free software: you can redistribute it and/or modify    #
# *  it under the terms of the GNU General Public License as published by    #
# *  the Free Software Foundation, either version 3 of the License, or       #
# *  (at your option) any later version.									 #
# *																			 #
# *  This program is distributed in the hope that it will be useful,		 #
# *  but WITHOUT ANY WARRANTY; without even the implied warranty of			 #
# *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the			 #
# *  GNU General Public License for more details.							 #
# *																			 #
##############################################################################

if(!defined('INSIDE')) die('Hacking attempt!');

	function InsertBuildListScript ($CallProgram)
	{
		global $LNG;

		$BuildListScript  = "<script type=\"text/javascript\">\n";
		$BuildListScript .= "<!--\n";
		$BuildListScript .= "function t() {\n";
		$BuildListScript .= "	v           = new Date();\n";
		$BuildListScript .= "	var blc     = document.getElementById('blc');\n";
		$BuildListScript .= "	var timeout = 1;\n";
		$BuildListScript .= "	n           = new Date();\n";
		$BuildListScript .= "	ss          = pp;\n";
		$BuildListScript .= "	aa          = Math.round( (n.getTime() - v.getTime() ) / 1000. );\n";
		$BuildListScript .= "	s           = ss - aa;\n";
		$BuildListScript .= "	m           = 0;\n";
		$BuildListScript .= "	h           = 0;\n\n";
		$BuildListScript .= "	if ( (ss + 3) < aa ) {\n";
		$BuildListScript .= "		blc.innerHTML = \"".$LNG['bd_finished']."<br>\" + \"<a href=?page=". $CallProgram .">".$LNG['bd_continue']."</\" + \"a>\";\n";
		$BuildListScript .= "		document.location.href=\"game.php?page=". $CallProgram ."\";\n";
		$BuildListScript .= "		timeout = 0;\n";
		$BuildListScript .= "	} else {\n";
		$BuildListScript .= "		if ( s < 0 ) {\n";
		$BuildListScript .= "			timeout = 0;\n";
		$BuildListScript .= "			document.location.href=\"game.php?page=". $CallProgram ."\";\n";
		$BuildListScript .= "			blc.innerHTML = \"".$LNG['bd_finished']."<br>\" + \"<a href=?page=". $CallProgram .">".$LNG['bd_continue']."</\" + \"a>\";\n";
		$BuildListScript .= "		} else {\n";
		$BuildListScript .= "			if ( s > 59) {\n";
		$BuildListScript .= "				m = Math.floor( s / 60);\n";
		$BuildListScript .= "				s = s - m * 60;\n";
		$BuildListScript .= "			}\n";
		$BuildListScript .= "			if ( m > 59) {\n";
		$BuildListScript .= "				h = Math.floor( m / 60);\n";
		$BuildListScript .= "				m = m - h * 60;\n";
		$BuildListScript .= "			}\n";
		$BuildListScript .= "			if ( s < 10 ) {\n";
		$BuildListScript .= "				s = \"0\" + s;\n";
		$BuildListScript .= "			}\n";
		$BuildListScript .= "			if ( m < 10 ) {\n";
		$BuildListScript .= "				m = \"0\" + m;\n";
		$BuildListScript .= "			}\n";
		$BuildListScript .= "			if (1) {\n";
		$BuildListScript .= "				blc.innerHTML = h + \":\" + m + \":\" + s + \"<br><a href=?page=buildings&cmd=cancel>".$LNG['bd_cancel']."</\" + \"a>\";\n";
		$BuildListScript .= "			} else {\n";
		$BuildListScript .= "				blc.innerHTML = h + \":\" + m + \":\" + s + \"<br><a href=?page=buildings&cmd=cancel>".$LNG['bd_cancel']."</\" + \"a>\";\n";
		$BuildListScript .= "			}\n";
		$BuildListScript .= "		}\n";
		$BuildListScript .= "		pp = pp - 1;\n";
		$BuildListScript .= "		if (timeout == 1) {\n";
		$BuildListScript .= "			window.setTimeout(\"t();\", 999);\n";
		$BuildListScript .= "		}\n";
		$BuildListScript .= "	}\n";
		$BuildListScript .= "}\n";
		$BuildListScript .= "//-->\n";
		$BuildListScript .= "</script>\n";

		return $BuildListScript;
	}

?>