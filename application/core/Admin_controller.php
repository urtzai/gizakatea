<?php if (! defined('BASEPATH')) exit('No direct script access');

class Admin_controller extends CI_Controller 
{

    function __construct()
    {
        parent::__construct();
        
        //$this->load->spark('template/1.9.0');
        
        /* Url to redirect if not logged */
        $url_login = 'saio_hasiera';
        
        if ( ! $this->logged_user = $this->users_model->get())
        {
            /* Redirect in Ajax requests */
            if ($this->input->is_ajax_request()) echo '<script> window.location = "'.site_url($url_login).'"</script>';
            redirect($url_login);
        }
    }

}

/* End of file Admin_controller.php */
/* Location: ./application/core/Admin_controller.php */
