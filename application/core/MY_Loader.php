<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE){
        if($return):
        $content  = $this->view('template/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('template/footer', $vars, $return);

        return $content;
    else:
        $this->view('template/header', $vars);
        $this->view($template_name, $vars);
        $this->view('template/footer', $vars);
    endif;
    }

    public function item($template_name, $vars = array(), $return = FALSE){
        if($return):
        $content = $this->view('items/'.$template_name, $vars, $return);

        return $content;
    else:
        $this->view('items/template/header.php', $vars);
        $this->view('items/'.$template_name, $vars);
        $this->view('items/template/footer.php', $vars);
    endif;
    }

    public function dashboard($template_name, $vars = array(), $return = FALSE){
        $currentUser = false;

        if(isUserLoggedIn())
        {
            $CI =& get_instance();
            // out($CI->session->userdata('user'));
            $currentUser = $CI->session->userdata('user');
            $vars['currentUser'] = $CI->session->userdata('user');

        if($return):
            $content = $this->view('dashboard/'.$template_name, $vars, $return);
            return $content;
    
        else:
            $this->view('dashboard-template/header.php', $vars);
            $this->view('dashboard/'.$template_name, $vars);
            $this->view('dashboard-template/footer.php', $vars);
        endif;
        }else{
            die("you  have not permission");
        }
    }
}