<?php
 require APPPATH . 'libraries/REST_Controller.php';
     
class Imgapi extends REST_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->database();
        $this->load->library("cart");
        $this->load->library('upload');
    }
    public function image_post()
    {
    $image = $_POST['image'];
    $name = $_POST['name'];
 
    $realImage = base64_decode($image);
 
    file_put_contents('images/'.$name, $realImage);
 
    echo "Image Uploaded Successfully.";
    $product_data=array('image_1'=>$realImage);
     $this->db->insert('product_tbl',$product_data);
    }
} 
?>