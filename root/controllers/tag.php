<?php
class Tag extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index( $tag = "", $page = 1)
  {
    //头部 显示分类
    $tag = urldecode($tag);

    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();

    $datatype['title']    = "标签：". $tag . "-" . $this->simple_model->get_title();
    $datatype['keywords'] = $tag . "," . $this->simple_model->get_keywords();
    $datatype['description'] = $tag . "。" . $this->simple_model->get_title();
    

    $this->load->view('header', $datatype);

    $this->load->view('search');
    
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源

    $data['hbdx_blue'] = $this->simple_model->tag($tag,$page);
    $this->load->view('index', $data);

          //分页
    $config['base_url']   = base_url("tag/" .$tag);
    $config['total_rows'] = $this->simple_model->tagnum($tag);
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

