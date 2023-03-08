<?php 
namespace App\Controllers;
use App\Models\ModelBarang;


class Home extends BaseController
{

	public function __construct() 
	{
		$this->ModelBarang = new ModelBarang();
		helper('number');
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Daftar Barang',
			'barang' => $this->ModelBarang->getBarang(),
			'cart' => \Config\Services::cart(),
			'isi' => 'v_home',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$cart = \Config\Services::cart();
		$cart->insert(array(
			'id'      => $this->request->getPost('id'),
			'qty'     => 1,
			'price'   => $this->request->getPost('price'),
			'name'    => $this->request->getPost('name'),
			'options' => array(
				'gambar' => $this->request->getPost('gambar'), 
				'deskripsi' => $this->request->getPost('deskripsi'),
				)
	 ));
	 session()->setFlashdata('pesan', 'Barang Berhasil Dimasukkan Keranjang');
	 return redirect()->to(base_url('home'));
	}

	public function clear()
	{
		$cart = \Config\Services::cart();
		$cart->destroy();
		session()->setFlashdata('pesan', 'Semua Data Keranjang Berhasil Dibersihkan');
		return redirect()->to(base_url('home/view'));
	}

	public function view()
	{
		$data = [
			'title' => 'View Chart',
			'cart' => \Config\Services::cart(),
			'isi' => 'v_cart',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function update()
	{
		
		$cart = \Config\Services::cart();
		$i= 1;
		foreach ($cart->contents() as $key => $value) {
			$cart->update(array(
				'rowid'   => $value['rowid'],
				'qty'     => $this->request->getPost('qty'.$i++), 
		 ));
		}
		session()->setFlashdata('pesan', 'Data Keranjang Berhasil Diupdate Keranjang');
		return redirect()->to(base_url('home/view'));
		
	}

	public function delete($rowid)
	{
		$cart = \Config\Services::cart();
		$cart->remove($rowid);
		session()->setFlashdata('pesan', 'Data Keranjang Berhasil Dihapus Keranjang');
		return redirect()->to(base_url('home/view'));
		
	}
	

}
