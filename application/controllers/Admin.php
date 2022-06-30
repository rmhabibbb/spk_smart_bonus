<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['email'] || ($this->data['id_role'] != 1))
          {
            $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda harus login terlebih dahulu', 'danger');
            redirect('login');
            exit;
          }  
    
    $this->load->model('login_m');  
    $this->load->model('Karyawan_m');  
    $this->load->model('KriteriaUmum_m');   
    $this->load->model('DSubUmum_m');   
    $this->load->model('KriteriaJobdesk_m');      
    $this->load->model('DSubJobdesk_m');   
    $this->load->model('PenilaianHRD_m');     
    $this->load->model('PenilaianDivisi_m');    
    $this->load->model('Bonus_m');  
    $this->load->model('Divisi_m');    
    
    $this->data['profil'] = $this->login_m->get_row(['email' =>$this->data['email'] ]); 
     
    date_default_timezone_set("Asia/Jakarta");


  }

public function index()
{ 

      $this->data['title']  = 'Beranda'; 
      $this->data['index'] = 1;
      $this->data['content'] = 'admin/dashboard';
      $this->template($this->data,'admin');
}
 

// KELOLA KRITERA   ----------------------------------------------------------------------------
    

    public function kriteriaumum(){
      if ($this->POST('tambah')) {     



        $data = [   
          'id_kriteria_umum' => $this->POST('id_kriteria_umum') ,
          'nama_kriteria' => $this->POST('nama_kriteria') ,
          'bobot' => $this->POST('bobot')
        ];
        $this->KriteriaUmum_m->insert($data);   

        $this->flashmsg('KRITERA BERHASIL DITAMBAH!', 'success');
        redirect('admin/kriteriaumum/'.$this->POST('id_kriteria_umum'));
        exit();    
      }  

      if ($this->POST('edit')) { 
        $data = [    
          'nama_kriteria' => $this->POST('nama_kriteria') ,
          'bobot' => $this->POST('bobot') 
        ];

        $this->KriteriaUmum_m->update($this->POST('id_kriteria_umum'),$data);

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/kriteriaumum/'.$this->POST('id_kriteria_umum'));
        exit();    
      } 

      if ($this->POST('hapus')) {  
           
        $this->KriteriaUmum_m->delete($this->POST('id_kriteria_umum'));
 
        $this->flashmsg('Kriteria berhasil dihapus!', 'success');
        redirect('admin/kriteriaumum/');
        exit();    
      } 

       

      if ($this->uri->segment(3) && !$this->uri->segment(4)) {
        if ($this->KriteriaUmum_m->get_num_row(['id_kriteria_umum' => $this->uri->segment(3)]) == 1) {
          $this->data['kriteria'] = $this->KriteriaUmum_m->get_row(['id_kriteria_umum' => $this->uri->segment(3)]);   
          $this->data['list_detail'] = $this->DSubUmum_m->get(['id_kriteria_umum' => $this->uri->segment(3) ]);    
            
          $this->data['totalbobot'] = $this->KriteriaUmum_m->get_totalbobot();    
          $this->data['index'] = 5;
          $this->data['content'] = 'admin/detailkriteriaumum';
          $this->template($this->data,'admin'); 
        }else {
          redirect('admin/kriteriaumum');
          exit();
        }
      } 
      else {
        $this->data['list_kriteria'] = $this->KriteriaUmum_m->get();  
        $this->data['totalbobot'] = $this->KriteriaUmum_m->get_totalbobot();    
        $this->data['index'] = 5;
        $this->data['content'] = 'admin/kriteriaumum';
        $this->template($this->data,'admin');
      }
    } 

 
    public function detailkriteriaumum(){
      if ($this->POST('tambah')) {     
        $data = [   
          'keterangan' => $this->POST('keterangan'),
          'nilai' => $this->POST('nilai'),
          'id_kriteria_umum' => $this->POST('id_kriteria_umum')
        ];
        $this->DSubUmum_m->insert($data);
        $id = $this->db->insert_id();

        $this->flashmsg('DETAIL BERHASIL DITAMBAH!', 'success');
        redirect('admin/kriteriaumum/'.$this->POST('id_kriteria_umum'));
        exit();  
      }  

      if ($this->POST('edit')) { 
        $data = [   
          'keterangan' => $this->POST('keterangan'),
          'nilai' => $this->POST('nilai'),
        ];

        $this->DSubUmum_m->update($this->POST('id_sub_umum'),$data);

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/kriteriaumum/'.$this->POST('id_kriteria_umum'));
        exit();    
      } 

      if ($this->POST('hapus')) {   
        $id_kriteria = $this->POST('id_kriteria_umum'); 
        $id = $this->POST('id_sub_umum'); 
        
           
        $this->DSubUmum_m->delete($id); 
 
        $this->flashmsg('DETAIL BERHASIL DIHAPUS!', 'success');
        redirect('admin/kriteriaumum/'.$id_kriteria );
        exit();    
      }  
    } 



    public function kriteriajobdesk(){
      if ($this->POST('tambah')) {     
        $data = [   
          'id_kriteria_jobdesk' => $this->POST('id_kriteria_jobdesk') ,
          'nama_kriteria' => $this->POST('nama_kriteria') ,
          'bobot' => $this->POST('bobot') ,
          'kd_divisi' => $this->POST('kd_divisi')
        ];
        $this->KriteriaJobdesk_m->insert($data);   

        $this->flashmsg('KRITERA BERHASIL DITAMBAH!', 'success');
        redirect('admin/kriteriajobdesk/'.$this->POST('id_kriteria_jobdesk'));
        exit();    
      }  

      if ($this->POST('edit')) { 
        $data = [    
          'nama_kriteria' => $this->POST('nama_kriteria') ,
          'bobot' => $this->POST('bobot') ,
          'kd_divisi' => $this->POST('kd_divisi')
        ];

        $this->KriteriaJobdesk_m->update($this->POST('id_kriteria_jobdesk'),$data);

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/kriteriajobdesk/'.$this->POST('id_kriteria_jobdesk'));
        exit();    
      } 

      if ($this->POST('hapus')) {  
           
        $this->KriteriaJobdesk_m->delete($this->POST('id_kriteria_jobdesk'));
 
        $this->flashmsg('Kriteria berhasil dihapus!', 'success');
        redirect('admin/kriteriajobdesk/');
        exit();    
      } 

      
      elseif ($this->uri->segment(3)) {
        if ($this->KriteriaJobdesk_m->get_num_row(['id_kriteria_jobdesk' => $this->uri->segment(3)]) == 1) {
          $this->data['kriteria'] = $this->KriteriaJobdesk_m->get_row(['id_kriteria_jobdesk' => $this->uri->segment(3)]);     
          $this->data['list_detail'] = $this->DSubJobdesk_m->get(['id_kriteria_jobdesk' => $this->uri->segment(3) ]);    
          $this->data['totalbobot'] = $this->KriteriaJobdesk_m->get_totalbobot($this->data['kriteria']->kd_divisi);  
          $this->data['list_divisi'] = $this->Divisi_m->get();     
          $this->data['index'] = 6;
          $this->data['content'] = 'admin/detailkriteriajobdesk';
          $this->template($this->data,'admin'); 
        }else {
          redirect('admin/kriteriajobdesk');
          exit();
        }
      }

     
      else {
        $this->data['list_kriteria'] = $this->KriteriaJobdesk_m->get();  
        $this->data['list_divisi'] = $this->Divisi_m->get();    
        $this->data['index'] = 6;
        $this->data['content'] = 'admin/kriteriajobdesk';
        $this->template($this->data,'admin');
      }
    } 

     
    public function detailkriteriajobdesk(){
      if ($this->POST('tambah')) {     
        $data = [   
          'keterangan' => $this->POST('keterangan'),
          'nilai' => $this->POST('nilai'),
          'id_kriteria_jobdesk' => $this->POST('id_kriteria_jobdesk')
        ];
        $this->DSubJobdesk_m->insert($data);
        $id = $this->db->insert_id();

        $this->flashmsg('DETAIL BERHASIL DITAMBAH!', 'success');
        redirect('admin/kriteriajobdesk/'.$this->POST('id_kriteria_jobdesk'));
        exit();  
      }  

      if ($this->POST('edit')) { 
        $data = [   
          'keterangan' => $this->POST('keterangan'),
          'nilai' => $this->POST('nilai'),
        ];

        $this->DSubJobdesk_m->update($this->POST('id_sub_jobdesk'),$data);

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/kriteriajobdesk/'.$this->POST('id_kriteria_jobdesk') );
        exit();    
      } 

      if ($this->POST('hapus')) {   
        $id_kriteria = $this->POST('id_kriteria_jobdesk'); 
        $id = $this->POST('id_sub_jobdesk'); 
        
           
        $this->DSubJobdesk_m->delete($id); 
 
        $this->flashmsg('DETAIL BERHASIL DIHAPUS!', 'success');
        redirect('admin/kriteriajobdesk/'.$id_kriteria );
        exit();    
      }  
    } 

   
     
// KELOLA KRITERIA  ---------------------------------------------------------------------
 
 
 // KELOLA divisi ----------------------------------------------------------------------------

    public function divisi(){
      if ($this->POST('tambah')) { 
        if ($this->Divisi_m->get_num_row(['kd_divisi' => $this->POST('kd_divisi')]) != 0) {
          $this->flashmsg('Kode Divisi telah digunakan!', 'warning');
          redirect('admin/formdivisi/');
          exit();   
        } 

        if ($this->login_m->get_num_row(['email' => $this->POST('email')]) != 0) {
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('admin/formdivisi/');
          exit();   
        }  
        $data = [    
          'email' => $this->POST('email') ,
          'password' => md5($this->POST('password')) , 
          'role' => 2
        ];
        $this->login_m->insert($data); 

        $data = [    
          'kd_divisi' => $this->POST('kd_divisi') , 
          'nama_divisi' => $this->POST('nama_divisi') , 
          'deskripsi' => $this->POST('deskripsi') , 
          'email' => $this->POST('email') 
        ];
        $this->Divisi_m->insert($data); 
        $id = $this->db->insert_id();
        $this->flashmsg('DATA DIVISI BERHASIL DITAMBAH!', 'success');
        redirect('admin/divisi/'.$id);
        exit();    
      }  

      elseif ($this->POST('edit')) { 
        
        $email_x = $this->POST('email_x');
        $email = $this->POST('email');

        $kd_divisi_x = $this->POST('kd_divisi_x');
        $kd_divisi = $this->POST('kd_divisi');
        

        if ($this->Divisi_m->get_num_row(['kd_divisi' => $kd_divisi]) != 0 && $kd_divisi_x != $kd_divisi) {
          $this->flashmsg('Kode divisi telah digunakan!', 'warning');
          redirect('admin/divisi/'.$kd_divisi);
          exit();   
        } 


        if ($this->login_m->get_num_row(['email' => $email]) != 0 && $email_x != $email) {
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('admin/divisi/'.$kd_divisi);
          exit();   
        }  
        $data = [    
          'email' => $email  
        ];
        $this->login_m->update($email_x,$data); 

        $data = [    
          'kd_divisi' => $this->POST('kd_divisi') , 
          'nama_divisi' => $this->POST('nama_divisi') , 
          'deskripsi' => $this->POST('deskripsi') , 
        ];
        $this->Divisi_m->update($kd_divisi_x,$data); 

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/divisi/'.$kd_divisi);
        exit();    
      } 
      elseif ($this->POST('edit2')) {   

        $data = [     
          'password' => md5($this->POST('password')) 
        ];
        $this->login_m->update($this->POST('email'),$data); 

        $this->flashmsg('Password berhasil diganti!', 'success');
        redirect('admin/divisi/'.$this->POST('kd_divisi'));
        exit();    
      }
      elseif ($this->POST('hapus')) {
        $this->login_m->delete($this->POST('email'));
         $this->flashmsg('DATA DIVISI BERHASIL DIHAPUS!', 'success');
        redirect('admin/divisi/' );
        exit(); 

      }

      else if ($this->uri->segment(3)) {
        if ($this->Divisi_m->get_num_row(['kd_divisi' => $this->uri->segment(3)]) == 1) {
          $this->data['divisi'] = $this->Divisi_m->get_row(['kd_divisi' => $this->uri->segment(3)]);    
           
 
          $this->data['index'] = 3; 
          $this->data['content'] = 'admin/detaildivisi';
          $this->template($this->data,'admin'); 
        }else {
          redirect('admin/divisi');
          exit();
        }
      }  
     
      else {
        $this->data['list_divisi'] = $this->Divisi_m->get();  
        $this->data['index'] = 3;
        $this->data['content'] = 'admin/divisi';
        $this->template($this->data,'admin');
      }
    } 
 
    public function formdivisi(){ 
      $this->data['index'] = 3;
      $this->data['content'] = 'admin/form-tambahdivisi';
      $this->template($this->data,'admin');
      
    } 
// KELOLA divisi ---------------------------------------------------------------------
 
// KELOLA KARYAWAN ----------------------------------------------------------------------------

    public function karyawan(){
      if ($this->POST('tambah')) { 
        if ($this->Karyawan_m->get_num_row(['nip' => $this->POST('nip')]) != 0) {
          $this->flashmsg('NIP Karyawan telah digunakan!', 'warning');
          redirect('admin/formkaryawan/');
          exit();   
        }  

        if ($this->login_m->get_num_row(['email' => $this->POST('email')]) != 0) {
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('admin/formkaryawan/');
          exit();   
        }  

        


        $data = [    
          'email' => $this->POST('email') ,
          'password' => md5($this->POST('password')) , 
          'role' => 5
        ];
        $this->login_m->insert($data); 
 

        $data = [    
          'nip' => $this->POST('nip'),
          'nama' => $this->POST('nama_karyawan') ,
          'jk' => $this->POST('jk') , 
          'alamat' => $this->POST('alamat') ,
          'kd_divisi' => $this->POST('kd_divisi') ,
          'no_telp' => $this->POST('no_hp'),
          'email' => $this->POST('email') 
        ];
        $this->Karyawan_m->insert($data);  
        $this->flashmsg('DATA KARYAWAN BERHASIL DITAMBAH!', 'success');
        redirect('admin/karyawan/'.$this->POST('nip'));
        exit();    
      }  

      if ($this->POST('edit')) { 
        
        $email_x = $this->POST('email_x');
        $email = $this->POST('email');
        $nip = $this->POST('nip');
        $nip_x = $this->POST('nip_x');
        if ($this->login_m->get_num_row(['email' => $email]) != 0 && $email_x != $email) {
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('admin/karyawan/'.$nip);
          exit();   
        }  

        if ($this->Karyawan_m->get_num_row(['nip' => $nip]) != 0 && $nip_x != $nip) {
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('admin/karyawan/'.$nip);
          exit();   
        }  
        $data = [    
          'email' => $email  
        ];
        $this->login_m->update($email_x,$data); 
 

        $data = [    
          'nip' => $this->POST('nip'),
          'nama' => $this->POST('nama_karyawan') ,
          'jk' => $this->POST('jk') , 
          'alamat' => $this->POST('alamat') ,
          'kd_divisi' => $this->POST('kd_divisi') ,
          'no_telp' => $this->POST('no_hp') 
        ];
        $this->Karyawan_m->update($nip_x,$data); 

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/karyawan/'.$nip);
        exit();    
      } 

      if ($this->POST('edit2')) {  


        $data = [     
          'password' => md5($this->POST('password')) 
        ];
        $this->login_m->update($this->POST('email'),$data); 

        $this->flashmsg('Password berhasil diganti!', 'success');
        redirect('admin/karyawan/'.$this->POST('nip'));
        exit();    
      } 

      if ($this->POST('hapus')) {
        $this->login_m->delete($this->POST('email'));
         $this->flashmsg('DATA KARYAWAN BERHASIL DIHAPUS!', 'success');
        redirect('admin/karyawan/' );
        exit(); 

      } 

      if ($this->uri->segment(3)) {
        if ($this->Karyawan_m->get_num_row(['nip' => $this->uri->segment(3)]) == 1) {
          $this->data['karyawan'] = $this->Karyawan_m->get_row(['nip' => $this->uri->segment(3)]);    
           
          
          $this->data['list_divisi'] = $this->Divisi_m->get(); 
          $this->data['index'] = 4; 
          $this->data['content'] = 'admin/detailkaryawan';
          $this->template($this->data,'admin'); 
        }else {
          redirect('admin/karyawan');
          exit();
        }
      }

     
      else {
        $this->data['list_karyawan'] = $this->Karyawan_m->get();   
        $this->data['index'] = 4;
        $this->data['content'] = 'admin/karyawan';
        $this->template($this->data,'admin');
      }
    } 
 
    public function formkaryawan(){
      
      $this->data['list_divisi'] = $this->Divisi_m->get(); 
      $this->data['index'] = 4;
      $this->data['content'] = 'admin/form-tambahkaryawan';
      $this->template($this->data,'admin');
      
    } 
// KELOLA KARYAWAN ---------------------------------------------------------------------
 

  public function bonus(){

      if ($this->POST('tambah')) {    

        if ($this->Bonus_m->get_num_row(['periode' => $this->POST('periode'), 'tahun' => $this->POST('tahun')]) != 0) {
          $this->flashmsg('PERIODE BONUS SUDAH TERSEDIA!', 'warning');
          redirect('admin/bonus/');
          exit();  
        }

        $data = [   
          'periode' => $this->POST('periode') ,
          'tahun' => $this->POST('tahun'),
          'jumlah_bonus' => $this->POST('jmh'),
          'bataswaktu_penilaian_divisi' => $this->POST('dl_divisi'),
          'bataswaktu_penilaian_hrd' => $this->POST('dl_hrd'), 
          'status' => 1,
          'tgl_buat' => date('Y-m-d H:i:s')
        ];
        $this->Bonus_m->insert($data); 
        $id = $this->db->insert_id(); 

        $this->flashmsg('BONUS TAHUNAN BERHASIL DIBUAT!', 'success');
        redirect('admin/bonus/'.$id  );
        exit();    
      }

      elseif ($this->POST('edit')) {    
 

        $data = [    
          'jumlah_bonus' => $this->POST('jmh'),
          'bataswaktu_penilaian_divisi' => $this->POST('dl_divisi'),
          'bataswaktu_penilaian_hrd' => $this->POST('dl_hrd') 
        ];
        $this->Bonus_m->update($this->POST('id_bonus'),$data);  

        $this->flashmsg('BONUS TAHUNAN BERHASIL DISIMPAN!', 'success');
        redirect('admin/bonus/'.$this->POST('id_bonus')  );
        exit();    
      }


      elseif ($this->POST('hapus')) {  
        $this->Bonus_m->delete($this->POST('id_bonus'));
 
        $this->flashmsg('Bonus Tahunan berhasil dihapus!', 'success');
        redirect('admin/bonus');
        exit();    
      } 

      elseif ($this->POST('selesai')) {  
        $this->Bonus_m->update($this->POST('id_bonus'),['status' => 2]);
 
        $this->flashmsg('Tahap Penilaian Divisi berhasil ditutup, beralih ke tahap penilaian HRD!', 'success');
        redirect('admin/bonus/'.$this->POST('id_bonus'));
        exit();    
      } 
      elseif ($this->POST('selesai2')) {  
        $this->Bonus_m->update($this->POST('id_bonus'),['status' => 3]);
 
        $this->flashmsg('Tahap Penilaian HRD berhasil ditutup, laporan berhasil dibuat!', 'success');
        redirect('admin/bonus/'.$this->POST('id_bonus'));
        exit();    
      }   

      elseif ($this->uri->segment(3) != 'hasildivisi' && $this->uri->segment(3) != 'hasilhrd' && $this->uri->segment(3) != '') {
        if ($this->Bonus_m->get_num_row(['id_bonus' => $this->uri->segment(3)]) == 0) {
            redirect('admin/bonus');
            exit();  
        }
        
        $this->data['list_karyawan'] = $this->Karyawan_m->get(); 
        $this->data['list_divisi'] = $this->Divisi_m->get(); 
        
        $this->data['bonus'] = $this->Bonus_m->get_row(['id_bonus' => $this->uri->segment(3)]);   
        if ($this->data['bonus']->status == 3) {
          $smart_divisi = $this->PenilaianDivisi_m->SMART($this->uri->segment(3));
          $smart_hrd = $this->PenilaianHRD_m->SMART($this->uri->segment(3));
          $hasilakhir = array();
          for ($i=0; $i < sizeof($smart_hrd['nilai_akhir']) ; $i++) { 
            $data = [
              'hasil_akhir' => $smart_hrd['nilai_akhir'][$i]['nilai'] + $smart_divisi['nilai_akhir'][$i]['nilai'],
              'nip' => $smart_hrd['nilai_akhir'][$i]['nip'],
              'nama_karyawan' => $smart_hrd['nilai_akhir'][$i]['nama_karyawan'],
              'divisi' => $smart_divisi['nilai_akhir'][$i]['nilai'],
              'hrd' => $smart_hrd['nilai_akhir'][$i]['nilai']
            ];
            array_push($hasilakhir, $data);

          }
          rsort($hasilakhir);
          $this->data['ha'] = $hasilakhir;



        }
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/detailbonus';
        $this->template($this->data,'admin');
      } 
      elseif ($this->uri->segment(3) == 'hasildivisi') {
        if ($this->Bonus_m->get_num_row(['id_bonus' => $this->uri->segment(4)]) == 0) {
            redirect('admin/bonus');
            exit();  
        }
        
        $spkdivisi = $this->PenilaianDivisi_m->SMART($this->uri->segment(4));
        $this->data['nilai_awal'] = $spkdivisi['nilai_awal']; 
        $this->data['nilai_utility'] = $spkdivisi['nilai_utility']; 
        $this->data['nilai_pre'] = $spkdivisi['nilai_pre']; 
        $this->data['nilai_akhir'] = $spkdivisi['nilai_akhir']; 
        $this->data['bobot'] = $spkdivisi['bobot']; 
        $this->data['bonus'] = $this->Bonus_m->get_row(['id_bonus' => $this->uri->segment(4)]);   
        
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/detailbonus-hasildivisi';
        $this->template($this->data,'admin');
      } 
      elseif ($this->uri->segment(3) == 'hasilhrd') {
        if ($this->Bonus_m->get_num_row(['id_bonus' => $this->uri->segment(4)]) == 0) {
            redirect('admin/bonus');
            exit();  
        }
        
        $this->data['list_kriteria'] = $this->KriteriaUmum_m->get();
        $spkdivisi = $this->PenilaianHRD_m->SMART($this->uri->segment(4));
        $this->data['nilai_awal'] = $spkdivisi['nilai_awal']; 
        $this->data['nilai_utility'] = $spkdivisi['nilai_utility']; 
        $this->data['nilai_pre'] = $spkdivisi['nilai_pre']; 
        $this->data['nilai_akhir'] = $spkdivisi['nilai_akhir']; 
        $this->data['bobot'] = $spkdivisi['bobot']; 
        $this->data['bonus'] = $this->Bonus_m->get_row(['id_bonus' => $this->uri->segment(4)]);   
        
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/detailbonus-hasilhrd';
        $this->template($this->data,'admin');
      } 

        
      else {
        $this->data['list_bonus'] = $this->Bonus_m->get_by_order('tgl_buat','desc',[]);   
 
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/bonus';
        $this->template($this->data,'admin');
      }
    }
 
 
  // -----------------------------------------------------------------------------------------------------------------
       public function profil(){
       
        $this->data['title']  = 'Profil';
        $this->data['index'] = 6;
        $this->data['content'] = 'admin/profil';
        $this->template($this->data,'admin');
     }
    public function proses_edit_profil(){
      if ($this->POST('edit')) {
      
          
          $this->login_m->update($this->POST('email_x'),['email' => $this->POST('email')   ]);    
          $user_session = [
            'email' => $this->POST('email'),  
          ];
          $this->session->set_userdata($user_session);
 
  
          $this->flashmsg('PROFIL BERHASIL DISIMPAN!', 'success');
          redirect('admin/profil');
          exit();

          } elseif ($this->POST('edit2')) { 
            $data = [ 
              'password' => md5($this->POST('password')) 
            ];
            
            $this->login_m->update($this->data['email'],$data);
        
            $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
            redirect('admin/profil');
            exit();    
          }  

          else{

          redirect('admin/profil');
          exit();
          }

    }
 

    public function cekpasslama(){ echo $this->login_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->login_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->login_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

 
}

 ?>
