<?php


class LdapGroup {


//function to convert an array in uppercase to lowercase
 function arraytolower($array, $include_leys=false) 
	{
   
    if($include_leys) {
      foreach($array as $key => $value) {
        if(is_array($value))
          $array2[strtolower($key)] = arraytolower($value, $include_leys);
        else
          $array2[strtolower($key)] = strtolower($value);
      }
      $array = $array2;
    }
    else {
      foreach($array as $key => $value) {
        if(is_array($value))
          $array[$key] = arraytolower($value, $include_leys);
        else
          $array[$key] = strtolower($value);  
      }
    }
   
    return $array;
	} 
	
// explode DN into array
function explode_dn($dn, $with_attributes=0)
{
    $result = ldap_explode_dn($dn, $with_attributes);
    //translate hex code into ascii again
    foreach($result as $key => $value) $result[$key] = preg_replace("/\\\([0-9A-Fa-f]{2})/e", "''.chr(hexdec('\\1')).''", $value);
    return $result;
}


	
// get members list from AD
function get_members($group) {
 
	//user
	$user='ldapuser';
	
	//password
	$password='pa$$w0rd';
	
    // Active Directory server
    $ldap_host = "ldap://172.16.12.84";
	
 
    // Active Directory DN
    $ldap_dn = "OU=Groups,OU=kemri-wtrp, DC=kwtrp, DC=org";
 
    // Domain, for purposes of constructing $user
    $ldap_usr_dom = "@kwtrp.org";
 
    // connect and search ldap
    $ldap = ldap_connect($ldap_host) or die("Could not connect to LDAP");
	if(!@ldap_bind($ldap, $user . $ldap_usr_dom, $password)){
	    //Could not bind to LDAP
	    return false;
	}
    $results = ldap_search($ldap,$ldap_dn, "cn=" . $group);
    $entries = ldap_get_entries($ldap, $results);
	$number_returned = ldap_count_entries($ldap,$results);
	
 
    $dirty = 0;
	
	
    // build array of members for this group, first item is count - skipped using $dirty
    foreach($entries[0]['member'] as $member) {
        if($dirty == 0) {
            $dirty = 1;
        } else {
            $member_dets = $this->explode_dn($member);  
			$username=str_replace("CN=","",$member_dets[0]);  // print_r($username); exit;
			$names=explode(' ',$username);
			$givenName=$names[0];
			if(isset($names[1])){
			  $sn=$names[1];
			  $samaccountname=$this->getSamaccountName($ldap,$givenName,$sn);
			}
			else {
			   $sn='';
			   $samaccountname=$givenName;
			}
			$members[] = $samaccountname;
			
			
        }
      }
	  
    return $members;
}

function getSamaccountName($ldap,$givenName,$sn){
	
	 //dn
	 $ldap_dn = "OU=Users,OU=kemri-wtrp, DC=kwtrp, DC=org";
	//filters
	$filter = "(&(givenname=$givenName*)(sn=$sn*))";
	
	// search active directory

	if (!($search=@ldap_search($ldap, $ldap_dn, $filter))) {
     die("Unable to search ldap server here");
	}

	$number_returned = ldap_count_entries($ldap,$search);
	$info = ldap_get_entries($ldap, $search);

	    // echo "The number of entries returned is ". $number_returned."<p>";


	//	echo "Email is: ". $info[0]["mail"][0]."<br>"; exit();  
	//var_dump($info[0]); exit;
	if(isset($info[0]["samaccountname"][0]))
			return $info[0]["samaccountname"][0];
    else {  
	  return '';
	}

}
function getLdapEmail($ldap,$givenName,$sn){
     //dn
	 $ldap_dn = "OU=Users,OU=kemri-wtrp, DC=kwtrp, DC=org";
	//filters
	$filter = "(&(givenname=$givenName*)(sn=$sn*))";
	$email='';
	
	// search active directory

	if (!($search=@ldap_search($ldap, $ldap_dn, $filter))) {
     die("Unable to search ldap server here");
	}

	$number_returned = ldap_count_entries($ldap,$search);
	$info = ldap_get_entries($ldap, $search);

	    // echo "The number of entries returned is ". $number_returned."<p>";


		//echo "Email is: ". $info[0]["mail"][0]."<br>"; exit();

     if(isset($info[0]["mail"][0])){
      $email=$info[0]["mail"][0];
	   return $email;
	}
	else {
	   return 'NO EMAIL';
	}
	 
   
}

}

?>