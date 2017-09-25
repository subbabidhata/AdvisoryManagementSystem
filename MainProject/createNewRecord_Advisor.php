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
    $username = trim($_POST["username"]);
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $password = trim($_POST["password"]);
    $confirm_pass = trim($_POST["passwordc"]);


    if($username == "")
    {
        $errors[] = "enter valid username";
    }

    if($firstname == "")
    {
        $errors[] = "enter valid first name";
    }

    if($lastname == "")
    {
        $errors[] = "enter valid last name";
    }


    if($password =="" && $confirm_pass =="")
    {
        $errors[] = "enter password";
    }
    else if($password != $confirm_pass)
    {
        $errors[] = "password do not match";
    }

    //End data validation
    if(count($errors) == 0)
    {


        $user = createNewUserAdvisor($username, $firstname, $lastname, $email, $password);
        print_r($user);
        if($user <> 1){
            $errors[] = "registration error";
        }
    }
    if(count($errors) == 0) {
        $successes[] = "registration successful";
    }
}

require_once("headermenu.php");
echo "
<body>
<div id='wrapper'>

<div id='content'>





<div id='main'>";


echo "</pre>";

echo "
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<table align='center'>
<tr><td colspan='2' align='center'>
<font SIZE=6 color=Green>CREATE A NEW ADVISOR REGISTER</font></td></tr>


<tr><td>
<label>User Name:</label></td><td><input type='text' name='username' /></td></tr>

<tr><td>
<label>First Name:</label></td>
<td>
<input type='text' name='firstname' />
</td></tr>
<tr><td>

<label>LastName Name:</label></td><td>
<input type='text' name='lastname' />
</td></tr>
<tr><td><label>Password:</label></td><td>
<input type='password' name='password' />
</td></tr>
<tr><td><label>Confirm Password:</label></td><td>
<input type='password' name='passwordc' />
</td></tr>
<tr><td><label>Email:</label></td><td>
<input type='text' name='email' />
</td></tr>

<tr><td  colspan='2' align='center'><input type='submit' value='Register'/></td></tr>

</form>
</div>

</div>
<div id='bottom'></div>
</div>
</table>
</body>
</html>";
?>




