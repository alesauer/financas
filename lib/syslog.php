<?php

define_syslog_variables();
openlog("messages", LOG_PID | LOG_PERROR, LOG_LOCAL0);
$access = date("Y/m/d H:i:s");
syslog(LOG_WARNING, "SAUER");
closelog();

?>
