<?php
define ("HOME_URL", $_ENV["HOME_URL"]);
define ("HOME_DIR", __DIR__."/../../");

define ("THEME_NAME", $_ENV["APPLICATION_THEME"]);
define ("THEME_URL", HOME_URL."/src/Views/".THEME_NAME."");
define ("THEME_DIR", HOME_DIR."/src/Views/".THEME_NAME."/");