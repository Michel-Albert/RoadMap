<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function index() {
        $this->session->set_userdata("selected_menu", "Upload");
        $this->load->view('header');
        $this->load->view('Kupload_1');
        $this->load->view('footer');
    }

    public function Jupload() {
        $this->session->set_userdata("selected_menu", "Upload");
        $this->load->view('header');
        $this->load->view('Jupload');
        $this->load->view('footer');
    }
    public function Kupload_0() {
        $this->session->set_userdata("selected_menu", "Upload");
        $this->load->view('header');
        $this->load->view('Kupload');
        $this->load->view('footer');
    }
    public function Kupload_1() {
        $this->session->set_userdata("selected_menu", "Upload");
        $this->load->view('header');
        $this->load->view('Kupload_1');
        $this->load->view('footer');
    }

    public function save() {
        $files = $_FILES['files'];
        // Save the uploaded files
        for ($index = 0; $index < count($files['name']); $index++) {
            $file = $files['tmp_name'][$index];
            if (is_uploaded_file($file)) {
                move_uploaded_file($file, './uploadedImage/' . $files['name'][$index]);
            }
        }
    }

    public function remove() {
        $fileNames = $_POST['fileNames'];
        // Delete uploaded files
        for ($index = 0; $index < count($fileNames); $index++) {
            unlink('./uploadedImage/' . $fileNames[$index]);
        }
    }

    function PJMupload() {
        $max_size = 1024 * 200; // 200kb
        $extensions = array('jpeg', 'jpg', 'png');
        $dir = './uploadedImage/';
        $count = 0;

//        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_FILES['files'])) {
            // loop all files
            foreach ($_FILES['files']['name'] as $i => $name) {
                // if file not uploaded then skip it
                if (!is_uploaded_file($_FILES['files']['tmp_name'][$i]))
                    continue;

                // skip large files
                if ($_FILES['files']['size'][$i] >= $max_size)
                    continue;

                // skip unprotected files
                if (!in_array(pathinfo($name, PATHINFO_EXTENSION), $extensions))
                    continue;

                // now we can move uploaded files
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $dir . $name))
                    $count++;
            }
//        }
//        die(json_encode(array('count' => $count)));
        
        $this->load->view('header');
        $this->load->view('PJMupload',array('count' => $count));
        $this->load->view('footer');
    }
    public function cp_upload()
    {  
      $lecture_id=$_POST['file_m_id'];
      $output_dir = "./uploadedImage/";
      $fileName = $_FILES["save_movie"]["name"];
      move_uploaded_file($_FILES["save_movie"]["tmp_name"],$output_dir.$fileName);
    }
    function do_upload() {
        if (!is_dir(UPLOAD_FOLDER_PATH))
            mkdir(UPLOAD_FOLDER_PATH);
        $files = $_FILES;
        $cpt = count($_FILES['images']['name']);
        $images = array();
        $upload_url = base_url() . "uploadedImage/";
        for ($i = 0; $i < $cpt; $i ++) {
            $_FILES['images']['name'] = $files['images']['name'] [$i];
            $_FILES['images']['type'] = $files['images']['type'] [$i];
            $_FILES['images']['tmp_name'] = $files['images']['tmp_name'] [$i];
            $_FILES['images']['error'] = $files['images']['error'] [$i];
            $_FILES['images']['size'] = $files['images']['size'] [$i];
            $images[$i]["name"] = $_FILES['images']['name'];
            $images[$i]["type"] = $_FILES['images']['type'];
            $images[$i]["size"] = $_FILES['images']['size'];
            $images[$i]["url"] = $upload_url . $images[$i]["name"];
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('images');
            $user_id = $this->session->userdata("logined_user");
            $data = array(
                'name' => $images[$i]["name"],
                'datetime' => date("Y-m-d H:i:s"),
                'user' => $user_id
            );
            $this->db->insert('images', $data);
        }
        die(json_encode($images));
    }

    private function set_upload_options() {
        // upload an image options
        $config = array();
        $config ['upload_path'] = './uploadedImage';
        $config ['allowed_types'] = 'gif|jpg|png|bmp';

        return $config;
    }

}
