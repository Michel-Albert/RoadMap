<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
        public function get_images()
        {
            $file_array=array();
            $this->session->set_userdata("selected_menu","All Images");
            $upload_url= base_url()."uploadedImage/";
            $i=0;
            $dir=UPLOAD_FOLDER_PATH;
            if (is_dir($dir)){
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file == '.' || $file == '..') {
                               continue;
                         }
                        $file_name=$file;
                        $file  = $dir.$file;
                        if (is_file($file)) {
                            $file_array[$i]["url"]=$upload_url.$file_name;
                            $file_array[$i]["name"]=$file_name;
                            $i++;
                        }
                    }
                    closedir($dh);
                }
            }
            $this->load->view('header');
            $this->load->view('image',array("data"=>$file_array));
            $this->load->view('footer');
        }
        public function mine()
        {
            $file_array=array();
            $this->session->set_userdata("selected_menu","My Images");
            $upload_url= base_url()."uploadedImage/";
            $i=0;
            $dir=UPLOAD_FOLDER_PATH;
            if (is_dir($dir)){
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file == '.' || $file == '..') {
                               continue;
                         }
                        $file_name=$file;
                        $user_id=$this->session->userdata("logined_user");
                        $query=$this->db->get_where("images",array("name"=>$file_name,"user"=>$user_id));
                        if($query && !$query->num_rows()) continue;
                        $file  = $dir.$file;
                        if (is_file($file)) {
                            $file_array[$i]["url"]=$upload_url.$file_name;
                            $file_array[$i]["name"]=$file_name;
                            $i++;
                        }
                    }
                    closedir($dh);
                }
            }
            $this->load->view('header');
            $this->load->view('image',array("data"=>$file_array));
            $this->load->view('footer');
        }
        
        public function delete()
        {
            $url=$this->input->post("url");
            $name= basename($url);
            $selected_menu=$this->session->userdata("selected_menu");
            if(!is_dir(DELETE_FOLDER_PATH)) mkdir(DELETE_FOLDER_PATH);
            if($selected_menu!="Deleted Images") 
            {
                $data = array('deleted' => 1);
                $this->db->where('name', $name);
                $this->db->update('images', $data);
                rename(UPLOAD_FOLDER_PATH.$name,DELETE_FOLDER_PATH.$name);
            }
            else
            {
                $this->db->delete('images', array('name'=>$name));
                unlink(DELETE_FOLDER_PATH.$name);      
            }
            die(json_encode("ok"));
        }  
        public function get_deletes()
        {
            $file_array=array();
            $this->session->set_userdata("selected_menu","Deleted Images");
            $upload_url= base_url()."deletedImage/";
            $i=0;
            $dir=DELETE_FOLDER_PATH;
            if (is_dir($dir)){
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file == '.' || $file == '..') {
                               continue;
                         }
                        $file_name=$file;
                        $file  = $dir.$file;
                        if (is_file($file)) {
                            $file_array[$i]["url"]=$upload_url.$file_name;
                            $file_array[$i]["name"]=$file_name;
                            $i++;
                        }
                    }
                    closedir($dh);
                }
            }
            $this->load->view('header');
            $this->load->view('image',array("data"=>$file_array));
            $this->load->view('footer');
        }   
}
