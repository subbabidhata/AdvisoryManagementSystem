<?php

require_once("config.php");
require_once ("header.php");


//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	
	//Perform some validation

	if($username == "")
	{
		$errors[] = "enter username";
	}
	if($password == "")
	{
		$errors[] = "enter password";
	}

	if(count($errors) == 0)
	{
			//retrieve the records of the user who is trying to login
			$userdetails = fetchUserDetails($username);

			//See if the user's account is activated
			if($userdetails["Active"]==0)
			{
				$errors[] = "account inactive";
			}
			else
			{
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["Password"]);
				
				if($entered_pass != $userdetails["Password"])
				{

					$errors[] = "invalid password";
  				}
				else
				{
					//Passwords match! we're good to go'
					//Transfer some db data to the session object
					$loggedInUser->email = $userdetails["Email"];
					$loggedInUser->user_id = $userdetails["UserID"];
					$loggedInUser->hash_pw = $userdetails["Password"];
					$loggedInUser->first_name = $userdetails["FirstName"];
				    $loggedInUser->last_name = $userdetails["LastName"];
					$loggedInUser->username = $userdetails["UserName"];
				  	$loggedInUser->member_since = $userdetails["MemberSince"];
					$loggedInUser->role = $userdetails["role"];
					//pass the values of $loggedInUser into the session -
				  	// you can directly pass the values into the array as well.

					$_SESSION["ThisUser"] = $loggedInUser;

				  	//now that a session for this user is created
					//Redirect to this users account page
					header("Location: myaccount.php");
					die();
				}
			}

	}
}



echo "
<body>


<h2 align='center'>Login</h2>
<div id='left-nav'>";

/*include("left-nav.php");*/

echo "
</div>
<div id='main'>";



echo "
<div id='regbox'>
<form name='login' action='".$_SERVER['PHP_SELF']."' method='post' align='center'>
<p>
<label>Username:</label>
<input type='text' name='username' />
</p>
<p>
<label>Password:</label>
<input type='password' name='password' />
</p>
<p>
<label>&nbsp;</label>
<input type='submit' value='Login' class='submit' />
</p>
</form>
</div>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
