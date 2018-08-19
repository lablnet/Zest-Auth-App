<?php

namespace App\Controllers;

//for using View
use Zest\View\View;
//for using auth
use Zest\Auth\Auth;
use Zest\Auth\User;

class Account extends \Zest\Controller\Controller
{
    public function isLogin() 
    {
        $user = new User;
        if ($user->isLogin()) {
            redirect(site_base_url()."account/profile/edit");
        } 
    }
    public function login()
    {
        $this->isLogin();
        View::view("account/login");
    }
    public function loginProcess() 
    {
        $this->isLogin();
        $username = escape(input('username'));
        $password = escape(input('password'));
        $auth = new Auth;
        $auth->signin()->signin($username,$password);
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
            echo '1';
        }
    }
    public function signup()
    {
        $this->isLogin();
        View::view("account/signup");
    } 
    public function signupProcess() 
    {
        $this->isLogin();
        $name = escape(input('name'));
        $username = escape(input('username'));
        $email = escape(input('email'));
        $password = escape(input('password'));
        $confirm = escape(input('confirm'));
        $auth = new Auth;
        $auth->signup()->signup($username,$email,$password,['name' => $name, 'passConfirm' => $confirm,'role' => 'normal','ip' => (new \Zest\UserInfo\UserInfo)->ip()]);
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
            echo 'Your account has been created login to enjoy in our services';
        }
    }
    public function logout() 
    {
        $auth = new Auth;
        $auth->logout();
        redirect(site_base_url()."account/login");
    }     
    public function profileEdit()
    {
        $user = new User;
        if ($user->isLogin()) {
            $args = $user->loginUser();
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
        if ($user->isUsername($username)) {
            $error = true;
            echo "Sorry, {$username} username already exists, try another";
        }
        if ($user->isEmail($email)) {
            $error = true;
            echo "Sorry, {$email} email already exists, try another";
        }        
        if ($error !== true) {
            $auth = new Auth;
            $id = $user->loginUser()[0]['id'];
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
        $id = $user->loginUser()[0]['id'];
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
        $id = $user->loginUser()[0]['id'];
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
            View::view('account/profileView',$args[0]);
       } else {
            View::view('errors/404');
       } 
    }  

    public function reset()
    {
        View::view("account/reset");
    }
    public function resetProcess()
    {
        $auth = new Auth;
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
        $id = $user->getByWhere('resetToken',$token)[0]['id'];
        $auth = new Auth;
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
