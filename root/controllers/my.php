<?php
class My extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index( $pagenum = 1 )
  {
        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      $user = $this->simple_model->get_userdisplayname($username);
      foreach ($user as $name)
      {
          $disname = $name['user_displayname'];
      }

      $my['hbdx_my'] = $this->simple_model->get_data_name($disname,$pagenum);
      $this->load->view('my',  $my);

  //分页
      $config['base_url']   = base_url("my/index");
      $config['total_rows'] = $this->simple_model->get_data_name_num($disname);
      $config['per_page']   = $this->simple_model->get_shownum();
      $config['num_links']  = 4;
      $config['use_page_numbers'] = TRUE;
      $config['first_link'] = '首页';
      $config['last_link']  = '末页';
      $config['next_link']  = '下一页';
      $config['prev_link']  = '上一页';

      $this->pagination->initialize($config); 

      $this->load->view('page');
    }
        //底部
    $this->load->view('footer');
  }
}