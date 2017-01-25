<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
		$this->load->view('users');
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function logout()
	{            
            $this->session->set_userdata("selected_menu","Login");
            $this->session->unset_userdata("admin_authority");
            $this->session->unset_userdata("logined_user");
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
	}
	public function register()
	{
            $this->session->unset_userdata("admin_authority");
            $this->session->unset_userdata("logined_user");
            $this->load->view('header');
            $this->load->view('register');
            $this->load->view('footer');
	}
	public function login_ok()
	{		
            $email=$this->input->post("email");
            $password=$this->input->post("password");
            $query = $this->db->get_where('users',array("password"=>$password,"email"=>$email));
            if($query->num_rows())
            {
                $this->session->set_userdata("admin_authority",$query->first_row()->authority+1);
                $this->session->set_userdata("logined_user",$query->first_row()->id);
                die(json_encode("ok"));
            }
            else
            {
                die(json_encode("Username and Email don't exist"));
            }
	}
	public function register_ok()
	{
            $this->session->set_userdata("selected_menu","Login");
            $name=$this->input->post("name");
            $username=$this->input->post("username");
            $email=$this->input->post("email");
            $password=$this->input->post("password");
            $num_query=$this->db->get('users');
            $num_users=$num_query->num_rows();
            $query = $this->db->get_where('users',array("username"=>$username,"email"=>$email));
            if(!$query->num_rows())
            {
                if($num_users) $authority=0; else $authority=1;
                $data = array(
                        'name' => $name,
                        'email' => $email,
                        'username' => $username,
                        'password' => $password,
                        'authority' => $authority                        
                );
                $this->db->insert('users', $data);
                die(json_encode("ok"));
            }
            else
            {
                die(json_encode("Username and Email already exists"));
            }
	}
        
        public function get_users()
        {
            $this->session->set_userdata("selected_menu","Users");
            $i=0;
            $users_array=array();
            $query=$this->db->get("users");
            foreach ($query->result_array() as $row)
            {
                $users_array[$i]["name"]=$row['name'];
                $users_array[$i]["email"]=$row['email'];
                $users_array[$i]["username"]=$row['username'];
                $users_array[$i]["password"]=$row['password'];
                $users_array[$i]["authority"]=$row['authority'];
                $i++;
            }
            $this->load->view('header');
            $this->load->view('users',array("data"=>$users_array));
            $this->load->view('footer');
        }
        public function delete()
        {
            $username=$this->input->post("username");
            $i=0;
//            $users_array=array();
            $this->db->delete("users",array("username"=>$username)); 
//            $query=$this->db->get("users");
//            foreach ($query->result_array() as $row)
//            {
//                $users_array[$i]["name"]=$row['name'];
//                $users_array[$i]["email"]=$row['email'];
//                $users_array[$i]["username"]=$row['username'];
//                $users_array[$i]["password"]=$row['password'];
//                $users_array[$i]["authority"]=$row['authority'];
//                $i++;
//            }
//            $this->load->view('header');
//            $this->load->view('users',array("data"=>$users_array));
//            $this->load->view('footer');
            die(json_encode("ok"));
        }
        public function authority()
        {            
            $username=$this->input->post("username");            
            $num_query=$this->db->get_where("users",array('authority'=>1));
            $query=$this->db->get_where("users",array('username'=>$username));
            $admin_auth=$query->first_row()->authority;
            if($admin_auth) $admin=0; else $admin=1;
            if($num_query->num_rows()>1 && $admin_auth)
            {
                $data = array('authority' => $admin);
                $this->db->where('username', $username);
                $this->db->update('users', $data);
            }
            else if(!$admin_auth)
            {
                $data = array('authority' => $admin);
                $this->db->where('username', $username);
                $this->db->update('users', $data);
            }
        }
    }
