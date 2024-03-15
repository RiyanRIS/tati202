<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['kriteria_model', 'subkriteria_model', 'siswa_model', 'nilai_model', 'kelas_model']);
    if ($this->session->userdata()['role'] != 'admin') {
      $this->session->set_flashdata('error', "Maaf, Anda tidak berhak mengakses halaman ini.");
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  function index()
  {
    $data = array(
      'title' => "Alternatif Nilai Siswa",
      "nilai" => $this->nilai_model->get_nilai(),
    );
    $this->load->view('view_nilai', $data);
  }

  function aksi()
  {
    $data = array(
      'title' => "Tambah Alternatif Nilai Siswa",
      "kelas" => $this->kelas_model->get(),
      "kriteria" => $this->kriteria_model->get(),
      "is_update" => 0
    );
    $this->load->view('aksi', $data);
  }

  function api($param, $param2 = null)
  {
    $msg = array(
      'status' => false,
      'kode_status' => 201,
      'message' => "Data yang dikirim tidak sesuai"
    );

    if ($this->input->is_ajax_request()) {
      $post = $this->input->post(null, true);
      if ($param == 'ubah') {
        $is_update   = $post['is_update'];
        unset($post['is_update']);
        unset($post['kelas']);

        $is_empty[] = !empty($post['nis']) ? 0 : 1;
        // $is_empty[] = !empty($post['kode_kriteria']) ? 0 : 1;
        // $is_empty[] = !empty($post['nilai']) ? 0 : 1;

        $empty_notif = array(
          'nis',
          // 'kode_kriteria',
          // 'nilai',
        );

        $empty = array_keys($is_empty, 1);
        $empty_field = '';
        $filtered_empty_field = array();
        foreach ($empty as $ekey => $eval) {
          $filtered_empty_field[] = $empty_notif[$eval];
        }
        $empty_field = implode(", ", $filtered_empty_field);
        $number_of_empty_field = array_sum($is_empty);

        foreach ($post['nilai'] as $kode_kriteria => $nilai) {
          if($kode_kriteria == "C1"){
            if($nilai > 100){
              $number_of_empty_field++;
              $filtered_empty_field[] = array_push($filtered_empty_field, ["nilai[C1]"]);
            }
          }
          if($kode_kriteria == "C4"){
            if($nilai > 100){
              $number_of_empty_field++;
              $filtered_empty_field[] = array_push($filtered_empty_field, ["nilai[C4]"]);
            }
          }
          if($kode_kriteria == "C2"){
            if($nilai > 12){
              $number_of_empty_field++;
              $filtered_empty_field[] = array_push($filtered_empty_field, ["nilai[C2]"]);
            }
          }
        }

        if ($number_of_empty_field == 0) {

          if ($is_update == "1") {
            foreach ($post['nilai'] as $kode_kriteria => $nilai) {
              $where = array(
                'nis' => $post['nis'],
                'kode_kriteria' => $kode_kriteria,
              );
              $set = array(
                'nilai' => $nilai
              );
              $this->nilai_model->update($set, $where);
            }
            $this->session->set_flashdata('success', "Berhasil mengubah data alternatif nilai.");
            $msg = array(
              'status' => true,
              'kode_status' => 200,
              'message' => "Berhasil mengubah data alternatif nilai.",
              'url' => site_url('nilai')
            );
          } else {
            foreach ($post['nilai'] as $kode_kriteria => $nilai) {
              $insert = array(
                'nis' => $post['nis'],
                'kode_kriteria' => $kode_kriteria,
                'nilai' => $nilai
              );
              $this->nilai_model->insert($insert);
            }
            $this->session->set_flashdata('success', "Berhasil menambah data alternatif nilai.");
            $msg = array(
              'status' => true,
              'kode_status' => 200,
              'message' => "Berhasil menambah data alternatif nilai.",
              'url' => site_url('nilai')
            );
          }
        } else {
          $msg['err_form'] = $filtered_empty_field;
          $msg['message'] = 'Data belum lengkap. Silakan isi ' . $empty_field . '.';
        }
      } else if ($param == 'get_subkriteria') {
        $subkriteria = $this->subkriteria_model->get_join_kriteria($post['kode_kriteria']);
        $msg['data'] = $subkriteria;
        $msg['status'] = true;
        $msg['kode_status'] = 200;
        $msg['message'] = "Berhasil!";
      } else if ($param == 'get_kriteria_by_nis') {
        $kriteria = $this->kriteria_model->get_kriteria_by_nis($post['nis']);
        $msg['data'] = $kriteria;
        $msg['status'] = true;
        $msg['kode_status'] = 200;
        $msg['message'] = "Berhasil!";
      } else if ($param == 'get_siswa_by_kelas') {
        $kriteria = $this->kriteria_model->get_siswa_by_kelas($post['kode_kelas']);
        $msg['data'] = $kriteria;
        $msg['status'] = true;
        $msg['kode_status'] = 200;
        $msg['message'] = "Berhasil!";
      } else if ($param == 'get_nilai_siswa') {
        if (!empty($post['nis'])) {
          $nis = $post['nis'];

          // Panggil model untuk mengambil nilai siswa berdasarkan NIS dan Kriteria
          $nilai_siswa = $this->nilai_model->get_nilai_siswa($nis);

          if (!empty($nilai_siswa)) {
            $msg['data'] = $nilai_siswa;
            $msg['status'] = true;
            $msg['kode_status'] = 200;
            $msg['message'] = "Berhasil!";
          } else {
            $msg['message'] = "Data nilai siswa tidak ditemukan.";
          }
        } else {
          $msg['message'] = "NIS harus disertakan dalam permintaan.";
        }
      } else if ($param == 'ambil') {
        $id = $param2;
        $data = $this->nilai_model->get_nilai_by_id($id);
        if (count($data) != 0) {
          $html = $this->load->view('modal_ubahnilai', ['record' => $data[0]], true);
          $msg = array(
            'status' => true,
            'kode_status' => 200,
            'message' => "Berhasil mengambil data siswa.",
            'html' => $html,
            'url' => site_url('siswa')
          );
        } else {
          $msg['message'] = "Siswa tidak ditemukan.";
        }
      } else if ($param == 'ubah_one') {
        $kode_nilai   = $post['kode_nilai'];
        unset($post['kode_nilai']);
        unset($post['is_update']);
        unset($post['nis']);
        unset($post['kode_kriteria']);
        if ($this->nilai_model->update($post, ['kode_nilai' => $kode_nilai])) {
          $this->session->set_flashdata('success', "Berhasil mengubah data alternatif nilai.");
          $msg = array(
            'status' => true,
            'kode_status' => 200,
            'message' => "Berhasil mengubah data alternatif nilai.",
            'url' => site_url('nilai')
          );
        } else {
          $msg['message'] = 'Terjadi kesalahan pada proses update.';
        }
      } else {
        $msg['message'] = "Halaman tidak ditemukan";
      }
    } else {
      $msg['message'] = "Permintaan tidak dapat diproses.";
    }

    echo json_encode($msg);
    die();
  }

  function hapus($kode_nilai)
  {
    $msg = array(
      'status' => false,
      'kode_status' => 201,
      'message' => "Data yang dikirim tidak sesuai"
    );

    if ($this->input->is_ajax_request()) {
      if ($this->nilai_model->delete($kode_nilai)) {
        $msg = array(
          'status' => true,
          'kode_status' => 200,
          'message' => "Berhasil menghapus data nilai.",
          'url' => site_url('nilai')
        );
      } else {
        $msg['message'] = 'Terjadi kesalahan pada proses penghapusan.';
      }
    } else {
      $msg['message'] = "Permintaan tidak dapat diproses.";
    }

    echo json_encode($msg);
    die();
  }

  function hapus_all()
  {
    $msg = array(
      'status' => false,
      'kode_status' => 201,
      'message' => "Data yang dikirim tidak sesuai"
    );

    if ($this->input->is_ajax_request()) {
      if ($this->nilai_model->delete_all()) {
        if ($this->db->query("delete from hasil")) {
          $msg = array(
            'status' => true,
            'kode_status' => 200,
            'message' => "Berhasil menghapus semua data.",
            'url' => site_url('nilai')
          );
        } else {
          $msg['message'] = 'Terjadi kesalahan pada proses penghapusan hasil.';
        }
      } else {
        $msg['message'] = 'Terjadi kesalahan pada proses penghapusan.';
      }
    } else {
      $msg['message'] = "Permintaan tidak dapat diproses.";
    }

    echo json_encode($msg);
    die();
  }
}
