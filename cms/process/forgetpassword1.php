<?php
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    $user = new User();
    // debug($_SESSION['email']);
    // debug($_SESSION['user_id']);

    
	if(isset($_POST)&& !empty($_POST) )
    {    	
		$u_id = $_SESSION['user_id']; // session user id 
		$check_id=$user->getUserById($u_id);   // fetch userdetail using user id
		$cr_email  = $check_id[0]->email; // fetch email
		$cr_pass = sha1($cr_email.$_POST['currentpass']); // current password  	
    	$new_pass=$_POST['pass'];// new password
    	$re_pass=$_POST['cpass']; // verify password
        // debug($_POST,true);
    	
    	if($check_id)
         
    	{	 debug($check_id);
			//debug($check_id,true);
    		if($check_id[0]->password==$cr_pass)    
    		{
				//debug($_POST['new_password'],true);
				$password = sha1($cr_email.$_POST['pass']);
				if($password == $check_id[0]->password){
					// debug($password,true);
					redirect('../forgetpassword.php','error','Old Password and New Password Cannot Be Same');	
				}
				if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[@&$%^*])(?=.*[A-Z])(?=.*[0-9]).*$#", $new_pass)){
					redirect('../forgetpassword.php','error','Password must contain at least 8 charactes, 1 Uppercase, 1 Lowercase and 1 special character!!');
				}
    			if($new_pass==$re_pass)
    			{   
					
					$data=array('id' => ($_SESSION['user_id']),
    				'password'=>$password
    				);
				//	debug($data,true);
	    			if($new_pass!=''&&$re_pass!='') 			
	    			{
	    				$u_id = $user->updateUser($data, $u_id);    					
	    				redirect('../forgetpassword.php','success','Password changed successfully');		
	    			}
	    			else
	    			{
	    				redirect('../forgetpassword.php','error','Please enter new password');
		    		}
	    		}
	    		else
	    		{    	
	    			redirect('../forgetpassword.php','error','New pass doesnt match');
	    		}    			
		    	redirect('../forgetpassword.php','error','Enter new password');    
    		}
    		else	
    		{
    			redirect('../forgetpassword.php','error','Current password doesnt match');
    		}
    	}    	
    	else
    	{    	   
    		redirect('../forgetpassword.php','error','Current password doesnt match');
    	}
    }