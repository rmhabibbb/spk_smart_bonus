<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Divisi extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['email'] || ($this->data['id_role'] != 2))
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
    $this->data['ddivisi'] = $this->Divisi_m->get_row(['email' =>$this->data['email'] ]); 
     
    date_default_timezone_set("Asia/Jakarta");


  }

public function index()
{ 
 
      $this->data['list_bonus'] = $this->Bonus_m->get_by_order('id_bonus','desc',['status' =>1]);    
      $this->data['index'] = 1;
      $this->data['content'] = 'divisi/dashboard';
      $this->template($this->data,'divisi');
}

public function penilaian()
{   
    if ($this->POST('input')) {
        $list_kriteria = $this->KriteriaJobdesk_m->get(['kd_divisi' => $this->data['ddivisi']->kd_divisi]);
        $id_bonus = $this->POST('id_bonus');
        $nip = $this->POST('nip');
        foreach ($list_kriteria as $v) { 
 
            $d = $this->DSubJobdesk_m->get_row(['id_sub_jobdesk' => $this->POST('kriteria_'.$v->id_kriteria_jobdesk)]);
             

            $data = [
              'id_kriteria_jobdesk' => $v->id_kriteria_jobdesk,
              'id_bonus' => $id_bonus,
              'nip' => $nip,
              'kd_divisi' => $this->data['ddivisi']->kd_divisi,
              'id_sub_jobdesk' => $this->POST('kriteria_'.$v->id_kriteria_jobdesk),
              'nilai' =>$d->nilai,
              'keterangan' => $d->keterangan 
            ];
            $this->PenilaianDivisi_m->insert($data); 
        }

         $this->flashmsg('NILAI BERHASIL DIINPUT!', 'success');
          redirect('divisi/penilaian/'.$id_bonus);
          exit(); 


    }
    if ($this->POST('edit')) {
        $list_kriteria = $this->KriteriaJobdesk_m->get(['kd_divisi' => $this->data['ddivisi']->kd_divisi]);
        $id_bonus = $this->POST('id_bonus');
        $nip = $this->POST('nip');
        $this->PenilaianDivisi_m->delete_by(['id_bonus' => $id_bonus,'nip' => $nip]);

        foreach ($list_kriteria as $v) { 

              $d = $this->DSubJobdesk_m->get_row(['id_sub_jobdesk' => $this->POST('kriteria_'.$v->id_kriteria_jobdesk)]);
             

            $data = [
              'id_kriteria_jobdesk' => $v->id_kriteria_jobdesk,
              'id_bonus' => $id_bonus,
              'nip' => $nip,
              'kd_divisi' => $this->data['ddivisi']->kd_divisi,
              'id_sub_jobdesk' => $this->POST('kriteria_'.$v->id_kriteria_jobdesk),
              'nilai' =>$d->nilai,
              'keterangan' => $d->keterangan 
            ]; 
            $this->PenilaianDivisi_m->insert($data); 
        }

        $this->flashmsg('NILAI BERHASIL DIEDIT!', 'success');
         redirect('divisi/penilaian/'.$id_bonus);
          exit(); 
    }
    if ($this->POST('hapus')) { 
        $id_bonus = $this->POST('id_bonus');
        $nip = $this->POST('nip'); 
        $this->PenilaianDivisi_m->delete_by(['id_bonus' => $id_bonus,'nip' => $nip]);
        $this->flashmsg('NILAI BERHASIL DIHAPUS!', 'success');
        redirect('divisi/penilaian/'.$id_bonus);
        exit();  
    }

 
    if ($this->uri->segment(3)) {
      if ($this->Bonus_m->get_num_row(['id_bonus' => $this->uri->segment(3)]) == 0) {
        redirect('divisi/');
        exit();  
      }

      $this->data['bonus'] = $this->Bonus_m->get_row(['id_bonus' => $this->uri->segment(3)]);  
      $this->data['list_dp'] = $this->PenilaianDivisi_m->get(['id_bonus' => $this->uri->segment(3)]);  
      $this->data['list_kriteria'] = $this->KriteriaJobdesk_m->get(['kd_divisi' => $this->data['ddivisi']->kd_divisi]);   
      $this->data['list_karyawan'] = $this->Karyawan_m->get(['kd_divisi' => $this->data['ddivisi']->kd_divisi]);   
      $x = 0;
      foreach ($this->data['list_karyawan'] as $k) {
        if ($this->PenilaianDivisi_m->get_num_row(['nip' => $k->nip,'id_bonus' => $this->uri->segment(3)]) != 0) { 
          $x++;
        }
      }
      $this->data['x'] = $x; 
      $this->data['index'] = 1;
      $this->data['content'] = 'divisi/inputnilai';
      $this->template($this->data,'divisi');

    }else{
      redirect('pengawas/');
      exit();    
    }
       
}

 
 
  // -----------------------------------------------------------------------------------------------------------------
        public function profil(){
       
        $this->data['title']  = 'Profil';
        $this->data['index'] = 6;
        $this->data['content'] = 'divisi/profil';
        $this->template($this->data,'divisi');
     }
    public function proses_edit_profil(){
      if ($this->POST('edit')) {
      
          
          $this->login_m->update($this->POST('email_x'),['email' => $this->POST('email')   ]);    
          $user_session = [
            'email' => $this->POST('email'),  
          ];
          $this->session->set_userdata($user_session);
 
  
          $this->flashmsg('PROFIL BERHASIL DISIMPAN!', 'success');
          redirect('divisi/profil');
          exit();

          } elseif ($this->POST('edit2')) { 
            $data = [ 
              'password' => md5($this->POST('password')) 
            ];
            
            $this->login_m->update($this->data['email'],$data);
        
            $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
            redirect('divisi/profil');
            exit();    
          }  

          else{

          redirect('divisi/profil');
          exit();
          }

    }
 

    public function cekpasslama(){ echo $this->login_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->login_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->login_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

 
}

 ?>
