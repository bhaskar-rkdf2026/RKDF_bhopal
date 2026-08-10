<?php function scan($dir){foreach(glob("$dir/*") as $f){if(is_dir($f))scan($f);else if(preg_match("/.(sql|zip|gz|rar|bak|db)$/i",$f))echo "$f\
";}}scan(".");?>
