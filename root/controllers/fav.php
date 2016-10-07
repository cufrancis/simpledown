<?php
class Fav extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      $fav['hbdx_fav'] = $this->simple_model->get_fav($username);
      $this->load->view('fav',  $fav);
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