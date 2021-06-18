<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }
    public function index()
    {        

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [

            'required' => 'Email diperlukan',
            'valid_email' => 'Mohon masukan Email yang valid !'

        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [

            'min_length' => 'password min 8 karakter',
            'required' => 'Password diperlukan'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('Auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //PROSES VALIDASI SUCCES
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {

                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password salah !!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum di verifikasi !!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Tidak terdaftar !!</div>');
            redirect('auth');
        }
    }








    public function registration()
    {
        if ($this->session->userdata('email')){
            redirect('user');
        }


        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama diperlukan'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah pernah mendaftar sebelumnya !!',
            'required' => 'Email diperlukan',
            'valid_email' => 'Mohon masukan Email yang valid !'

        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'password tidak sama !',
            'required' => 'Password diperlukan',
            'min_length' => 'password min 8 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]', [
            'matches' => 'password tidak sama !',
            'min_length' => 'password min 8 karakter'
        ]);




        if ($this->form_validation->run() == false) {

            $data['title'] = 'MY CARGO registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('Auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat akun anda telah terdaftar !!! silahkan Login kembali !!</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil keluar dari akun</div>');
        redirect('auth');
    }
}
