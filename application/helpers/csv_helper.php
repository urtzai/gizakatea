<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('array_to_csv'))
{
    function array_to_csv($array, $download = "")
    {
	header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment;filename='.$download);
        $fp = fopen('php://output', 'w');
        foreach ($array as $line)
        {
            echo fputcsv($fp, $line);
        }
        fclose($fp);
    }
}

if ( ! function_exists('query_to_csv'))
{
    function query_to_csv($query, $headers = TRUE, $download = "")
    {
        $array = array();
       
        foreach ($query as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }

	array_to_csv($array, $download);
    }
}

/* End of file csv_helper.php */
/* Location: ./system/helpers/csv_helper.php */
