<?php

require_once("config.php");


//Prevent the user visiting the logged in page if he/she is already logged in
/*if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }*/

print_r($_POST);

//Forms posted
/*if(!empty($_POST))
{
    $errors = array();
    $astudent = trim($_POST["astudent"]);
    $aadvisor = trim($_POST["aadvisor"]);
    $atime = trim($_POST["atime"]);
    $adate = trim($_POST["adate"]);


    if($astudent== "")
    {
        $errors[] = "enter valid student";
    }

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

        $user = createNewApp($astudent, $aadvisor, $atime, $adate);
        print_r($user);
        if($user <> 1){
            $errors[] = "appointment error";
        }
    }
    if(count($errors) == 0) {
        $successes[] = "appointment successful";
    }
}*/

/*require_once("header.php");
echo "
 <body>
 <div id='wrapper'>

<div id='content'>

<h2>Add Appointment</h2>

<div id='left-nav'>";
/*include("index.php");*/

/*echo "
</div>

<div id='main'>";

echo "<pre>";
print_r($errors);
print_r($successes);
echo "</pre>";

echo "
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<p><label>User Name:</label><input type='text' name='astudent' /></p>

<p><label>Advisor Name:</label><input type='text' name='aadvisor' /></p>

<p><label>Time:</label><input type=text name=atime placeholder=\"hh:mm\" size=30 maxlength=30></p>

<p><label>Date:</label><input type=text name=adate placeholder=\"yy/dd/mm\" size=30 maxlength=30></p>


<label>&nbsp;<br>
<input type='submit' value='Submit'/>
</p>

</form>
</div>

</div>
<div id='bottom'></div>
</div>
</body>
</html>";*/
$allrecords = fetchAllUsersAdvisor();
?>





<html>
<body>


<h1> List of Students</h1> <br/>

<?php
foreach($allrecords as $displayRecords) { ?>
    <tr>
        <td><?php print $displayRecords['UserID']; ?></td><br/>

    </tr>
<?php } ?>


<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<p><label>User ID:</label>
    <select>
        <?php
        foreach($allrecords as $displayRecords) { ?>
                <option value="<?php print $displayRecords['UserID']; ?>"</option>

            </tr>
        <?php } ?>
    </select></p>

<p><label>Advisor Name:</label><input type='text' name='aadvisor' /></p>

<p><label>Time:</label><input type=text name=atime placeholder=\"hh:mm\" size=30 maxlength=30></p>

<p><label>Date:</label><input type=text name=adate placeholder=\"yy/dd/mm\" size=30 maxlength=30></p>


<label>&nbsp;<br>
    <input type='submit' value='Submit'/></p></form>




</body>
</html>


<?php
/*foreach($allrecords as $displayRecords) { ?>
    <tr>
        <td><?php print $displayRecords['UserID']; ?></td><br/>
        <option value="<?php print $displayRecords['UserID']; ?>"</option>

    </tr>
<?php } ?>