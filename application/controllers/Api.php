
 <?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Api extends REST_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->database();
        $this->load->library("cart");
        $this->load->library('upload');
    }
    
 public function register_post()
    {
        $this->db->where('number',$this->input->post('number'));
        $query = $this->db->get('sellright_users');
     
        if ($query->num_rows() > 0){
            $this->response(array('message'=>'Phone Number Is Already exist.'), REST_Controller::HTTP_OK);
            
        }
        else{
            $length = 4;
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
            $a_length = 10;
            $a_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $a_charactersLength = strlen($characters);
            $a_randomString = '';
                for ($i = 0; $i < $a_length; $i++) {
                    $a_randomString .= $a_characters[rand(0, $a_charactersLength - 1)];
                }
        
        $input =array('username'=>$this->input->post('username'),'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'number'=>$this->input->post('number'),'role'=>$this->input->post('role'),'OTP'=>$randomString,'api_token'=>$a_randomString); 
            $this->db->insert('sellright_users',$input);
            $this->db->where('number',$this->input->post('number'));
            $sigdta=$this->db->get('sellright_users')->row();
            $rres=array('username'=>$sigdta->username,
            'email'=>$sigdta->email,
            'number'=>$sigdta->number,
            'role'=>$sigdta->role,
            'api_token'=>$sigdta->api_token,
            'updated_at'=>$sigdta->updated_at,
            'created_at'=>$sigdta->created_at,
            'id'=>$sigdta->uid,
            'OTP'=>$sigdta->OTP,
            'has_media'=>false
            );
            $this->response(array('success'=>true,'data'=>$rres,'message'=>'created successfully.'), REST_Controller::HTTP_OK);
            } 
        }
     public function confirmotp_post()
    {
        $vcod=$this->input->post('OTP');
        $this->db->where('uid',$this->input->post('vid'));
        $vcdta=$this->db->get('sellright_users')->row();
        if($vcdta->OTP==$vcod)
        {
            $conres=array('id'=>$vcdta->uid,
                'username'=>$vcdta->username,
            'email'=>$vcdta->email,
            'number'=>$vcdta->number,
            'role'=>$vcdta->role,
            'api_token'=>$vcdta->api_token,
            'updated_at'=>$vcdta->updated_at,
            'created_at'=>$vcdta->created_at
            );
            $this->response(array("success"=>true,
                                                "code" => 200 ,
                                                "locate" => "en", 
                                                "message"=>"ok",
                                                "data"=>$conres), REST_Controller::HTTP_OK);
        }
        else
        {
            $dta=array('message'=>'verification code is not match');
             $this->response(array("success"=>true,
                                                "code" => 200 ,
                                                "locate" => "en",
                                                "data"=>$dta), REST_Controller::HTTP_OK);
        }
    
    }  
  public function login_post()
    {
        $number=$this->input->post('number');
        $password=$this->input->post('password');
        $whr='("payment_status = free" or "payment_staus=paid")';
        $this->db->where('number',$number);
        $this->db->where('password',$password);
        $this->db->where($whr);
        $validate = $this->db->get('sellright_users')->row();
        if($validate)
        {
            $vdta=array("id"=>$validate->uid,
            "username"=>$validate->username,
                        "email"=>$validate->email,
                        "number"=>$validate->number,
                        "role"=>$validate->role,
                        "api_token"=>$validate->api_token,
                        "created_at"=>$validate->created_at,
                        "updated_at"=>$validate->updated_at
                        
            );
                $this->response(array("success"=>true,
                                    "data"=>$vdta,"message"=>'Foods retrieved successfully'), REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response(array('data'=>['Invalid number  and password.']), REST_Controller::HTTP_OK);
        }

    }
    /*for add catalogue*/
public function createcatalouge_post()
{
    $this->db->where('uid',$this->input->post('vid'));
    $usdta=$this->db->get('sellright_users')->row();
    
     $this->db->where('vid',$this->input->post('vid'));
    $ttlp=$this->db->get('product_tbl')->result();
    $count=count($ttlp);
    //print_r($count);exit;
    if($count > 5  && $usdta->payment_status==0)
    {
         $this->response(array("success"=>true,
                                    "data"=>[],"message"=>'SORRY'), REST_Controller::HTTP_OK);
    }
    
    else
    {
    $cataloguedata=array('vid'=>$this->input->post('vid'),'catalogue_name'=>$this->input->post('catalogue_name'));
    $ctl_data=$this->db->insert('catalogue',$cataloguedata);
   $in_id=$this->db->insert_id();
    $this->db->where('cid',$in_id);
    $inscat=$this->db->get('catalogue')->row();
    if($inscat)
    {
        $cdta=array('cid'=>$inscat->cid,
            "vid"=>$inscat->vid,
                        "catalogue_name"=>$inscat->catalogue_name,
                        "link"=>base_url() . 'index.php/welcome/cid='.$inscat->cid . '&vid='. $inscat->vid,
                        "created_at"=>$inscat->created_at,
                        "updated_at"=>$inscat->updated_at
                        
            );
                $this->response(array("success"=>true,
                                    "data"=>$cdta,"message"=>'catalogue retrieved successfully'), REST_Controller::HTTP_OK);
    }
    }
}

/*for add product*/
public function addproduct_post()
{
    
    $this->db->where('uid',$this->input->post('vid'));
    $usdta=$this->db->get('sellright_users')->row();
    
     $this->db->where('vid',$this->input->post('vid'));
    $ttlp=$this->db->get('product_tbl')->result();
    $count=count($ttlp);
    //print_r($count);exit;
    if($count > 20  && $usdta->payment_status==0)
    {
         $this->response(array("success"=>true,
                                    "data"=>[],"message"=>'SORRY'), REST_Controller::HTTP_OK);
    }
    
    else
    {
    
    $image1 = $_POST['image1'];
    $name1 = $_POST['name1'];
 
    $realImage1 = base64_decode($image1);
 
    file_put_contents('images/'.$name1, $realImage1);
    
    
    
 
    
 
    
    
 if($_POST['image2'] = ""){
     $name2='sell_right_logo.png';
     $image2='sell_right_logo.png';
 }
 else
 {
      $image2 = $_POST['image2'];
    $name2 = $_POST['name2'];
    $realImage2 = base64_decode($image2);
    move_uploaded_file($name2,'images/'.$realImage2);
    //file_put_contents('images/'.$name1, $realImage2); 
 }
    
    
    
 if($_POST['image3'] = ""){
      $name3='sell_right_logo.png';
      $image3='sell_right_logo.png';
 }
 else
 {
     $image3 = $_POST['image3'];
    $name3 = $_POST['name3'];
       $realImage3 = base64_decode($image3);
 move_uploaded_file($name3,'images/'.$realImage3);
   // file_put_contents('images/'.$name3, $realImage3);
 }
  
    
   
 if($_POST['image4'] = ""){
      $name4='sell_right_logo.png';
      $image4='sell_right_logo.png';
 }
 else
 {
      $image4 = $_POST['image4'];
    $name4 = $_POST['name4'];
   $realImage4 = base64_decode($image4);
 move_uploaded_file($name4,'images/'.$realImage4);
    //file_put_contents('images/'.$name4, $realImage4);
 }
 if($_POST['image5'] = ""){
     $name5='sell_right_logo.png';
     $image5='sell_right_logo.png';
 }else
 {
     $name5 = $_POST['name5'];
     $image5 = $_POST['image5'];
    $realImage5 = base64_decode($image5);
    move_uploaded_file($name5,'images/'.$realImage5);
     //file_put_contents('images/'.$name1, $realImage1);
 }
    
    
  $product_data=array('vid'=>$this->input->post('vid'),'cid'=>$this->input->post('cid'),'product_name'=>$this->input->post('product_name'),'price'=>$this->input->post('price'),'description'=>$this->input->post('description'),'image_1'=>$name1,'image_2'=>$name2,'image_3'=>$name3,'image_4'=>$name4,'image_5'=>$name5);
    /* $product_data=array('vid'=>$this->input->post('vid'),'cid'=>$this->input->post('cid'),'product_name'=>$this->input->post('product_name'),'price'=>$this->input->post('price'),'description'=>$this->input->post('description'),'image_1'=>$name);
    */ $this->db->insert('product_tbl',$product_data);
     //print_r($this->db->last_query());exit;
    $p_id=$this->db->insert_id();
    $this->db->where('pid',$p_id);
    $insprdt=$this->db->get('product_tbl')->row();
    $eximg=explode(",",$insprdt->image_1);
    if($insprdt)
    {
        foreach($eximg as $eimg)
        {
            $resimg=array('image1'=>base_url() . 'images/'.$insprdt->image_1,'image2'=>base_url() . 'images/'.$insprdt->image_2 , 'image3'=>base_url() . 'images/'.$insprdt->image_3,'image4'=>base_url() . 'images/'.$insprdt->image_4,'image5'=>base_url() . 'images/'.$insprdt->image_5);
        }
        $cdta=array('pid'=>$insprdt->pid,
            'vid'=>$insprdt->vid,
             'cid'=>$insprdt->cid,
             'product_name'=>$insprdt->product_name,
             'price'=>$insprdt->price,
             'description'=>$insprdt->description,
             'image'=>$resimg,
                        "created_at"=>$insprdt->created_at,
                        "updated_at"=>$insprdt->updated_at
                        
            );
                $this->response(array("success"=>true,
                                    "data"=>$cdta,"message"=>'product  inserted  successfully'), REST_Controller::HTTP_OK);
    }
    }    
}
/*get particular catalogue*/
public function getcataloguedetl_get()
{
   $cid= $_GET['cid'];
    $vid=$_GET['vid'];
    $this->db->where('cid',$cid);
    $this->db->where('vid',$vid);
    $catlg_data=$this->db->get('catalogue')->row();
    
    $this->db->where('cid',$cid);
    $this->db->where('cid',$vid);
    $pprdt_data=$this->db->get('product_tbl')->result_array();
    //print_r($catlg_data);exit;
    if($pprdt_data)
    {
        foreach($pprdt_data as $prdt_data)
        {
        $pdt[]=array('pid'=>$prdt_data['pid'],
             'product_name'=>$prdt_data['product_name'],
             'price'=>$prdt_data['price'],
             'description'=>$prdt_data['description'],
             'image1'=>base_url() . 'images/'.$prdt_data['image_1'],
             'image2'=>base_url() . 'images/'.$prdt_data['image_2'],
             'image3'=>base_url() . 'images/'.$prdt_data['image_3'],
             'image4'=>base_url() . 'images/'.$prdt_data['image_4'],
             'image5'=>base_url() . 'images/'.$prdt_data['image_5'],
                        "created_at"=>$prdt_data['created_at'],
                        "updated_at"=>$prdt_data['updated_at']);
        }                
        $catlgdt=array( "cid"=>$catlg_data->cid,
        "vid"=> $catlg_data->vid,
        "catalogue_name"=> $catlg_data->catalogue_name,
        "link"=> base_url() . 'index.php/welcome/cid='.$catlg_data->cid . '&vid='. $catlg_data->vid,
        "created_at"=> $catlg_data->created_at,
        "updated_at"=> $catlg_data->updated_at,
        "products"=>$pdt);


    }
    else
    {
          $catlgdt=array( "cid"=>$catlg_data->cid,
        "vid"=> $catlg_data->vid,
        "catalogue_name"=> $catlg_data->catalogue_name,
        "link"=> base_url() . 'index.php/welcome/cid='.$catlg_data->cid . '&vid='. $catlg_data->vid,
        "created_at"=> $catlg_data->created_at,
        "updated_at"=> $catlg_data->updated_at,"products"=>[]);
    }
    $this->response(array("success"=>true,
                                    "data"=>$catlgdt,"message"=>'catalogue   data tetrived   successfully'), REST_Controller::HTTP_OK);
}
/*for get vendor all catalogue*/
public function allcatalogue_get()
{
    $vidc=$_GET['vid'];
    
     $this->db->where('uid',$vidc);
    $ordata=$this->db->get('sellright_users')->row();
    $effectiveDate = date('Y-m-d', strtotime("+1 months", strtotime($ordata->created_at)));
   $todate=date('Y-m-d H:i:s');
   if($todate == $effectiveDate){
       $upstat=array('payment_status'=>2);
       $this->db->where('uid',$vidc);
       $u=$this->db->update('sellright_users',$upstat);
       if($u)
       {
          $this->db->where('uid',$vidc);
    $afupata=$this->db->get('sellright_users')->row();
       }
   }
    if($ordata->payment_status != 1 && $ordata->payment_status != 0)
    {
        $flag=array("flag"=>$ordata->payment_status);
        $this->response(array("success"=>true,
                                    "data"=>array($flag),"message"=>'catalogue   data not tetrived   successfully'), REST_Controller::HTTP_OK);
    }
    else
    {
     $this->db->where('vid',$vidc);
    $vvcatlg_data=$this->db->get('catalogue')->result_array();
    foreach($vvcatlg_data as $vcatlg_data)
    {
      $vcatlgdt[]=array( "cid"=>$vcatlg_data['cid'],
        "vid"=> $vcatlg_data['vid'],
        "catalogue_name"=> $vcatlg_data['catalogue_name'],
        "link"=> base_url() . 'index.php/welcome/catlog?cid='.$vcatlg_data['cid'] . '&vid='. $vcatlg_data['vid'],
        "flag"=>$ordata->payment_status,
        "created_at"=> $vcatlg_data['created_at'],
        "updated_at"=> $vcatlg_data['updated_at']);
    }
    
    if($vvcatlg_data != null)
    {
        $this->response(array("success"=>true,
                                    "data"=>$vcatlgdt,"message"=>'catalogue   data tetrived   successfully'), REST_Controller::HTTP_OK);
    }
    else
    {
        $this->response(array("success"=>true,
                                    "data"=>[],"message"=>'catalogue   data not tetrived   successfully'), REST_Controller::HTTP_OK);
    }
    }
    
}
/*view product*/
public function allproduct_get()
{
    $vidp=$_GET['vid'];
    $cidp=$_GET['cid'];
     $this->db->where('vid',$vidp);
     $this->db->where('cid',$cidp);
    $aproduct_data=$this->db->get('product_tbl')->result_array();
  
    foreach($aproduct_data as $allprdt_data)
    {
      $img[]=array("image1"=>base_url(). 'images/' .$allprdt_data['image_1'],
        "image2"=>base_url(). 'images/' .$allprdt_data['image_2'],
        "image3"=>base_url(). 'images/' .$allprdt_data['image_3'],
        "image4"=>base_url(). 'images/' .$allprdt_data['image_4'],
        "image5"=>base_url(). 'images/' .$allprdt_data['image_5']);
         
      $alprdtdta[]=array("pid"=>$allprdt_data['pid'],
          "cid"=>$allprdt_data['cid'],
        "vid"=> $allprdt_data['vid'],
        "product_name"=> $allprdt_data['product_name'],
        "price"=>$allprdt_data['price'],
        "description"=>$allprdt_data['description'],
        "image"=>$img,
        "created_at"=> $allprdt_data['created_at'],
        "updated_at"=> $allprdt_data['updated_at']);
    }
    if($aproduct_data != null)
    {
        $this->response(array("success"=>true,
                                    "data"=>$alprdtdta,"message"=>'product   data retrived   successfully'), REST_Controller::HTTP_OK);
    }
    else
    {
        $this->response(array("success"=>true,
                                    "data"=>[],"message"=>'product   data Not retrived   successfully'), REST_Controller::HTTP_OK);
    }
    
}
public function product_delete_get()
{
    $pid=$_GET['pid'];
    $this->db->where('pid',$pid);
    $pdelete=$this->db->delete('product_tbl');
    if($pdelete)
    {
         $this->response(array("success"=>true,"message"=>'product   Delete  successfully'), REST_Controller::HTTP_OK);
    }
    
}
public function catalogue_delete_get()
{
    $cid=$_GET['cid'];
    $this->db->where('cid',$cid);
    $cdelete=$this->db->delete('catalogue');
    
    $this->db->where('cid',$cid);
    $pcdelete=$this->db->delete('product_tbl');
    if($pcdelete && $cdelete)
    {
         $this->response(array("success"=>true,"message"=>'catalogue   Delete  successfully'), REST_Controller::HTTP_OK);
    }
    
}
public function order_details_get()
{
    $vid=$_GET['vid'];
    $this->db->where('vid',$vid);
    $this->db->order_by('order_id','DESC');
    $prdd=$this->db->get('order_tbl')->result_array();
    foreach($prdd as $ordta)
    {
        $this->db->where('pid',$ordta['pid']);
    $pdd=$this->db->get('product_tbl')->row();
    
    $this->db->where('number',$ordta['number']);
    $userd=$this->db->get('sellright_users')->row();
    
        $orderdetail[]=array('order_id'=>$ordta['order_id'],'product'=>$ordta['product'],'description'=>$ordta['description'],'price'=>$pdd->price,'quantity'=>$ordta['qty'],'total_price'=>$ordta['price'],'image'=>base_url() . 'images/'.$ordta['image'],'uid'=>$userd->uid,
        'username'=>$userd->username,'email'=>$userd->email,'number'=>$userd->number,'address'=>$userd->address,'payment_type'=>'cash','order_status'=>$ordta['order_status'],'created_at'=>$ordta['created_at'],'updated_at'=>$ordta['updated_at']);
    }
    
     $this->response(array("success"=>true,
                                    "data"=>$orderdetail,"message"=>'Order Data retrived   successfully'), REST_Controller::HTTP_OK);
    
}
public function singleorder_detail_get()
{
     $oid=$_GET['order_id'];
    $this->db->where('order_id',$oid);
    $prdd=$this->db->get('order_tbl')->result_array();
    foreach($prdd as $ordta)
    {
        $this->db->where('pid',$ordta['pid']);
    $pdd=$this->db->get('product_tbl')->row();
    
    $this->db->where('number',$ordta['number']);
    $userd=$this->db->get('sellright_users')->row();
    
        $orderdetail=array('order_id'=>$ordta['order_id'],'product'=>$ordta['product'],'description'=>$ordta['description'],'price'=>$pdd->price,'quantity'=>$ordta['qty'],'total_price'=>$ordta['price'],'image'=>base_url() . 'images/'.$ordta['image'],'uid'=>$userd->uid,
        'username'=>$userd->username,'email'=>$userd->email,'number'=>$userd->number,'address'=>$userd->address,'payment_type'=>'cash','order_status'=>$ordta['order_status'],'created_at'=>$ordta['created_at'],'updated_at'=>$ordta['updated_at']);
    }
    
     $this->response(array("success"=>true,
                                    "data"=>$orderdetail,"message"=>'Order Data retrived   successfully'), REST_Controller::HTTP_OK);
}
public function plan_paymen_details_post()
{
    $plandata=array('plan'=>$this->input->post('plan'),'price'=>$this->input->post('price'),'vid'=>$this->input->post('vid'));
    $plnins=$this->db->insert('plan_payment_detail',$plandata);
    $this->db->where('plan_id',$this->db->insert_id());
    $respdata=$this->db->get('plan_payment_detail')->row();
    $data=array('plan_id'=>$respdata->plan_id,'plan'=>$respdata->plan,'vid'=>$respdata->vid,'price'=>$respdata->price);
    if($plnins)
    {
        $pstats=array('payment_status'=>1);
        $this->db->where('uid',$this->input->post('vid'));
        $us=$this->db->update('sellright_users',$pstats);
        if($us)
        {
            $this->response(array("success"=>true,"data"=>$data,"message"=>'payment success'), REST_Controller::HTTP_OK);
        }
    }
    
}
public function send_message_get()
{
   $to=$this->input->post('user_email');
   $from=$this->input->post('vendor_email');
}
public function order_status_get()
{
    $staus=array('order_status'=>$_GET['order_status']);
    $this->db->where('order_id',$_GET['order_id']);
    $us=$this->db->update('order_tbl',$staus);
    if($us)
    {
         $this->response(array("success"=>true,"message"=>'status updated'), REST_Controller::HTTP_OK);
    }
}
}    