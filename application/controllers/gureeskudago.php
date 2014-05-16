<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gureeskudago extends CI_Controller {

	private $_url_tpvv='https://sis-t.sermepa.es:25443/sis/realizarPago';
        private $_clave='qwertyasdf0123456789';
        private $_name='GIZA KATEA';
        private $_code='058018193';
        private $_terminal='1';
        private $_amount='500';
        private $_currency='978';
        private $_transactionType='0';
	private $_urlMerchant='http://gizakatea.gureeskudago.net';

 

	public function __construct(){
        	parent::__construct();
        	$this->load->spark('template/1.9.0');
        	$this->load->library('session');
    	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$lang = $this->input->get('lang');
        	$uri = $this->input->get('uri');
		//$this->output->enable_profiler(TRUE);
        	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
                        $this->session->set_userdata('language', $lang);
                        redirect($uri);
                }
             
		$user_data = $this->session->all_userdata();		

		if (!isset($user_data['language']))
		{
			$user_data['language'] = 'euskera';
		}


		if ($user_data['language'] == 'euskera'){
			$data['idioma_cod'] = 'spanish';
                	$data['idioma'] = 'Castellano';      
		}

		if ($user_data['language'] == 'spanish'){
                        $data['idioma_cod'] = 'euskera';
                        $data['idioma'] = 'Euskara';
                }

		$this->load->model('front_model');
		$data['eskualdea'] = $this->front_model->getEskualde();
		$data['post_eskualdea'] = '0';
		$data['post_herriak'] = '0';
		$options_city['0'] = "-- ".$this->lang->line('pueblo')." --";
		$data['disabled'] = 'disabled';
		$data['btn_info'] = ' btn-info ';
		$data['punto_recomendado'] = "";
                $data['te_necesitamos'] = "";

		if (!empty($_POST['eskualdea']) && !empty($_POST['herriak'])){
			// Presentación de los eskualdes, cargamos el modelo de carga 
			$data['post_eskualdea'] = $_POST['eskualdea'];
			$data['btn_info'] = ' ';
			$data['post_herriak'] = $_POST['herriak'];
			$herriak = $this->front_model->getHerriak($_POST['eskualdea']);
			foreach ($herriak as $item){
                        	$options_city[$item->ud_izena] = $item->ud_izena;
                        }

			// Variables necesarias para la pasarela de pago.
			$data['url_tpvv']= $this->_url_tpvv;
			$data['clave']=$this->_clave;
			$data['name']=$this->_name;
			$data['code']=$this->_code;
			$data['terminal']=$this->_terminal;
			$data['order']=date('ymdHis');
			$data['amount']=$this->_amount;
			$data['currency']=$this->_currency;
			$data['transactionType']=$this->_transactionType;
			$data['urlMerchant']=$this->_urlMerchant;
			$data['producto']='Gure esku dago Kilometro';
			$message = $data['amount'].$data['order'].$data['code'].$data['currency'].$data['transactionType'].$data['urlMerchant'].$data['clave'];
                        $data['signature'] = strtoupper(sha1($message));

			$data['disabled'] = '';

			// Busqueda de los kilometros de este eskualde/herri
			//	return array 
			
			$pk_eskualde = $this->front_model->getKmByEscualdeHerriak($_POST['eskualdea'], $_POST['herriak']);
			
			$cadena_eskualde = '';

			foreach ($pk_eskualde as $esku){
                                $cadena_eskualde .= $esku->km . ",";
                        }
			//eliminamos la coma del final 
			$cadena_eskualde = substr($cadena_eskualde, 0, -1);			

			// Extracción del que más puntos libres tiene de los kilómetros recibidos de la búsqueda eskualde/herria 
			$libres_eskualde = $this->front_model->getMaxEskualdeFreePointsinPk($cadena_eskualde);
	
			// identificador del kilómetro recomendado
			if ($libres_eskualde->num_rows() > 0)
				$data['punto_recomendado'] = $libres_eskualde->row()->user_metro_gid;
			else
				$data['punto_recomendado'] = "No quedan metros libres";

			// Extracción del que más puntos libres tiene de todos los kilómetros
			$libres_gureesku = $this->front_model->getMaxFreePointsinPk();
			
			//identificador del kilómetro te necesitamos
			if ($libres_gureesku->num_rows() > 0)
				$data['te_necesitamos'] = $libres_gureesku->row()->user_metro_gid;
			else
				$data['te_necesitamos'] = "No quedan metros libres";
	
		}

		$data['options_city'] = $options_city;
		$this->load->view('gureeskudago', $data);
	}


	// Función para el combo recargable de eskualdes y herriak
	public function get_herriak(){
		//$this->output->enable_profiler(TRUE);
		$eskualdea = $_GET['eskualdea'];
		$this->load->model('front_model');
		$herriak = $this->front_model->getHerriak($eskualdea);

		foreach ($herriak as $item){
			$response[$item->ud_izena] = $item->ud_izena;
		}	
	
                echo json_encode($response);
	} 

	public function how_to_buy()
	{
		$lang = $this->input->get('lang');
        	$uri = $this->input->get('uri');
        	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
                        $this->session->set_userdata('language', $lang);
                        redirect($uri);
                }	
		$this->load->view('front/how_to_buy');
	}

	public function zuretzako_lekua()
	{
		$lang = $this->input->get('lang');
        	$uri = $this->input->get('uri');
        	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
                        $this->session->set_userdata('language', $lang);
                        redirect($uri);
                }	
		$this->load->view('front/zuretzako_lekua');
	}

	public function behar_zaitugu()
	{
		$lang = $this->input->get('lang');
        	$uri = $this->input->get('uri');
        	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
                        $this->session->set_userdata('language', $lang);
                        redirect($uri);
                }	
		$this->load->view('front/behar_zaitugu');
	}

	public function politika()
	{
		$lang = $this->input->get('lang');
        	$uri = $this->input->get('uri');
        	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
                        $this->session->set_userdata('language', $lang);
                        redirect($uri);
                }	
		$this->load->view('front/politika');
	}


	public function find_meter()
	{
		$lang = $this->input->get('lang');
        	$uri = $this->input->get('uri');
        	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
                        $this->session->set_userdata('language', $lang);
                        redirect($uri);
                }	
		$this->load->view('front/find_meter');
	}


	public function need_you()
	{
		$lang = $this->input->get('lang');
        	$uri = $this->input->get('uri');
        	if($lang == 'english' || $lang == 'spanish' || $lang == 'euskera'){
                        $this->session->set_userdata('language', $lang);
                        redirect($uri);
                }	
		$this->load->view('front/need_you');
	}

	public function update_kilometroa()
	{
		$this->load->model('pk_model');
		// Aki voy a hacer el guardado de datos
                if (!$this->pk_model->editPk(
                        $this->input->post('metro'),
                        $this->input->post('nombre'),
                        $this->input->post('apellido'),
                        $this->input->post('direccion'),
                        $this->input->post('email'),
                        $this->input->post('telefono'),
                        '0',
                        '2',
                        '1',
			$this->input->post('Ds_Merchant_Order')
                ))
		echo "true";
		else
		echo "false";
	
	}

	public function RespTpv ()
	{
	//$this->output->enable_profiler(TRUE);
	$this->load->model('pk_model');
	
	if (!empty($_GET)){

        	// Recoger datos de respuesta
        	$total     = $_GET["Ds_Amount"];
        	$pedido    = $_GET["Ds_Order"];
        	$codigo    = $_GET["Ds_MerchantCode"];
        	$moneda    = $_GET["Ds_Currency"];
        	$respuesta = $_GET["Ds_Response"];
        	$firma_remota = $_GET["Ds_Signature"];

        	// Contraseña Secreta
        	$clave = $this->_clave;

        	// Cálculo del SHA1
        	$mensaje = $total . $pedido . $codigo . $moneda . $respuesta . $clave;
        	$firma_local = strtoupper(sha1($mensaje));

        	if ($firma_local == $firma_remota){
        	        // Formatear variables
        	        // NINO - eliminar el punto de los miles para evitar error en pago
        	        // ORIGINAL - $total  = number_format($total / 100,4);
        	        $total  = number_format($total / 100,4,'.', '');
        	        $pedido = substr($pedido,0,8);
        	        $pedido = intval($pedido);
        	        $respuesta = intval($respuesta);
        	        $moneda_tienda = 1; // Euros
        	        if ($respuesta < 101){

				$cliente_pk = $this->pk_model->getPkByOrder($_GET["Ds_Order"]);

				$mail_cliente = "aitor@gaueko.com";

				$metro_comprado = $cliente_pk->user_id;
				$nombre_cliente = $cliente_pk->user_nombre;
				$apellido_cliente = $cliente_pk->user_apellido;
				$direccion_cliente = $cliente_pk->user_direccion;
				$kilometro_cliente = $cliente_pk->user_pk;

				$message = "Hola ".$nombre_cliente." ".$apellido_cliente." \r\n";
				$message .= "Acaba de adquirir el metro '".$metro_comprado."' del kilómetro ".$kilometro_cliente." \r\n";
				$message .= "Podrá contactar con el responsable de su kilometro en el e-mail : antolatzaile".$kilometro_cliente."@gureeskudago.net \r\n" ;

				// Enviamos el mail de confirmación al usuario.
				$this->load->library('email');
				$this->email->from('gureeskudago@gureeskudago.net', 'Gure Esku Dago');
				$this->email->to($cliente_pk->user_email);
				$this->email->subject('Ha comprado su metro en Gure Esku Dago');
				$this->email->message($message);
                        	$this->email->send();

				// validamos el número de pedio y lo pasamos a comprado
				$this->pk_model->updatePk(
                        		'1',
                        		$_GET["Ds_Order"]);

				
				$this->load->view('front/pago_correcto');
        	        }
        	        else {
        	                // Compra no válida
				// Liberamos la reserva del punto.
				$this->pk_model->updatePk(
                                        '3',
                                        $_GET["Ds_Order"]);
				$this->load->view('front/pago_erroneo');
                	}
        	}
		}

	}

	public function show_map()
	{

		$data['lon'] = "-2.190198";
		$data['lat'] = "43.041183";
		$data['file'] = "recorrido";
		$data['km'] = "";
		$data['texto_bocata'] = "Gure esku dago";
		$data['zoom'] = '10';
		

		/* Recuperar todos los datos del punto seleccionado si es que nos lo han mandado */
		if ($_GET['p']){
			$this->load->model('front_model');
			// recupero la latitud y la longitud del punto
			$datos_punto = $this->front_model->getMeter($_GET['p'])->row();
			$data['lon'] = $datos_punto->lon_gps;
			$data['lat'] = $datos_punto->lat_gps;
			$data['file'] = "kilometroa_". $datos_punto->km;
			$data['km'] = $datos_punto->km;
			$data['texto_bocata'] = $this->lang->line('este_es_su_metro');
			//$data['texto_bocata'] = "Este sería tu metro en el kilómetro  ";
			$data['zoom'] = '18';
		}

		$this->load->view('front/show_map', $data);
	}


	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
