<?php
class I extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index($user_id = "")
  {
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();

    $datatype['title']    = "个人空间" . "-" . $this->simple_model->get_title();
    $datatype['keywords'] = "个人空间" . "," . $this->simple_model->get_keywords();
    $datatype['description'] = $this->simple_model->get_title();

    $this->load->view('header', $datatype);

    if ($user_id == "") {
        $arrayGT = array('warning' => '非法访问。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
        return;
    }

    if ($this->simple_model->get_user_byid($user_id)) 
    {
      $user = array('userid' => $user_id);
      $this->load->view('i',$user);
      return;
    }
    else
    {
      $arrayGT = array('warning' => '非法访问。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }

    //底部
    $this->load->view('footer');
  }
}