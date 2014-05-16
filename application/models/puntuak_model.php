<?php if (! defined('BASEPATH')) exit('No direct script access');

	class Puntuak_model extends CI_Model {
		
		protected $_table = 'ged_users';
		protected $_join  = 'ged_ibilbidea_puntuak';

		/* Función para devolver el listado de los puntos kilométricos del usuario registrado */
	
		public function getPuntuak($km)
                    {
			$res = $this->db->query('SELECT * FROM ged_users, ged_ibilbidea_puntuak WHERE user_pk='.$km.' AND user_id = gid  ORDER BY user_tra_zen ASC');	

			return $res;
                    }
		public function getCoordPk ($gid){
				$res = $this->db        
                                        ->select()
                                        ->from($this->_join)
                                        ->where('gid', $gid)
                                        ->get() 
                                        ->row() 
                                        ;       
                        return $res; 
		}

		public function getAllPk ($km){
					$res = $this->db
                                                ->select('*')
                                                ->from($this->_table)
                                                ->where('user_pk = '.$km)
                                                ->get()
                                                ->result()
                                                ;
                        return $res;
                }

		public function getEstatusPk($status, $km){

					$res = $this->db
                                                ->select('*')
                                                ->from($this->_table)
                                                ->where('user_estado = '.$status.' and  user_pk = '.$km)
                                                ->get()
                                                ->result()
                                                ;
                        return $res;

		}
		public function getUsersMails($km){
						
			$res = $this->db->query('SELECT * FROM ged_users WHERE user_pk='.$km.' AND user_estado in (1,2)');

                        return $res;
		}


	}
