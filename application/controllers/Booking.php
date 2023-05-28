<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');
date_default_timezone_set('Asia/Jakarta');
class Booking extends CI_Controller
{
	public function __construct()
	{  
		parent::__construct();
		cek_login();
		$this->load->model(['ModelBooking', 'ModelUser']);
	}
	public function index()
	{
		$id = ['bo.id_user' => $this->uri->segment(3)];
		$id_user = $this->session->userdata('id_user');
		$data['booking'] = $this->ModelBooking->joinOrder($id)->result();
		$user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		foreach ($user as $a) 
		{
			$data = [
				'image' => $user['image'],
				'user' => $user['nama'],
				'email' => $user['email'],
				'tanggal_input' => $user['tanggal_input']
			];
		}
		$dtb = $this->ModelBooking->showtemp(['id_user' => $id_user])->num_rows();
		if ($dtb < 1) 
		{
			$this->session->set_flashdata('pesan', '<div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
					Tidak Ada Buku dikeranjang
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>');
			redirect(base_url());
		} else {
			$data['temp'] = $this->db->query("select image, judul_buku, penulis, penerbit, tahun_terbit,id_buku from temp where id_user='$id_user'")->result_array();
		}


		$data['judul'] = "Data Booking";
		$this->load->view('templates/templates-user/header', $data);
		$this->load->view('booking/data-booking', $data);
		$this->load->view('templates/templates-user/modal');
		$this->load->view('templates/templates-user/footer');
	}

	public function tambahBooking()
	{
		$id_buku = $this->uri->segment(3);

		//memilih data buku yang untuk dimasukkan ke tabel temp/keranjang melalui variabel $isi
		$d = $this->db->query("Select*from buku where id='$id_buku'")->row();

		//berupa data2 yang akan disimpan ke dalam tabel temp/keranjang
		$isi = [
			'id_buku' => $id_buku,
			'judul_buku' => $d->judul_buku,
			'id_user' => $this->session->userdata('id_user'),
			'email_user' => $this->session->userdata('email'),
			'tgl_booking' => date('Y-m-d H:i:s'),
			'image' => $d->image,
			'penulis' => $d->pengarang,
			'penerbit' => $d->penerbit,
			'tahun_terbit' => $d->tahun_terbit
		];

		//cek apakah buku yang di klik booking sudah ada di keranjang
		$temp = $this->ModelBooking->getDataWhere('temp', ['id_buku' => $id_buku])->num_rows();
		$userid = $this->session->userdata('id_user');

		//cek jika sudah memasukan 3 buku untuk dibooking dalam keranjang
		$tempuser = $this->db->query("select*from temp where id_user ='$userid'")->num_rows();

		//cek jika masih ada booking buku yang belum diambil
		$databooking = $this->db->query("select*from booking where id_user='$userid'")->num_rows();
		if ($databooking > 0) 
		{

			$this->session->set_flashdata('pesan', '<div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
						Masih Ada booking buku sebelumnya yang belum diambil.<br> Ambil Buku yang dibooking atau tunggu 1x24 Jam untuk bisa booking kembali
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>');
		
			redirect(base_url());
		}

		//jika buku yang diklik booking sudah ada di keranjang
		if ($temp > 0) 
		{
			$this->session->set_flashdata('pesan', '<div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
						Buku ini Sudah anda booking
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>');
			redirect(base_url() . 'home');
		}

		//jika buku yang akan dibooking sudah mencapai 3 item
		if ($tempuser == 3) 
		{
			$this->session->set_flashdata('pesan', '<div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
					>Booking Buku Tidak Boleh Lebih dari 3
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>');
			redirect(base_url() . 'home');
		}

		//membuat tabel temp jika belum ada
		$this->ModelBooking->createTemp();
		$this->ModelBooking->insertData('temp', $isi);

		//pesan ketika berhasil memasukkan buku ke keranjang
		$this->session->set_flashdata('pesan', '<div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
		<svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
		<span class="sr-only">Info</span>
		<div class="ml-3 text-sm font-medium">
		Buku berhasil ditambahkan ke keranjang
		</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
		  <span class="sr-only">Close</span>
		  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	  </div>');
		
		redirect(base_url() . 'home');
	}

	public function hapusbooking()
	{
		$id_buku = $this->uri->segment(3);
		$id_user = $this->session->userdata('id_user');

		$this->ModelBooking->deleteData(['id_buku' => $id_buku], 'temp');
		$kosong = $this->db->query("select*from temp where id_user='$id_user'")->num_rows();
		if ($kosong < 1) 
		{
			$this->session->set_flashdata('pesan', '<div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
			<svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			<span class="sr-only">Info</span>
			<div class="ml-3 text-sm font-medium">
			  Tidak ada, Buku dikeranjang
			</div>
			<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
			  <span class="sr-only">Close</span>
			  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
		  </div>');
			
			redirect(base_url());
		} else {
			redirect(base_url() . 'booking');
		}
	}

	public function bookingSelesai($where)
	{
		//mengupdate stok dan dibooking di tabel buku saat proses booking diselesaikan
		$this->db->query("UPDATE buku, temp SET buku.dibooking=buku.dibooking+1, buku.stok=buku.stok-1 WHERE buku.id=temp.id_buku");
		$tglsekarang = date('Y-m-d');
		$isibooking = [
			'id_booking' => $this->ModelBooking->kodeOtomatis('booking', 'id_booking'),
			'tgl_booking' => date('Y-m-d H:m:s'),
			'batas_ambil' => date('Y-m-d', strtotime('+2 days', strtotime($tglsekarang))),
			'id_user' => $where
		];
		//menyimpan ke tabel booking dan detail booking, dan mengosongkan tabel temporari
		$this->ModelBooking->insertData('booking', $isibooking);
		$this->ModelBooking->simpanDetail($where);
		$this->ModelBooking->kosongkanData('temp');
		redirect(base_url() . 'booking/info');
	}

	public function info()
	{
		$where = $this->session->userdata('id_user');
		$data['user'] = $this->session->userdata('nama');
		$data['judul'] = "Selesai Booking";
		$data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
		$data['items'] = $this->db->query("select*from booking bo, booking_detail d, buku bu where d.id_booking=bo.id_booking and d.id_buku=bu.id and bo.id_user='$where'")->result_array();
		$this->load->view('templates/templates-user/header', $data);
		$this->load->view('booking/info-booking', $data);
		$this->load->view('templates/templates-user/modal');
		$this->load->view('templates/templates-user/footer');
	}


	public function exportToPdf()
	{
		$id_user = $this->session->userdata('id_user');
		$data['user'] = $this->session->userdata('nama');
		$data['judul'] = "Cetak Bukti Booking";
		$data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
		$data['items'] = $this->db->query("select*from booking bo, booking_detail d, buku bu where d.id_booking=bo.id_booking and d.id_buku=bu.id and bo.id_user='$id_user'")->result_array();

		$this->load->library('dompdf_gen');

		$this->load->view('booking/bukti-pdf', $data);

		$paper_size = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("bukti-booking-$id_user.pdf", array('Attachment' => 0));
	}
}
