<?php


require_once("config.php");

require_once ("headermenu.php");

echo "
<body>

<div id='left-nav'>";

include("Menu.php");

echo "
</div>
<div id='main'>
<br><br><br>
Hey, $loggedInUser->first_name $loggedInUser->last_name.



This is an example page designed to demonstrate user authentication examples.
Just so you know, you registered this account on " . date("M d, Y", $loggedInUser->member_since) . ".
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
