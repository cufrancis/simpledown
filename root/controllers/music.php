<?php
class Music extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();

    $datatype['title']    = "音乐视听-" . "-" .$this->simple_model->get_title();
    $datatype['keywords'] = "音乐视听" . "," . $this->simple_model->get_keywords();
    $datatype['description'] = "音乐视听。" . $this->simple_model->get_title();

    $this->load->view('header', $datatype);

    $this->load->view('music');
    
    //底部
    $this->load->view('footer');
  }

  public function random()
  {
    $mp3 = $this->simple_model->get_one_mp3();
    echo $mp3;
  }
}