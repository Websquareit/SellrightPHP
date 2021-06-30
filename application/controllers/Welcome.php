<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 function __construct() {
        parent::__construct();
        //$this->load->model('Model');
        $this->load->library('cart');
        $this->load->library('session');
        $this->load->helper('cookie');
 }
	public function index()
	{
	   /* $this->load->view('admin/header');
	    $this->load->view('admin/index');*/
	  $this->load->view('admin/login');
	}
public function admin_login()
{
    
    $this->db->where('role',0);
    $this->db->where('email',$this->input->post('email'));
    $this->db->where('password',$this->input->post('password'));
    $lgndata=$this->db->get('sellright_users')->row();
    if($lgndata->uid!=null)
    {
        $this->session->set_userdata('id',$lgndata->uid);
        redirect('welcome/dashboard');
    }
    else
    { ?>
        <div class="alert alert-danger">
  <strong>Invalid Username and Password!</strong> Indicates a dangerous or potentially negative action.
</div> <?php
        redirect('welcome/index');
    }
    
}
	public function dashboard()
	{
	    $this->db->where('uid',$this->session->userdata('id'));
	   $header['header']= $this->db->get('sellright_users')->result_array();
	    $this->load->view('admin/header',$header);
	    $this->load->view('admin/index');
	  $this->load->view('admin/footer');
	}
	public function user()
	{
	     $this->db->where('uid',$this->session->userdata('id'));
	   $header['header']= $this->db->get('sellright_users')->result_array();
	   
	   $this->db->where('role','1');
	  $user['user']= $this->db->get('sellright_users')->result_array();
	    $this->load->view('admin/header',$header);
	    $this->load->view('admin/user',$user);
	  $this->load->view('admin/footer');
	}	
	
public function seller()
	{ $this->db->where('uid',$this->session->userdata('id'));
	   $header['header']= $this->db->get('sellright_users')->result_array();
	   
	   $this->db->where('role','2');
	  $seller['seller']= $this->db->get('sellright_users')->result_array();
	   
	    $this->load->view('admin/header',$header);
	    $this->load->view('admin/seller',$seller);
	  $this->load->view('admin/footer');
	}
public function admin_catalogue()
	{ $this->db->where('uid',$this->session->userdata('id'));
	   $header['header']= $this->db->get('sellright_users')->result_array();
	  
	  $this->db->select('*');
	  $this->db->from('catalogue');
	  $this->db->join('sellright_users','catalogue.vid=sellright_users.uid');
	  $catalogue['catalogue']= $this->db->get()->result_array();
	   
	   	 $this->load->view('admin/header',$header);
	    $this->load->view('admin/catalogue',$catalogue);
	  $this->load->view('admin/footer');
	}
public function Product()
{ 
    $this->db->where('uid',$this->session->userdata('id'));
	   $header['header']= $this->db->get('sellright_users')->result_array();
	   
	   $this->db->select('*');
	  $this->db->from('product_tbl');
	  $this->db->join('sellright_users','product_tbl.vid=sellright_users.uid');
	  $this->db->join('catalogue','product_tbl.cid=catalogue.cid');
	  $Product['Product']= $this->db->get()->result_array();
	   
	   
	    $this->load->view('admin/header',$header);
	    $this->load->view('admin/product',$Product);
	  $this->load->view('admin/footer');
}
public function editprofile()
{
    $this->db->where('role',0);
     $this->db->where('uid',$this->session->userdata('id'));
	   $header['header']= $this->db->get('sellright_users')->result_array();
	   
	   
	    $this->load->view('admin/header',$header);
	    $this->load->view('admin/edit_profile',$header);
	  $this->load->view('admin/footer');
}
public function update_profile()
{
   
    if($_FILES["pimage"]["name"]!=null)
    {
        $img=$_FILES["pimage"]["name"];
        move_uploaded_file($_FILES["pimage"]["tmp_name"],"images/".$img);
    }
    else
    {
    $img=$this->input->post('img');
    }
    $data=array('username'=>$this->input->post('username'),'image'=>$img,'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'username'=>$this->input->post('number'));
    $this->db->where('uid',$this->input->post('id'));
    $up=$this->db->update('sellright_users',$data);
    //print_r($this->db->last_query());exit;  
    if($up)
    {
        redirect('welcome/dashboard');
        
    }
    else
    {
        ?>
        <div class="alert alert-danger"> </div>
        <strong>Not Update!</strong> Successfully.
        <?php
        redirect('welcome/editprofile');
    }
}
public function logout()
{
    $this->session->unset_userdata('id');
    redirect('welcome/index');
}
public function admin_orderview()
{
    
    
    $this->db->select('*');
    $this->db->from('order_tbl');
   $this->db->join('sellright_users','sellright_users.uid=order_tbl.vid');
   $this->db->order_by('order_tbl.order_id','DESC');
   $data['orders']=$this->db->get()->result_array();
    
     $this->db->where('role',0);
     $this->db->where('uid',$this->session->userdata('id'));
	   $header['header']= $this->db->get('sellright_users')->result_array();
	   
	   
	    $this->load->view('admin/header',$header);
	    $this->load->view('admin/orders',$data);
	  $this->load->view('admin/footer');
}
	/*catalogue*/
public function catlog()
	{
	    
	   // $this->session->set_userdata('number');
	    $cid=$_GET['cid'];
	    $vid=$_GET['vid'];
	   //$data['cat_prdct']= $this->Database->getcatlog_detail($vid,$cid);
	   $this->db->where('vid',$vid);
        $this->db->where('cid',$cid);
       $data['cat_prdct']= $this->db->get('product_tbl')->result_array();
       $data['count']=count($data['cat_prdct']);
     //  print_r($data);
		$this->load->view('catalogue',$data);
	}
	public function register()
	{
	    $this->db->where('number',$this->input->post('number'));
        $query = $this->db->get('sellright_users');
     
        if ($query->num_rows() > 0){
            
            ?>
            <div class="alert alert-danger" role="alert">
             Phone Number Is Already exist.
            </div> <?php
           // $this->session->set_userdata('number',$this->input->post('number'));
           setcookie('number', $this->input->post('number'), time() + (31556952), "/"); 
            $proID=$this->input->post('pid');
            $pd['proID']=$proID;
            redirect('welcome/addToCart'.$proID);
            
        }
        else
        {
            $img=$_FILES['image']['name'];
            $tmp_name=$_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name,'images/'.$img);
	    $proID=$this->input->post('pid');
	    $reg_data=array('username'=>$this->input->post('username'),'image'=>$img,'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'number'=>$this->input->post('number'),'address'=>$this->input->post('address'),'role'=>'1');
	    $rg=$this->db->insert('sellright_users',$reg_data);
	    $this->db->where('uid',$this->db->insert_id());
	    $rdt=$this->db->get('sellright_users')->row();
	    setcookie('number', $rdt->number, time() + (31556952 * 30), "/"); // 86400 = 1 day
	    //$this->session->set_userdata('number',$rdt->number);
	   if($rg)
	   {
	       redirect('welcome/addToCart/'.$proID);
	   }
        }
	}
function addToCart($proID){
    //print_r($this->input->cookie('number', TRUE));
    if(!empty($this->input->cookie('number', TRUE)))
    {
        $this->db->where('pid',$proID);
        $this->db->where('number',$this->input->cookie('number', TRUE));
        $adcrtoduct = $this->db->get('addcart')->row();
        if($adcrtoduct)
        {
            $qty=$adcrtoduct->qty+1;
            $sub_total=$qty*$adcrtoduct->price;
            $udta=array('qty'=>$qty,'sub_total'=>$sub_total);
            $this->db->where('pid',$proID);
            $this->db->where('number',$this->input->cookie('number', TRUE));
            $up=$this->db->update('addcart',$udta);
            if($up)
        {
            redirect('welcome/getcartdtl');
        }
        
        }
        else
        {
        $this->db->where('pid',$proID);
        $product = $this->db->get('product_tbl')->row();
        $data = array(
            'pid'    => $product->pid,
            'number'=>$this->input->cookie('number', TRUE),
            'vid'=>$product->vid,
            'cid'=>$product->cid,
            'qty'    => 1,
            'price'    => $product->price,
            'sub_total'=>$product->price,
            'product'    => $product->product_name,
            'description'=>$product->description,
            'image' => $product->image_1
        );
        $in=$this->db->insert('addcart',$data);
        if($in)
        {
            redirect('welcome/catlog?cid='.$product->cid .'&vid=' . $product->vid);
        }
        
        }
        
        // Redirect to the cart page
        
    }
    else
    {
        $pd['proID']=$proID;
        //print_r($pd['proID']);exit;
        $this->load->view('register',$pd);
    }
}   
public function getcartdtl()
{
   $this->db->where('number',$this->input->cookie('number', TRUE));
   $cartdta['cart']=$this->db->get('addcart')->result_array();
   $this->load->view('cart_detail',$cartdta);
}
public function update_qty()
{
    $id=$_GET['cart_id'];
    $this->db->where('cart_id',$id);
    $cartup = $this->db->get('addcart')->row();
    $qty=$cartup->qty-1;
    $sub_total=$qty*$cartup->price;
    $udta=array('qty'=>$qty,'sub_total'=>$sub_total);
    $this->db->where('cart_id',$id);
    return $crtup=$this->db->update('addcart',$udta);
}
public function update_qtyplus()
{
     $id=$_GET['cart_id'];
    $this->db->where('cart_id',$id);
    $cartup = $this->db->get('addcart')->row();
    $qty=$cartup->qty+1;
    $sub_total=$qty*$cartup->price;
    $udta=array('qty'=>$qty,'sub_total'=>$sub_total);
    $this->db->where('cart_id',$id);
    return $crtup=$this->db->update('addcart',$udta);
}
public function delete_cartdel()
{
    $id=$_GET['cart_id'];
    $this->db->where('cart_id',$id);
    $del=$this->db->delete('addcart');
   return $del;
}
public function checkout()
{
    $number=$this->input->cookie('number', TRUE);
    $this->db->where('number',$number);
    $ordataa=$this->db->get('addcart')->result_array();
    foreach($ordataa as $ordata){
    $data = array(
            'pid'    => $ordata['pid'],
            'number'=>$ordata['number'],
            'vid'=>$ordata['vid'],
            'cid'=>$ordata['cid'],
            'qty'    => $ordata['qty'],
            'price'    => $ordata['sub_total'],
            'product'    => $ordata['product'],
            'description'=>$ordata['description'],
            'image' => $ordata['image']
        );
         $ordc=$this->db->insert('order_tbl',$data);
    }
       
        if($ordc)
        {
            $this->db->where('number',$number);
            $this->db->delete('addcart');
            ?> <div class="alert alert-success">
  <strong>Your Order is Confirmed !</strong> 
</div> <?php
            redirect('welcome/order_view');
        }
    
}
public function order_view()
{
    if(!empty($number=$this->input->cookie('number', TRUE)) ){
        $this->db->where('number',$this->input->cookie('number', TRUE));
        $this->db->order_by('order_id','DESC');
        $orderdata['orderdetail']=$this->db->get('order_tbl')->result_array();
        $this->load->view('order_detail',$orderdata);
    }
}
public function profile()
{
    
     if(!empty($number=$this->input->cookie('number', TRUE)) ){
         $this->db->where('number',$this->input->cookie('number', TRUE));
        $prdta['profile']= $this->db->get('sellright_users')->result_array();
        $prdta['cid']=$_GET['cid'];
        $prdta['vid']=$_GET['vid'];
        
         $this->load->view('profile',$prdta);
     }
}
public  function update_user_profile()
{
    $uid=$this->input->post('uid');
    if($_FILES['image']!=null)
    {
         $img=$_FILES['image']['name'];
            $tmp_name=$_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name,'images/'.$img);
    }
    else
    {
       $img=$this->input->post('img'); 
    }
    $data=array('username'=>$this->input->post('username'),'image'=>$img,'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'number'=>$this->input->post('number'),'address'=>$this->input->post('address'),'role'=>'1');
	$this->db->where('uid',$uid);
   $uppd= $this->db->update('sellright_users',$data);
   if($uppd)
   {
       redirect('welcome/catlog?cid='.$this->input->post('cid').'&vid='.$this->input->post('vid'));
   }
    
}
public function termsandcondition()
{
    $this->load->view('termsandcondition');
}
}
