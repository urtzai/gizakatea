<?php if (! defined('BASEPATH')) exit('No direct script access');

class Saio_hasiera extends CI_Controller
{
    private $data;
    
    public function __construct()
    {
        parent::__construct();
	$this->load->spark('template/1.9.0');
	$this->load->library('session');
    }
    
    public function index()
    {

	$lang = $this->input->get('lang');
        $uri = $this->input->get('uri');

	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
        		$this->session->set_userdata('language', $lang);
                	redirect($uri);
                } 


        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim');
     
        if ($this->form_validation->run())
        {
            if ($this->users_model->try_login($this->input->post('username'), $this->input->post('password')))
            {
                redirect('/kudeaketa/');
            }
            else
            {
                $this->data->error = 'Username or password wrong';
            }
        }
        
        $this->template->set_layout(FALSE)->build('kudeaketa/saio_hasiera', $this->data);
    }
    
    public function logout()
    {
        $this->users_model->logout();
        redirect('saio_hasiera');
    }

}

/* End of file sessions.php */
/* Location: ./application/controllers/sessions.php */
