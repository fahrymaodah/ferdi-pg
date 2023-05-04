<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rajaongkir extends CI_Controller {
	private $api_key = 'ad6f75cae274cc79ae3d0cd18aba96e5';

	public function provinsi()
    {
    	$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        else {
            $response	= json_decode($response, true);
            $provinsi	= $response['rajaongkir']['results'];

            echo "<option disabled selected>Pilih Provinsi</option>";
            foreach ($provinsi as $key => $value) {
                echo "<option value='".$value['province_id']."'>".$value['province']."</option>";
            }
        }
    }

    public function kota()
    {
        $provinsi = $this->input->post('id_provinsi');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$provinsi,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        else {
            $response	= json_decode($response, true);
            $kota		= $response['rajaongkir']['results'];

            echo "<option disabled selected>Pilih Kota</option>";
            foreach ($kota as $key => $value) {
                echo "<option value='".$value['city_name']."'>".$value['city_name']."</option>";
            }
        }
    }
}

/* End of file Rajaongkir.php */
/* Location: ./application/controllers/Rajaongkir.php */