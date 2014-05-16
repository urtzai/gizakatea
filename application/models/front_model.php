<?php if (! defined('BASEPATH')) exit('No direct script access');

	class Front_model extends CI_Model {
		
		protected $_table = 'ged_users';
		protected $_join  = 'ged_ibilbidea_puntuak';

		/* Función para devolver el listado de los puntos kilométricos del usuario registrado */
	
		public function getEskualde()
                    {

			$res = $this->db 
                                                ->select('DISTINCT(eskualdea)')
                                                ->from($this->_join)
                                                ->order_by('eskualdea','asc')
                                                ->get()
                                                ->result()
                                                ;

			return $res;
                    }

		public function getHerriak($eskualde)
                    {
			$res = $this->db 
                                                ->select('DISTINCT(ud_izena)')
                                                ->from($this->_join)
                                                ->where('eskualdea LIKE \'%'. $eskualde .'%\'')
                                                ->order_by('ud_izena','asc')
                                                ->get()
                                                ->result()
                                                ;

			return $res;
                    }

		// Obtenemos los kilometros que pertenecen a un eskualde.
		public function getKmByEscualdeHerriak($eskualde, $herria){
				$res = $this->db
                                                ->select('DISTINCT(km)')
                                                ->from($this->_join)
                                                ->where('eskualdea LIKE \'%'. $eskualde .'%\' and ud_izena LIKE \'%'. $herria .'%\'')
                                                ->order_by('ud_izena','asc')
                                                ->get()
                                                ->result()
                                                ;

                        return $res;	

		}

		// Obtenemos cual de los 123 kilometros tiene mas puntos libres.
                public function getMaxFreePointsinPk(){
				
                                $res = $this->db->query('SELECT TT.cnt_occuped,T.cnt_free,T.user_pk,T.user_metro_gid FROM (SELECT count(user_estado) cnt_free,user_pk,user_metro_gid FROM ged_users WHERE user_estado=3 GROUP BY user_pk) AS T LEFT JOIN (SELECT count(user_estado) cnt_occuped,user_metro_gid FROM ged_users WHERE user_estado in (1,2) GROUP BY user_pk) as TT ON (TT.user_metro_gid=T.user_metro_gid) ORDER BY T.cnt_free DESC');
				return $res;

                }


		// Obtenemos cual de los kilometros del array tiene mas puntos libres.
		public function getMaxEskualdeFreePointsinPk($array){

                                $res = $this->db->query('SELECT TT.cnt_occuped,T.cnt_free,T.user_pk,T.user_metro_gid FROM (SELECT count(user_estado) cnt_free,user_pk,user_metro_gid FROM ged_users WHERE user_estado=3 and user_pk in ('.$array.') GROUP BY user_pk) AS T LEFT JOIN (SELECT count(user_estado) cnt_occuped,user_metro_gid FROM ged_users WHERE user_estado in (1,2) and user_pk in ('.$array.') GROUP BY user_pk) as TT ON (TT.user_metro_gid=T.user_metro_gid) ORDER BY T.cnt_free DESC');
				return $res;
		}

		// Obtenemos cual de los kilometros del array tiene mas puntos libres.
                public function getMeter($meter){

				$res= $this->db->query('SELECT * FROM ged_ibilbidea_puntuak WHERE gid = '.$meter);
                                return $res;
                }

	}
