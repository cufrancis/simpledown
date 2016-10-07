<?php
class User extends CI_Controller 
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
      $user['hbdx_user'] = $this->simple_model->get_user($username);
      $this->load->view('user',  $user);
    }
    //底部
    $this->load->view('footer');
  }

  public function repass()
  {
            //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      $user['hbdx_user'] = $this->simple_model->get_user($username);

      foreach ($user['hbdx_user'] as $row)
      {
        $userid = $row['id'];
      }

      if($query = $this->simple_model->repassword($userid))
      {
        $url = base_url()."user";
        $arrayGT = array('warning' => '修改密码成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
      else
      {
        $url = base_url()."user";
        $arrayGT = array('warning' => '修改密码失败。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
    }
            //底部
    $this->load->view('footer');
  }
}