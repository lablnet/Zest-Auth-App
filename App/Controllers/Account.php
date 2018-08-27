<?php

namespace App\Controllers;

//for using View
use Zest\View\View;
//for using auth
use Zest\Auth\Auth;
use Zest\Auth\User;

class Account extends \Zest\Controller\Controller
{
    //check is user is login or not
    public function isLogin() 
    {
        $user = new User;
        // in Auth user class there is method isLogin to check is user login or not
        if ($user->isLogin()) {
            //redirect() is builtin function in zest framework for redirect to another page
            redirect(site_base_url()."account/profile/edit");
        } 
    }
    //User login form
    public function login()
    {
        $this->isLogin();
        //Loading the view form
        View::view("account/login");
    }
    //Process the login request/actuin
    public function loginProcess() 
    {
        $this->isLogin();
        //Getting the user value
        // using builtin input function
        //escape function clean the input for escaping
        $username = escape(input('username'));
        $password = escape(input('password'));
        $auth = new Auth;
        //Call the auth signin method accpet two arguments
        // username and password 
        $auth->signin()->signin($username,$password);
        //check if there is error
        if ($auth->fail()) {
            // if yes, get the error
            $errors = $auth->error()->get();
            //loop throught the error
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            //if no error print 1 on screen means true
            echo '1';
        }
    }
    // Signup form
    public function signup()
    {
        $this->isLogin();
        //Load the signup form
        View::view("account/signup");
    } 
    public function signupProcess() 
    {
        $this->isLogin();
        //Getting the user value
        // using builtin input function
        //escape function clean the input for escaping
        $name = escape(input('name'));
        $username = escape(input('username'));
        $email = escape(input('email'));
        $password = escape(input('password'));
        $confirm = escape(input('confirm'));
        $auth = new Auth;
        //Signup method accpet the three required arguments
        // $username,$email and password 
        //Fourth array argument is optional you can provide many fields in fourth argument if want
        $auth->signup()->signup($username,$email,$password,['name' => $name, 'passConfirm' => $confirm,'role' => 'normal','ip' => (new \Zest\UserInfo\UserInfo)->ip()]);
       //check if there is error
        if ($auth->fail()) {
            // if yes, get the error
            $errors = $auth->error()->get();
            //loop throught the error
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            // If no error print successfull message
            echo 'Your account has been created login to enjoy in our services';
        }
    }
    // Logout the users
    public function logout() 
    {
        $auth = new Auth;
        // Call the logout method in auth class
        $auth->logout();
        //redirect the user to login page back
        redirect(site_base_url()."account/login");
    }     
    public function profileEdit()
    {
        $user = new User;
        if ($user->isLogin()) {
            $args = $user->loginUser();
            //profile edit form
            View::View('account/profile',$args[0]);
        } else {
            View::view('errors/404');
        }
    }      
    public function profileUpdate()
    {
        $user = new User;
        $error = false;
        $name = escape(input('name'));
        $username = escape(input('username'));
        $email = escape(input('email'));
        //check if username is already exists
        if ($user->isUsername($username)) {
            $error = true;
            echo "Sorry, {$username} username already exists, try another";
        }
        //check if email is already exists
        if ($user->isEmail($email)) {
            $error = true;
            echo "Sorry, {$email} email already exists, try another";
        }        
        if ($error !== true) {
            $auth = new Auth;
            $id = $user->loginUser()[0]['id'];
            //update the user details
            $auth->update()->update(['name'=>$name,'username'=>$username,'email'=>$email],$id);
            if ($auth->fail()) {
                $errors = $auth->error()->get();
                foreach ($errors as $error) {
                    if (is_array($error)) {
                        foreach ($error as $value) {
                            echo $value."<br>";
                        }
                    } else {
                        echo $error."<br>";
                    }
                }
            } else {
                echo 'Your account has been updated successfully';
            }            
        }
    }
    public function profileBioUpdate()
    {
        $user = new User;
        $bio = escape(input('bio'));      
        $auth = new Auth;
        //get id of login user
        $id = $user->loginUser()[0]['id'];
        //update bio of user
        $auth->update()->update(['bio'=>$bio],$id);
        if ($auth->fail()) {
            $errors = $auth->error()->get();
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            echo 'Your account bio has been updated successfully';
        }            
    }  
    public function profilePasswordUpdate()
    {
        $user = new User;
        $password = escape(input('password'));   
        $confirm = escape(input('confirm'));      
        $auth = new Auth;
        //get id of login user
        $id = $user->loginUser()[0]['id'];
        //Update the password
        $auth->update()->updatePassword($password,$confirm,$id);
        if ($auth->fail()) {
            $errors = $auth->error()->get();
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            echo 'Your account password has been updated successfully';
        }            
    }    
    public function profileView() 
    {
       $username = $this->route_params['username'];
       $username = str_replace("@", '', $username);
       $user = new User;
       if ($user->isUsername($username)) {
            $args = $user->getByWhere('username',$username);
            //profile view
            View::view('account/profileView',$args[0]);
       } else {
            View::view('errors/404');
       } 
    }  
    //Reset password form where user enter his email
    public function reset()
    {
        // Load the reset form
        //Create your form that should email and one buttom
        View::view("account/reset");
    }
    //Reset password process
    public function resetProcess()
    {
        $auth = new Auth;
        // reset the password
        $auth->reset()->reset(input('email'));
        if ($auth->fail()) {
            $errors = $auth->error()->get();
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            echo 'Your Password reset request has been recieved check your email';
        }  
    }
    public function resetPassword()
    {
        $token = $this->route_params['token'];
        $user = new User;
        //check if reset token is exists
        if ($user->isResetToken($token)) {
            $args = ['token' => $token];
            View::view("account/reset_password",$args);
        } else {
            View::view("errors/404");
        }
    }
    public function resetPasswordProcess()
    {
        $password = input('password');
        $confirm =  input('confirm');
        $token = input('token');
        $user = new User;
        //get the user id by resetToken
        $id = $user->getByWhere('resetToken',$token)[0]['id'];
        $auth = new Auth;
        //update the user password
        $auth->update()->updatePassword($password,$confirm,$id);
        if ($auth->fail()) {
            $errors = $auth->error()->get();
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            $auth->update()->update(['resetToken' => 'NULL'],$id);
            echo "Password update successfully ";
        }         
    }
}
