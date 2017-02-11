<?php

$date = date('Y-m-d', time());

$command = 'mysqldump -ucodegeas_backup -pMilitary1! codegeas_smf > /home6/codegeas/forumBackups/'.$date.'.sql';

system($command);

?>