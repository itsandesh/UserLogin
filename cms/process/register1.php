<?php


require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
$user = new User;


if(isset($_POST) && !empty($_POST)){
    // debug($_POST,true);
    // debug($_FILES, true);
    
    $data = array(
        'name' => sanitize($_POST['name']),
        'email' => sanitize($_POST['email']),
        'password' => sanitize(sha1($_POST['email'].$_POST['pass'])),
        'role'=>'admin',
    );

    $user_id = (isset($_POST, $_POST['id'])) ? (int)$_POST['id'] : '';

    if($user_id){
        
        $act = "update";
        $user_id = $user->updateUser($data, $user_id);

    } else {
   
        $act = 'add';
        if($data['name']!=null && $data['email']!=null && $data['password']!=null){
            if($_POST['recaptcha']!=null)
            {
                if(!$user->getUserByUsername($data['name']))
                {
                    if(!$user->getUserByEmail($data['email']))
                    {
                        if($_POST['pass'] == $_POST['cpass']){
                            $password= $_POST['pass'];
                            if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[@&$%^*])(?=.*[A-Z])(?=.*[0-9]).*$#", $password)){
                                $user_id = $user->addUser($data);
                            } else {
                                redirect('../register.php','error','Password must contain at least 8 charactes, 1 Uppercase, 1 Lowercase and 1 special character!!');
                            }
                        }
                        else{
                            redirect('../register.php','error','Password not matched!!');
                        }
                    }else
                    {
                        redirect('../register.php','error','User with this email is already exist!!');
                    }
                }else
                {
                    redirect('../register.php','error','User already exist!!');
                }
                
            }
            else{
            redirect('../register.php','error','Invalid captcha!!');
            }
            
        }
        else{
            redirect('../register.php','error','Please fill the form data first!!');
        }
    }

    // debug($data, true);
    if($user_id){
        redirect('../index.php','success','User '.$act.'ed successfully.');
    } else {
        redirect('../register.php','error','Sorry! There was problem while '.$act.'ing user.');
    }

}else {
    redirect('../register.php', 'error','Unauthorized access');
}

?>