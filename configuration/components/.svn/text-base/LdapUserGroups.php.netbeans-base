<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LdapUserGroups
 *
 * @author nngao
 */
class LdapUserGroups {
    
    
    
function getUserGroups($username) {
 
 $connect=$this->getLdapConnection();
 
 $domain = "kwtrp";
 
 $groups = array();
 
 $search=$this->LdapSearchUser($domain,$username);
 

$number_returned = ldap_count_entries($connect,$search);
$info = ldap_get_entries($connect, $search);

for ($i=0; $i<$info["count"]; $i++) {
    
   // user groups
   $groups = array();

	// Loop through the groups that the user is a `memberof`
	if($info[0]['memberof']) {
		foreach($info[0]['memberof'] as $group) {
		// extract Group name from string
		
		$temp = substr($group, 0, stripos($group, ","));
		// Strip the CN= and change to lowercase for easy handling
		$temp = strtolower(str_replace("CN=", "", $temp));

		//echo "{$temp}<br />";   // Print out Group’s name
		$groups[] .= $temp;
		
		}
    }
	
	
}

 return $groups;

}

function LdapSearchUser($domain,$username) {
	
	$connect=$this->getLdapConnection();
	
	if($connect) {
		
		//search criteria
		// Set the base dn to search the entire directory.
		$base_dn = "OU=Users,OU=kemri-wtrp, DC=kwtrp, DC=org";

		// Show only this user
		$filter = "(&(objectClass=user)(sAMAccountName=$username))";

		
		// search active directory
		if (!($search=@ldap_search($connect, $base_dn, $filter))) {
			die("Unable to search ldap server");
			return false;
			exit;
		}
        
		return $search;
		 

    }

}

function getLdapConnection() {
 //returns a live ldap connection string
 
   $ldap_server = "ldap://172.16.12.84";
   $auth_user = "ldapuser@kwtrp.org";
   $auth_pass = 'pa$$w0rd';
   
   // connect to server
   if (!($connect=@ldap_connect($ldap_server))) {
     die("Could not connect to ldap server");
	 return false;
	}
	// bind to server
	if (!($bind=@ldap_bind($connect, $auth_user, $auth_pass))) {
     die("Unable to bind to server");
	 return false;
	}
	
	return $connect;

}


}

?>
