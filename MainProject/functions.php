<?php



//Generate a unique code
function getUniqueCode($length = "") {
    $code = md5(uniqid(rand(), TRUE));
      if ($length != "") {
        return substr($code, 0, $length);
      } else {
        return $code;
      }
  }

//Generate Hash
function generateHash($plainText, $salt = NULL) {
  if ($salt === NULL) {
    $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
  } else {
    $salt = substr($salt, 0, 25);
  }
  return $salt . sha1($salt . $plainText);
}

//Retrieve complete user information of all student
function listActiveStudent() {

    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		MemberSince,
		Active,
		role
		FROM ".$db_table_prefix."UserDetails
		where role =2 and active =1"
    );

    $stmt->execute();
    $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email,$MemberSince, $Active, $role);
    while ($stmt->fetch()){
        $row[] = array('UserID' => $UserID,
            'UserName' => $UserName,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role' => $role
        );
    }
    $stmt->close();
    return ($row);
}

//Retrieve complete user information of all advisor
function listActiveAdvisor() {

    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		MemberSince,
		Active,
		role
		FROM ".$db_table_prefix."UserDetails
		where role =3 and active =1"
    );

    $stmt->execute();
    $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email,$MemberSince, $Active, $role);
    while ($stmt->fetch()){
        $row[] = array('UserID' => $UserID,
            'UserName' => $UserName,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role' => $role
        );
    }
    $stmt->close();
    return ($row);
}




//Create new user default student
function createNewUser($username, $firstname, $lastname, $email, $password) {
  global $mysqli, $db_table_prefix;
  //Generate A random userid

  $character_array = array_merge(range(a, z), range(0, 9));
  $rand_string = "";
  for ($i = 0; $i < 6; $i++) {
    $rand_string .= $character_array[rand(
      0, (count($character_array) - 1)
    )];
  }
  //echo $rand_string;
  //echo $username;
  //echo $firstname;
  //echo $lastname;
  //echo $email;
  //echo $password;

  $newpassword = generateHash($password);

  //echo $newpassword;

  $stmt = $mysqli->prepare(
    "INSERT INTO " . $db_table_prefix . "UserDetails (
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
        '" . time() . "',
        1
		)"
  );
  $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $newpassword);
  //print_r($stmt);
  $result = $stmt->execute();
  //print_r($result);
  $stmt->close();
  return $result;

}

//create new Student
function createNewUserStudent($username, $firstname, $lastname, $email, $password) {
    global $mysqli, $db_table_prefix;
    //Generate A random userid

    $character_array = array_merge(range(a, z), range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 6; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }
    //echo $rand_string;
    //echo $username;
    //echo $firstname;
    //echo $lastname;
    //echo $email;
    //echo $password;

    $newpassword = generateHash($password);

    //echo $newpassword;

    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "UserDetails (
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active,
		role
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
        '" . time() . "',
        1,
        2
		)"
    );
    $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $newpassword);
    //print_r($stmt);
    $result = $stmt->execute();
    //print_r($result);
    $stmt->close();
    return $result;

}

//create new Advisor
function createNewUserAdvisor($username, $firstname, $lastname, $email, $password) {
    global $mysqli, $db_table_prefix;
    //Generate A random userid

    $character_array = array_merge(range(a, z), range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 6; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }
    //echo $rand_string;
    //echo $username;
    //echo $firstname;
    //echo $lastname;
    //echo $email;
    //echo $password;

    $newpassword = generateHash($password);

    //echo $newpassword;

    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "UserDetails (
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active,
		role
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
        '" . time() . "',
        1,
        3
		)"
    );
    $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $newpassword);
    //print_r($stmt);
    $result = $stmt->execute();
    //print_r($result);
    $stmt->close();
    return $result;

}


//Retrieve complete user information of all student
function fetchAllUsersStudent() {

    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		MemberSince,
		Active,
		role
		FROM ".$db_table_prefix."UserDetails
		where role =2"
    );

    $stmt->execute();
    $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email,$MemberSince, $Active, $role);
    while ($stmt->fetch()){
        $row[] = array('UserID' => $UserID,
            'UserName' => $UserName,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role' => $role
        );
    }
    $stmt->close();
    return ($row);
}

//Retrieve complete user information of all advisor
function fetchAllUsersAdvisor() {

    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		MemberSince,
		Active,
		role
		FROM ".$db_table_prefix."UserDetails
		where role =3"
    );

    $stmt->execute();
    $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email,$MemberSince, $Active, $role);
    while ($stmt->fetch()){
        $row[] = array('UserID' => $UserID,
            'UserName' => $UserName,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role' => $role
        );
    }
    $stmt->close();
    return ($row);
}

function fetchThisUser($userid)
{
    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare(
       "SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		MemberSince,
		Active,
		role
		FROM ".$db_table_prefix."UserDetails
		where UserID =?
		LIMIT 1"
    );
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email,$MemberSince, $Active, $role);
    $stmt->execute();
    while ($stmt->fetch()) {
        $row[] = array(
            'UserID' => $UserID,
            'UserName' => $UserName,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role' => $role

        );
    }
    $stmt->close();
    return ($row);
}


//update user
function updateThisRecord($uname,$fname, $lname, $email, $membersince, $active, $role, $userid)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "UPDATE " . $db_table_prefix . "userdetails
		SET
		UserName = ?,
		FirstName = ?,
		LastName = ?,
		Email = ?,
		MemberSince = ?,
		Active = ?,
		role = ?
		WHERE
		UserID = ?
		LIMIT 1"
    );
    $stmt->bind_param("ssssssss", $uname,$fname, $lname, $email, $membersince, $active, $role, $userid);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}

//create a new appointment
function createNewApp($astudent, $aadvisor, $atime, $adate) {
    global $mysqli, $db_table_prefix;

    //echo $rand_string;
    //echo $username;
    //echo $firstname;
    //echo $lastname;
    //echo $email;
    //echo $password;


    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "appt (
		astudent,
		aadvisor,
		atime,
		adate
		)
		VALUES (
		?,
		?,
		?,
		?
		)"
    );
    $stmt->bind_param("ssss", $astudent, $aadvisor, $atime, $adate);
    //print_r($stmt);
    $result = $stmt->execute();
    //print_r($result);
    $stmt->close();
    return $result;

}


function createNewAppStudent($aadvisor, $atime, $adate) {
    global $loggedInUser,$mysqli, $db_table_prefix;

    //echo $rand_string;
    //echo $username;
    //echo $firstname;
    //echo $lastname;
    //echo $email;
    //echo $password;


    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "appt (
		astudent,
		aadvisor,
		atime,
		adate
		)
		VALUES (
		?,
		?,
		?,
		?
		)"
    );
    $stmt->bind_param("ssss", $loggedInUser->user_id, $aadvisor, $atime, $adate);
    //print_r($stmt);
    $result = $stmt->execute();
    //print_r($result);
    $stmt->close();
    return $result;

}

function createNewAppAdvisor($astudent, $atime, $adate) {
    global $loggedInUser,$mysqli, $db_table_prefix;

    //echo $rand_string;
    //echo $username;
    //echo $firstname;
    //echo $lastname;
    //echo $email;
    //echo $password;


    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "appt (
		astudent,
		aadvisor,
		atime,
		adate
		)
		VALUES (
		?,
		?,
		?,
		?
		)"
    );
    $stmt->bind_param("ssss", $astudent,$loggedInUser->user_id, $atime, $adate);
    //print_r($stmt);
    $result = $stmt->execute();
    //print_r($result);
    $stmt->close();
    return $result;

}

//
function fetchNotConfirmedApp() {
    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		ano,
		astudent,
		aadvisor,
		atime,
		adate,
		ashow,
		flag
		FROM ".$db_table_prefix."appt
		where ashow =0 and flag =0"
    );

    $stmt->execute();
    $stmt->bind_result($ano, $astudent, $aadvisor,  $atime, $adate,$ashow,$flag);
    while ($stmt->fetch())
    {
        $row[] = array('ano' => $ano,
            'astudent' => $astudent,
            'aadvisor' => $aadvisor,
            'atime' => $atime,
            'adate' => $adate,
            'ashow' => $ashow);
    }
    $stmt->close();
    return ($row);
}


function fetchConfirmedApp() {
    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		ano,
		astudent,
		aadvisor,
		atime,
		adate,
		ashow,
		flag
		FROM ".$db_table_prefix."appt
		where ashow =1 and flag =0"
    );

    $stmt->execute();
    $stmt->bind_result($ano, $astudent, $aadvisor,  $atime, $adate,$ashow,$flag);
    while ($stmt->fetch())
    {
        $row[] = array('ano' => $ano,
            'astudent' => $astudent,
            'aadvisor' => $aadvisor,
            'atime' => $atime,
            'adate' => $adate,
            'ashow' => $ashow);
    }
    $stmt->close();
    return ($row);
}

function fetchMyNotConfirmedApp() {
    global $loggedInUser,$mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		ano,
		astudent,
		aadvisor,
		atime,
		adate,
		ashow,
		flag
		FROM ".$db_table_prefix."appt
		where astudent = ? and ashow =0 and flag =0"
    );
    $stmt->bind_param("s", $loggedInUser->user_id);
    $stmt->execute();
    $stmt->bind_result($ano, $astudent, $aadvisor,  $atime, $adate,$ashow,$flag);
    while ($stmt->fetch())
    {
        $row[] = array('ano' => $ano,
            'astudent' => $astudent,
            'aadvisor' => $aadvisor,
            'atime' => $atime,
            'adate' => $adate,
            'ashow' => $ashow);
    }
    $stmt->close();
    return ($row);
}


function fetchMyConfirmedApp() {
    global $loggedInUser,$mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		ano,
		astudent,
		aadvisor,
		atime,
		adate,
		ashow,
		flag
		FROM ".$db_table_prefix."appt
		where astudent = ? and ashow =1 and flag =0"
    );
    $stmt->bind_param("s", $loggedInUser->user_id);
    $stmt->execute();
    $stmt->bind_result($ano, $astudent, $aadvisor,  $atime, $adate,$ashow,$flag);
    while ($stmt->fetch())
    {
        $row[] = array('ano' => $ano,
            'astudent' => $astudent,
            'aadvisor' => $aadvisor,
            'atime' => $atime,
            'adate' => $adate,
            'ashow' => $ashow);
    }
    $stmt->close();
    return ($row);
}


function fetchMyNotConfirmedAppAdvisor() {
    global $loggedInUser,$mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		ano,
		astudent,
		aadvisor,
		atime,
		adate,
		ashow,
		flag
		FROM ".$db_table_prefix."appt
		where aadvisor = ? and ashow =0 and flag =0"
    );
    $stmt->bind_param("s", $loggedInUser->user_id);
    $stmt->execute();
    $stmt->bind_result($ano, $astudent, $aadvisor,  $atime, $adate,$ashow,$flag);
    while ($stmt->fetch())
    {
        $row[] = array('ano' => $ano,
            'astudent' => $astudent,
            'aadvisor' => $aadvisor,
            'atime' => $atime,
            'adate' => $adate,
            'ashow' => $ashow);
    }
    $stmt->close();
    return ($row);
}

function fetchMyConfirmedAppAdvisor() {
    global $loggedInUser,$mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		ano,
		astudent,
		aadvisor,
		atime,
		adate,
		ashow,
		flag
		FROM ".$db_table_prefix."appt
		where aadvisor = ? and ashow =1 and flag =0"
    );
    $stmt->bind_param("s", $loggedInUser->user_id);
    $stmt->execute();
    $stmt->bind_result($ano, $astudent, $aadvisor,  $atime, $adate,$ashow,$flag);
    while ($stmt->fetch())
    {
        $row[] = array('ano' => $ano,
            'astudent' => $astudent,
            'aadvisor' => $aadvisor,
            'atime' => $atime,
            'adate' => $adate,
            'ashow' => $ashow);
    }
    $stmt->close();
    return ($row);
}

//Retrieve complete user information with user id
function fetchThisApp($ano)
{
    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
		ano,
		astudent,
		aadvisor,
		atime,
		adate,
		ashow
		FROM ".$db_table_prefix."appt
		where ano = ?
    LIMIT 1"
    );
    $stmt->bind_param("s", $ano);
    $stmt->execute();
    $stmt->bind_result($ano, $astudent, $aadvisor,  $atime, $adate,$ashow);
    $stmt->execute();
    while($stmt->fetch()){
        $row[] = array(
            'ano' => $ano,
            'astudent' => $astudent,
            'aadvisor' => $aadvisor,
            'atime' => $atime,
            'adate' => $adate,
            'ashow' => $ashow
        );
    }
    $stmt->close();
    return ($row);
}


//update user
function updateThisApp($astudent,$aadvisor, $atime, $adate, $ashow,  $ano)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "UPDATE " . $db_table_prefix . "appt
		SET
		astudent = ?,
		aadvisor = ?,
		atime = ?,
		adate = ?,
		ashow = ?
		WHERE
		ano = ?
		LIMIT 1"
    );
    $stmt->bind_param("ssssss", $astudent,$aadvisor, $atime, $adate, $ashow, $ano);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}


function updateThisAppConfirmation(  $ano)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "UPDATE " . $db_table_prefix . "appt
		SET
		ashow = 1
		WHERE
		ano = ?
		LIMIT 1"
    );
    $stmt->bind_param("s",  $ano);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}

function updateThisAppDelete($ano)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "UPDATE " . $db_table_prefix . "appt
		SET
		flag = 1
		WHERE
		ano = ?
		LIMIT 1"
    );
    $stmt->bind_param("s",  $ano);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}

//Retrieve complete user information by username
function fetchUserDetails($username) {
  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active,
		role
		FROM ".$db_table_prefix."UserDetails
		WHERE
		UserName = ?
		LIMIT 1");
  $stmt->bind_param("s", $username);

  $stmt->execute();
  $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email, $Password, $MemberSince, $Active,$role);
  while ($stmt->fetch()){
    $row = array('UserID' => $UserID,
      'UserName' => $UserName,
      'FirstName' => $FirstName,
      'LastName' => $LastName,
      'Email' => $Email,
      'Password' => $Password,
      'MemberSince' => $MemberSince,
      'Active' => $Active,
    'role' => $role);
  }
  $stmt->close();
  return ($row);
}


//Check if a user is logged in
function isUserLoggedIn() {
  global $loggedInUser,$mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		Password
		FROM ".$db_table_prefix."UserDetails
		WHERE
		UserID = ?
		AND
		Password = ?
		AND
		active = 1
		LIMIT 1");
  $stmt->bind_param("is", $loggedInUser->user_id, $loggedInUser->hash_pw);
  $stmt->execute();
  $stmt->store_result();
  $num_returns = $stmt->num_rows;
  $stmt->close();

  if($loggedInUser == NULL)
  {
    return false;
  }
  else
  {
    if ($num_returns > 0)
    {
      return true;
    }
    else
    {
      destroySession("ThisUser");
      return false;
    }
  }
}


//Destroys a session as part of logout
function destroySession($name) {
  if(isset($_SESSION[$name]))
  {
    $_SESSION[$name] = NULL;
    unset($_SESSION[$name]);
  }
}


//Retrieve complete user information of all users
function fetchAllUsers() {

  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		MemberSince,
		Active,
		role.rolename
		FROM ".$db_table_prefix."UserDetails Inner Join role on UserDetails.role = role.roleid"
		);

  $stmt->execute();
  $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email,$MemberSince, $Active, $rolename);
  while ($stmt->fetch()){
    $row[] = array('UserID' => $UserID,
      'UserName' => $UserName,
      'FirstName' => $FirstName,
      'LastName' => $LastName,
      'Email' => $Email,
      'MemberSince' => $MemberSince,
      'Active' => $Active,
      'rolename' => $rolename
  );
  }
  $stmt->close();
  return ($row);
}



// Delete user
function deleteThisRecord($userid)
{
	global $mysqli, $db_table_prefix;
	$stmt = $mysqli->prepare(
		"Delete
		FROM userdetails
		WHERE
		UserID = ?
		LIMIT 1"
	);
	$stmt->bind_param("s", $userid);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}




//truncate characters on the front page for description.
function truncate_chars($text, $limit, $ellipsis = '...') {
  if( strlen($text) > $limit )
    $text = trim(substr($text, 0, $limit)) . $ellipsis;
  return $text;
}

