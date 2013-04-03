<?php

namespace Classes;

if( isset ($_SERVER[ 'SCRIPT_FILENAME' ]) and 1===2 ){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="en"
    lang="en"
    dir="ltr">
<head>
<link rel="icon" href="./favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
<title>Initiate Jobs</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

}


require_once  'global.inc.php';

$oInitiateJobsTask = new InitiateJobsTask( $oDi );


try {
	$iJobQueueId = $oInitiateJobsTask->Execute();

} catch (Exception $e) {
 // Write to log
}

/* Initiation of the Job was successful so start import of the CSV */

require '2_ImportCsvIntoDbJob.php';


if( isset ($_SERVER[ 'SCRIPT_FILENAME' ])  and 1===2 ){
	?>
</body>
</html>
<?php

}

?>
