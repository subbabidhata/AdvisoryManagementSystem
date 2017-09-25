<?php

require_once("config.php");


//Prevent the user visiting the logged in page if he/she is already logged in
/*if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }*/

print_r($_POST);

//Forms posted
if(!empty($_POST))
{
    $errors = array();
    $email = trim($_POST["email"]);
    $astudent = trim($_POST["astudent"]);
    $aadvisor = trim($_POST["aadvisor"]);
    $atime = trim($_POST["atime"]);
    $adate = trim($_POST["adate"]);


   

    if($aadvisor == "")
    {
        $errors[] = "enter valid advisor";
    }

    if($atime == "")
    {
        $errors[] = "enter valid time";
    }

    if($adate == "")
    {
        $errors[] = "enter valid date";
    }


    //End data validation
    if(count($errors) == 0)
    {

        $user = createNewAppStudent( $aadvisor, $atime, $adate);
        print_r($user);
        if($user <> 1){
            $errors[] = "appointment error";
        }
    }
    if(count($errors) == 0) {
        $successes[] = "appointment successful";
    }
}

require_once("headermenu.php");
echo "
<body>
<div id='wrapper'>

<div id='content'>

<h2>Add Appointment</h2>

<div id='left-nav'>";
/*include("index.php");*/
echo "
</div>

<div id='main'>";



echo "
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<table>
<tr><td><label>Advisor ID:</label></td><td><input type='text' name='aadvisor' /></td></tr>
<tr><td><label>Time:</label></td><td><input type=text name=atime placeholder=\"hh:mm\"  maxlength=30></td></tr>

<tr><td><label>Date:</label></td><td><input type=text name=adate placeholder=\"yy/dd/mm\" maxlength=30></td></tr>

<tr height='50px'><td colspan='2' align='center'><input type='submit' value='Submit'/></td></tr>






</table>
</form>
</div>

</div>
<div id='bottom'></div>
</div>
</body>
</html>";
?>

<?php

$allrecords = listActiveAdvisor(); ?>
<h3> List Advisor</h3>

<?php
foreach($allrecords as $displayRecords) { ?>
    <tr>
        <td><?php print $displayRecords['UserID']; ?></td><br/>

    </tr>
<?php } ?>
