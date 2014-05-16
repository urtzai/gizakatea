<?php if (! defined('BASEPATH')) exit('No direct script access');

	class Pk_model extends CI_Model {
		
		protected $_table = 'ged_users';

		/* Función para devolver el listado de los puntos kilométricos del usuario registrado */

	        public function getPks($km, $apellido=null, $from, $limit=20)
                    {                           
                        $query_apellido = "";   
                        if ($apellido != null){ 
                                $query_apellido = "AND user_apellido LIKE '%".$apellido."%'";
                        }                       
                        $res = $this->db->query('SELECT * FROM ged_users, ged_ibilbidea_puntuak, ged_estado, ged_tipo_pago  WHERE user_pk='.$km.' AND user_id = gid '.$query_apellido.' AND estado_id = user_estado AND user_tipo_pago = tipo_pago_id ORDER BY user_tra_zen  asc LIMIT '.$from.' , '.$limit);
                        
                        return $res;
                    }	

	
		/*Obtenemos todos los registros de una tabla dada*/

		public function getTableData($table){
			$res = $this->db
                                                ->select('*')
                                                ->from($table)
                                                ->get()
                                                ->result()
                                                ;
                        return $res;
		}

		/* Obtenemos los datos de un punto kilométrico para su edición */
		
		public function getPkById($pk_id)
                    {
			$res = $this->db
					->select()
					->from($this->_table)
					->where('user_id', $pk_id)
					->get()
					->row()
					;
			return $res;
                    }	

		/* Obtenemos los datos de un punto kilométrico para su edición */
		
		public function getPkByOrder($user_pedido)
                    {
			$res = $this->db
					->select()
					->from($this->_table)
					->where('user_pedido', "".$user_pedido."")
					->get()
					->row()
					;
			return $res;
                    }	

		
                public function editPk($user_id, $user_nombre, $user_apellido, $user_direccion, $user_email, $user_telefono, $user_enviado, $user_estado, $user_tipo_pago, $user_pedido="")
                    {
			$data = array(
                                        'user_nombre'		=> $user_nombre ,
                                        'user_apellido'		=> $user_apellido,
                                        'user_direccion'	=> $user_direccion,
                                        'user_email'		=> $user_email,
                                        'user_telefono'		=> $user_telefono,
                                        'user_enviado'		=> $user_enviado,
                                        'user_estado'		=> $user_estado,
                                        'user_tipo_pago'	=> $user_tipo_pago,
					'user_pedido'		=> $user_pedido
                                        );
			$this->db->where('user_id', $user_id)
                                  ->update($this->_table, $data); 
                    }
                    
                public function updatePk($user_estado, $user_pedido)
                    {
			if ($user_estado == '1')
				$data = array(
                                        'user_estado'		=> $user_estado,
					'user_pedido'		=> ''
                                        );

			else
				$data = array(
                                        'user_nombre'		=> '' ,
                                        'user_apellido'		=> '',
                                        'user_direccion'	=> '',
                                        'user_email'		=> '',
                                        'user_telefono'		=> '',
                                        'user_enviado'		=> '',
                                        'user_estado'		=> $user_estado,
                                        'user_tipo_pago'	=> '2',
					'user_pedido'		=> ''
                                        );

			$this->db->where('user_pedido', "".$user_pedido."")
                                  ->update($this->_table, $data); 
                    }


                public  function countPks($user_id)
                    {
  	  		$query = $this->db->select('user_id')
                                          ->from($this->_table)
					  ->where('user_pk', $user_id)
                                          ->get()
                                          ->num_rows();			   			
                        return $query;
                    }    
                    
                public function getPkByApellido($apellido)
                    {
                        $res = $this->db
					->select()
					->from($this->_table)
					->where('user_apellido', $apellido)
                                        ->limit('1')
					->get()
					->row()
					;
			return $res;
                    
                    }                 
	}
