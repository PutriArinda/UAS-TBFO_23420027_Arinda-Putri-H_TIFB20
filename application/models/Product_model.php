<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "member";

    public $id_member;
    public $nama;
    public $alamat;
    public $usia;
    public $pekerjaan;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'usia',
            'label' => 'Usia',
            'rules' => 'numeric'],

            ['field' => 'pekerjaan',
            'label' => 'Pekerjaan',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_member" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_member = uniqid();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->usia = $post["usia"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_member = uniqid();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->usia = $post["usia"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->db->update($this->_table, $this, array('id_member' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_member" => $id));
    }
}
