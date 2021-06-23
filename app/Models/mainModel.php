<?php

namespace App\Models;

use CodeIgniter\Model;

class mainModel extends Model
{

    // profile -----------------------------------------------------------
    public function myprofile()
    {
        return $this->db->table('users')
        ->where('id', session()->get('id'))->get();
    }

    public function list_user()
    {
        return $this->db->table('users')->orderBy("id", "ASC")->get()->getResultArray();
    }


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

    // Grafik masuk -------------------------------------------------------
    public function get_all_pertalite_masuk()
    {
        return $this->db->query("SELECT * FROM pertalite_masuk ORDER BY waktu DESC LIMIT 10")->getResultArray();
    }
    public function get_all_pertamax_masuk()
    {
        return $this->db->query("SELECT * FROM pertamax_masuk ORDER BY waktu DESC LIMIT 10")->getResultArray();
    }

    // Grafik keluar -------------------------------------------------------
    public function get_all_pertalite_keluar()
    {
        return $this->db->query("SELECT * FROM pertalite_keluar ORDER BY waktu DESC LIMIT 10")->getResultArray();
    }
    public function get_all_pertamax_keluar()
    {
        return $this->db->query("SELECT * FROM pertamax_keluar ORDER BY waktu DESC LIMIT 10")->getResultArray();
    }

    // Laporan masuk -------------------------------------------------------
    public function get_all_lap_masuk_pertalite()
    {
        return $this->db->table('pertalite_masuk')->orderBy("id", "ASC")->get()->getResultArray();
    }
    public function get_all_lap_masuk_pertamax()
    {
        return $this->db->table('pertamax_masuk')->orderBy("id", "ASC")->get()->getResultArray();
    }

    // Laporan keluar
    public function get_all_lap_keluar_pertalite()
    {
        return $this->db->table('pertalite_keluar')->orderBy("id", "ASC")->get()->getResultArray();
    }
    public function get_all_lap_keluar_pertamax()
    {
        return $this->db->table('pertamax_keluar')->orderBy("id", "ASC")->get()->getResultArray();
    }
}
