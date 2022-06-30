<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Kepalatambang extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['email'] || ($this->data['id_role'] != 4))
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
   redirect('Kepalatambang/bonus');
   exit();
}

 

public function bonus(){
    if ($this->uri->segment(3) != 'hasildivisi' && $this->uri->segment(3) != 'hasilhrd' && $this->uri->segment(3) != '') {
        if ($this->Bonus_m->get_num_row(['id_bonus' => $this->uri->segment(3)]) == 0) {
            redirect('Kepalatambang/bonus');
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
        $this->data['content'] = 'kepalatambang/detailbonus';
        $this->template($this->data,'kepalatambang');
      } 
      elseif ($this->uri->segment(3) == 'hasildivisi') {
        if ($this->Bonus_m->get_num_row(['id_bonus' => $this->uri->segment(4)]) == 0) {
            redirect('hrd/bonus');
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
        $this->data['content'] = 'hrd/detailbonus-hasildivisi';
        $this->template($this->data,'hrd');
      } 
      elseif ($this->uri->segment(3) == 'hasilhrd') {
        if ($this->Bonus_m->get_num_row(['id_bonus' => $this->uri->segment(4)]) == 0) {
            redirect('hrd/bonus');
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
        $this->data['content'] = 'hrd/detailbonus-hasilhrd';
        $this->template($this->data,'hrd');
      } 

        
      else {
        $this->data['list_bonus'] = $this->Bonus_m->get_by_order('tgl_buat','desc',['status' => 3]);   
 
        $this->data['index'] = 2;
        $this->data['content'] = 'kepalatambang/bonus';
        $this->template($this->data,'kepalatambang');
      }
}
 
 
 
  // -----------------------------------------------------------------------------------------------------------------
       public function profil(){
       
        $this->data['title']  = 'Profil';
        $this->data['index'] = 6;
        $this->data['content'] = 'kepalatambang/profil';
        $this->template($this->data,'kepalatambang');
     }
    public function proses_edit_profil(){
      if ($this->POST('edit')) {
      
          
          $this->login_m->update($this->POST('email_x'),['email' => $this->POST('email')   ]);    
          $user_session = [
            'email' => $this->POST('email'),  
          ];
          $this->session->set_userdata($user_session);
 
  
          $this->flashmsg('PROFIL BERHASIL DISIMPAN!', 'success');
          redirect('kepalatambang/profil');
          exit();

          } elseif ($this->POST('edit2')) { 
            $data = [ 
              'password' => md5($this->POST('password')) 
            ];
            
            $this->login_m->update($this->data['email'],$data);
        
            $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
            redirect('kepalatambang/profil');
            exit();    
          }  

          else{

          redirect('kepalatambang/profil');
          exit();
          }

    }

   
    public function cekpasslama(){ echo $this->login_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->login_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->login_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

 
}

 ?>
