<?php
class Catalogue extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index( $type, $pagenum = 1)
  {
  	    //头部 显示分类
    $type = urldecode($type);

    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();

    $datatype['title']    = $type . "-" . $this->simple_model->get_title();
    $datatype['keywords'] = $type . "," . $this->simple_model->get_keywords();
    $datatype['description'] = $type . "。" . $this->simple_model->get_title();

    $this->load->view('header', $datatype);

    $this->load->view('search');
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源
    $data['hbdx_blue'] = $this->simple_model->get_data($type,$pagenum);
    $this->load->view('index', $data);

	//分页
    $config['base_url']   = base_url("catalogue/" .$type);
    $config['total_rows'] = $this->simple_model->get_data_num($type);
    $config['per_page']   = $this->simple_model->get_shownum();
    $config['num_links']  = 4;
    $config['use_page_numbers'] = TRUE;
    $config['first_link'] = '首页';
    $config['last_link']  = '末页';
    $config['next_link']  = '下一页';
    $config['prev_link']  = '上一页';

    $this->pagination->initialize($config); 

    $this->load->view('page');

    //底部
    $this->load->view('footer');
  }
}

