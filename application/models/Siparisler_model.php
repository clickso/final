<?php


class Siparisler_model extends CI_Model
{

	public $tablo = "siparis";

	public function __construct()
	{
		parent::__construct();

	}

	/** Tüm Kayıtları bana getirecek olan metot.. */
	public function tumu($where=array(), $sira=array())
	{

		return $this->db->where($where)->order_by($sira)->get($this->tablo)->result();

	}

	public function cek($where=array())
	{

		return $this->db->where($where)->get($this->tablo)->row();

	}

	public function vt_kayit($data=array())
	{

		return $this->db->insert($this->tablo,$data);

	}

	public function vt_guncelle($where=array(), $data=array())
	{

		return $this->db->where($where)->update($this->tablo,$data);

	}

	public function vt_sil($where=array(), $data=array())
	{

		return $this->db->where($where)->delete($this->tablo,$data);

	}

    public function gunluk_toplam($where=array(), $data=array())
    {

        $data=$this->db
            ->where($where)
            ->select_sum('toplam')
            ->from('siparis')
            ->get();

        return $data->result_array();

    }

    public function gunluk_adet($where=array(), $data=array())
    {

        $this->db->where($where);
        return $result = $this->db->get('siparis')->num_rows();

    }







}

