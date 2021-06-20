<?php

namespace App\Models;

use CodeIgniter\Model;

class mainModel extends Model
{

    // Pertalite ------------------------------------------------------------
    public function add_tinggi_pertalite($kirimdata)
    {
        $query = $this->db->table('tinggi_pertalite')->insert($kirimdata);
        return $query;
    }
    public function add_pertalite_masuk($kirimdata)
    {
        $query = $this->db->table('pertalite_masuk')->insert($kirimdata);
        return $query;
    }
    public function add_pertalite_keluar($kirimdata)
    {
        $query = $this->db->table('pertalite_keluar')->insert($kirimdata);
        return $query;
    }
    
    public function get_tinggi_pertalite()
    {
        $query = $this->db->query("SELECT * FROM tinggi_pertalite ORDER BY id DESC LIMIT 1");
        return $query;
    }


    // Pertamax ------------------------------------------------------------
    public function add_tinggi_pertamax($kirimdata)
    {
        $query = $this->db->table('tinggi_pertamax')->insert($kirimdata);
        return $query;
    }
    public function add_pertamax_masuk($kirimdata)
    {
        $query = $this->db->table('pertamax_masuk')->insert($kirimdata);
        return $query;
    }
    public function add_pertamax_keluar($kirimdata)
    {
        $query = $this->db->table('pertamax_keluar')->insert($kirimdata);
        return $query;
    }

    public function get_tinggi_pertamax()
    {
        $query = $this->db->query("SELECT * FROM tinggi_pertamax ORDER BY id DESC LIMIT 1");
        return $query;
    }

    public function addToken($kirimdata)
    {
        $query = $this->db->table('token')->insert($kirimdata);
        return $query;
    }

    public function getDataListrik()
    {
        return $this->db->table('listrik')->get()->getResultArray();
    }

    public function getDataToken()
    {
        // tampilkan data dari tabel token_temp, 1 data yg terbaru (berdasarkan id)
        $query = $this->db->query("SELECT * FROM token ORDER BY id DESC LIMIT 1");
        return $query;
    }

    public function getDataKwh()
    {
        return $this->db->table('rekap_kwh')->get()->getResultArray();
    }

    public function getDataJumlahBiaya()
    {
        return $this->db->table('rekap_jumlah_biaya')->get()->getResultArray();
    }
    
    public function getAllDataToken()
    {
        return $this->db->table('token')->orderBy("id", "DESC")->get()->getResultArray();
    }

    public function editToken($kirimdata)
    {
        $this->db->table('token')->where('id', $kirimdata['id'])->update($kirimdata);
    }

    public function deleteToken($kirimdata)
    {
        $this->db->table('token')->where('id', $kirimdata['id'])->delete($kirimdata);
    }

    public function kwh_bulan($bulan)
    {
        $query = $this->db->query("SELECT SUM(data_daya) AS total_kwh_bulan FROM listrik WHERE bulan = '$bulan'");
        return $query;
    }

    public function biaya_bulan($bulan)
    {
        $query = $this->db->query("SELECT SUM(jumlah) AS total_jumlah FROM token WHERE bulan = '$bulan'");
        return $query;
    }
}
