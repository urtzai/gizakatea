<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kudeaketa extends Admin_controller
{

    private $data;
    private $limit = 10;

    public function __construct()
       {
            parent::__construct();
            // Your own constructor code
	    $this->load->spark('template/1.9.0');
            $this->load->library('session');
       }

    public function index()
    {
	$header_data['user'] = $this->users_model->get();
	$bilatzailea['user'] = $this->users_model->get();
	redirect('/kudeaketa/mapa', $header_data);
	/*$this->load->view('kudeaketa/header');
        $this->load->view('kudeaketa/mapa');
	$this->load->view('kudeaketa/bilatzea', $bilatzailea);
        $this->load->view('kudeaketa/estadistikak', $stats);
        $this->load->view('kudeaketa/footer');*/
    }

    public function kilometro(){

	$this->load->view('kudeaketa/kilometro');
    }

    public function mapa()
    {

	$header_data['mapa'] = '2 active';
	$header_data['listado'] = '1 ';
	$header_data['comunicacion'] = '3 ';


	//$this->output->enable_profiler(TRUE);
	$header_data['user'] = $this->users_model->get();
	$bilatzailea['user'] = $this->users_model->get();

	$user_data = $this->session->all_userdata();
        $this->load->helper('file');            

        $cabecera = "point\ttitle\tdescription\ticon\ticonSize\ticonOffset\r\n";
        write_file('assets/files/kilometroa_'.$user_data['user_id'].'.txt', $cabecera, 'w');

	if (!empty($_GET['s'])){
		$user_data['user_id'] = $_GET['s'];
		$this->session->set_userdata('user_id', $_GET['s']);;
		
	}

	$this->load->model('puntuak_model');
	
	$puntuak = $this->puntuak_model->getPuntuak($user_data['user_id']);

	$non_sold = $this->puntuak_model->getEstatusPk(3, $user_data['user_id']);		
	$sold= $this->puntuak_model->getEstatusPk(1, $user_data['user_id']);
	$stats['sold'] = count($sold);
	$stats['non_sold'] = count($non_sold);

	$reserved = "http://gizakatea.gureeskudago.net/assets/images/reserved.png";
	$free = "http://gizakatea.gureeskudago.net/assets/images/free.png";

	$row_cont = 0;

	foreach ($puntuak->result() as $reg){
		$row_cont ++;
		if ($reg->user_estado == 2 || $reg->user_estado == 1){
        		$line = trim($reg->lat_gps).",".trim($reg->lon_gps)."\t\t\t".$reserved."\t4,4\t-2,-2\r\n";
		}
		else
        		$line = trim($reg->lat_gps).",".trim($reg->lon_gps)."\t\t\t".$free."\t4,4\t-2,-2\r\n";
        	write_file('assets/files/kilometroa_'.$user_data['user_id'].'.txt', $line, 'a');
		if ($row_cont == 160){
			$data['lon'] = $reg->lon_gps;
			$data['lat'] = $reg->lat_gps;
			}
	}
	$data['kilometro'] = $user_data['user_id'];
	$data['file'] = 'kilometroa_'.$user_data['user_id'].'.txt';
	$end_file = "\r\n";
	write_file('assets/files/kilometroa_'.$user_data['user_id'].'.txt', $end_file, 'a');


	$this->load->view('kudeaketa/header', $header_data);
        $this->load->view('kudeaketa/mapa', $data);
	$this->load->view('kudeaketa/bilatzea', $bilatzailea);
        $this->load->view('kudeaketa/estadistikak', $stats);
        $this->load->view('kudeaketa/footer');
    }

    public function komunikatu()
    {
	$header_data['mapa'] = '1';
        $header_data['listado'] = '1 ';
        $header_data['comunicacion'] = '2 active';
	$data['mapa'] = '';
	$data['listado'] = '';
	$data['comunicacion'] = 'active';


        $user_data = $this->session->all_userdata();

        $this->load->model('puntuak_model');
        $non_sold = $this->puntuak_model->getEstatusPk(3, $user_data['user_id']);
        $sold= $this->puntuak_model->getEstatusPk(1, $user_data['user_id']);
        $stats['sold'] = count($sold);
        $stats['non_sold'] = count($non_sold);
	
	$header_data['user'] = $this->users_model->get();
	$bilatzailea['user'] = $this->users_model->get();
	$this->load->helper('email');
	$this->load->helper('form');

	$this->load->view('kudeaketa/header', $header_data);
        $this->load->view('kudeaketa/komunikatu');
        $this->load->view('kudeaketa/bilatzea', $bilatzailea);
        $this->load->view('kudeaketa/estadistikak', $stats);
        $this->load->view('kudeaketa/footer');
    }

    //Method for edit selected pk
    public function ikusiPk($pk_id=false)
    {	
	$header_data['mapa'] = '1 ';
	$header_data['listado'] = '2 active';
	$header_data['comunicacion'] = '3 ';


	$user_data = $this->session->all_userdata();

        $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/free.png";
	$header_data['user'] = $this->users_model->get();	
	$bilatzailea['user'] = $this->users_model->get();	
	if ($pk_id != FALSE){

		$this->load->model("puntuak_model");
		$this->load->model("pk_model");
		$sold= $this->puntuak_model->getEstatusPk(1, $user_data['user_id']);
		$non_sold= $this->puntuak_model->getEstatusPk(3, $user_data['user_id']);
        	$stats['sold'] = count($sold);
	        $stats['non_sold'] = count($non_sold);

        	// Datos necesarios en la vista
        	$data['pk'] = $this->pk_model->getPkById($pk_id);
		
		$Lonlat = $this->puntuak_model->getCoordPk ($data['pk']->user_id);
		$data['lon'] = $Lonlat->lon_gps;
		$data['lat'] = $Lonlat->lat_gps;
		
		$data['pago'] = $this->pk_model->getTableData('ged_tipo_pago');
		$data['estado'] = $this->pk_model->getTableData('ged_estado');
		
		switch ($data['pk']->user_estado){ 
			case '1':
				$data['image'] = "http://gizakatea.gureeskudago.net/assets/images/reserved.png";
				break;
			case '2':
				$data['image'] = "http://gizakatea.gureeskudago.net/assets/images/reserved.png";
				break;
			default:
        			$data['image'] = "http://gizakatea.gureeskudago.net/assets/images/free.png";	
		}

        	$this->load->helper('form');

        	$this->load->view('kudeaketa/header', $header_data);
        	$this->load->view('kudeaketa/ikusiPk', $data);
        	$this->load->view('kudeaketa/bilatzea', $bilatzailea);
        	$this->load->view('kudeaketa/estadistikak', $stats);
        	$this->load->view('kudeaketa/footer');
	}
	else{
		redirect('/kudeaketa/zerrenda');
	}
    }

    //Method for show selected ad
    public function editPk($pk_id, $from='')
    {
	$header_data['mapa'] = '1 ';
	$header_data['listado'] = '2 active';
	$header_data['comunicacion'] = '3 ';


        $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/free.png";	
	$user_data = $this->session->all_userdata();
	$header_data['user'] = $this->users_model->get();
	$bilatzailea['user'] = $this->users_model->get();
	$this->load->view('kudeaketa/header', $header_data);
	// load form validation class
	$this->load->library('form_validation');

	$this->load->model("pk_model");
	$this->load->model("puntuak_model");
	$non_sold= $this->puntuak_model->getEstatusPk(3, $user_data['user_id']);
	$sold= $this->puntuak_model->getEstatusPk(1, $user_data['user_id']);
        $stats['sold'] = count($sold);
        $stats['non_sold'] = count($non_sold);
        // Datos necesarios en la vista
        $data['pk'] = $this->pk_model->getPkById($pk_id);
	$data['pago'] = $this->pk_model->getTableData('ged_tipo_pago');
        $data['estado'] = $this->pk_model->getTableData('ged_estado');	
	// set form validation rules
	$this->form_validation->set_rules('user_email', 'Email', 'valid_email');

	if ($this->form_validation->run() == FALSE)
	{
		$data['pk'] = $this->pk_model->getPkById($pk_id);
		$Lonlat = $this->puntuak_model->getCoordPk ($data['pk']->user_id);
                $data['lon'] = $Lonlat->lon_gps;
                $data['lat'] = $Lonlat->lat_gps;

                switch ($data['pk']->user_estado){
                        case '1':
                                $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/reserved.png";
                                break;
                        case '2':
                                $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/reserved.png";
                                break;
                        default:
                                $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/free.png";
                }

		$this->load->view('kudeaketa/ikusiPk', $data);
		$this->load->view('kudeaketa/bilatzea', $bilatzailea);
		$this->load->view('kudeaketa/estadistikak', $stats);
		$this->load->view('kudeaketa/footer');
	}	
	else {

		// Aki voy a hacer el guardado de datos
		$this->pk_model->editPk(
                	$this->input->post('user_id'),
                	$this->input->post('user_nombre'),
                	$this->input->post('user_apellido'),
                	$this->input->post('user_direccion'),
                	$this->input->post('user_email'),
                	$this->input->post('user_telefono'),
                	$this->input->post('user_enviado'),
                	$this->input->post('user_estado'),
                	$this->input->post('user_tipo_pago')
                );

		$data['pk'] = $this->pk_model->getPkById($pk_id);
		$Lonlat = $this->puntuak_model->getCoordPk ($data['pk']->user_id);
                $data['lon'] = $Lonlat->lon_gps;
                $data['lat'] = $Lonlat->lat_gps;

                switch ($data['pk']->user_estado){
                        case '1':
                                $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/reserved.png";
                                break;
                        case '2':
                                $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/reserved.png";
                                break;
                        default:
                                $data['image'] = "http://gizakatea.gureeskudago.net/assets/images/free.png";
                }

		// creación de una vista de inserción correcta "gorde".
		$this->load->view('kudeaketa/gorde');
		$this->load->view('kudeaketa/ikusiPk', $data);
		$this->load->view('kudeaketa/bilatzea', $bilatzailea);
        	$this->load->view('kudeaketa/estadistikak', $stats);
        	$this->load->view('kudeaketa/footer');
	}
    }

 

    public function zerrenda($offset = 0)
    {	
	$header_data['mapa'] = '1 ';
	$header_data['listado'] = '2 active';
	$header_data['comunicacion'] = '3 ';


	$header_data['user'] = $this->users_model->get();	
	$bilatzailea['user'] = $this->users_model->get();	
	$user_data = $this->session->all_userdata();
	// Debug mode
	//$this->output->enable_profiler(TRUE);

	// Cargando la librería y el modelo de datos
	$this->load->model("pk_model");
	$this->load->model("puntuak_model");
	

	$sold= $this->puntuak_model->getEstatusPk(1, $user_data['user_id']);
	$non_sold= $this->puntuak_model->getEstatusPk(3, $user_data['user_id']);
        $stats['sold'] = count($sold);
        $stats['non_sold'] = count($non_sold);

	if ($this->input->post('user_apellido'))
		$apellido = $this->input->post('user_apellido');
	else
		$apellido = null;

	//$user_data['user_id']='1';
	$limit = 25;

	//$data['results'] = $this->pk_model->getPks(20, $offset, $user_data['user_id'], $apellido);
	$data['results'] = $this->pk_model->getPks($user_data['user_id'], $apellido, $offset, $limit)->result();

	$this->load->library('pagination');

	$numrows = $this->pk_model->countPks($user_data['user_id']);

	$config['base_url'] = 'kudeaketa/zerrenda';
	$config['total_rows'] = $numrows;
	$config['per_page'] = 20;
	$config['first_link'] = '<<';
	$config['last_link'] = '>>';
	$config['num_links'] = 2;
	$config['cur_tag_open'] = '<b>';
	$config['cur_tag_close'] = '</b>';
	$config['next_link'] = '&gt;';
	$config['prev_link'] = '&lt;';

	$this->pagination->initialize($config);

         // load email and form helpers ** you can autoload them from config/autoload.php
	$this->load->view('kudeaketa/header', $header_data);
       	$this->load->view('kudeaketa/zerrenda', $data);
	$this->load->view('kudeaketa/bilatzea', $bilatzailea);
        $this->load->view('kudeaketa/estadistikak', $stats);
        $this->load->view('kudeaketa/footer');

    }

   function emailsender(){

	$header_data['mapa'] = '1 ';
        $header_data['listado'] = '1';
        $header_data['comunicacion'] = '2 active';

	// Debug mode
        //$this->output->enable_profiler(TRUE);

	$header_data['user'] = $this->users_model->get();
	$bilatzailea['user'] = $this->users_model->get();
	$this->load->view('kudeaketa/header', $header_data);
	$user_data = $this->session->all_userdata();
	// load form validation class
	$this->load->library('form_validation');
	$this->load->model("puntuak_model");
	$sold= $this->puntuak_model->getEstatusPk(1, $user_data['user_id']);
	$non_sold= $this->puntuak_model->getEstatusPk(1, $user_data['user_id']);


        $stats['sold'] = count($sold);
        $stats['non_sold'] = count($non_sold);
		
	// set form validation rules
	$this->form_validation->set_rules('subject', 'Subject', 'required');
	$this->form_validation->set_rules('message', 'Message', 'required');

	if ($this->form_validation->run() == FALSE)
	{
		$this->load->view('kudeaketa/komunikatu');
	}	
	else {
		// you can also load email library here
		$this->load->library('email');

		$admin_mail = $header_data['user']->email;

		$cadena_mails = "";
		$users_mail = $this->puntuak_model->getUsersMails($user_data['user_id']);


		foreach($users_mail->result() as $item_mail){
			$cadena_mails = $item_mail->user_email;
			// set email data
			$this->email->from($admin_mail, 'Gure Esku Dago');
			$this->email->to($cadena_mails);
			$this->email->subject($this->input->post('subject'));
			$this->email->message($this->input->post('message'));
			$this->email->send();
		}
		
		// create a view named "succes_view" and load it at the end
		$this->load->view('kudeaketa/email_ok');
		$this->load->view('kudeaketa/komunikatu');
		$this->load->view('kudeaketa/bilatzea', $bilatzailea);
        	$this->load->view('kudeaketa/estadistikak', $stats);
        	$this->load->view('kudeaketa/footer');
	}
    }

    function create_csv(){

	    //$this->output->enable_profiler(TRUE);

	    $this->load->helper('csv');

	    $header_data['user'] = $this->users_model->get();
	    $this->load->model('puntuak_model');

	    $quer = $this->puntuak_model->getAllPk($header_data['user']->id);

            query_to_csv($quer,TRUE,'Products_'.date('dMy').'.csv');
            
        }



}

