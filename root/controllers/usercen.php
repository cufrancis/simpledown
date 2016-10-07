<?php
class Usercen extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index( $page = 1 )
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $data['hbdx_user'] = $this->simple_model->get_alluser($page);
        $this->load->view('usercen',$data);

              //分页
        $config['base_url']   = base_url("usercen/index");
        $config['total_rows'] = $this->simple_model->get_user_num();
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
      else
      {
        $arrayGT = array('warning' => '非法访问。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
    }
    else
    {
      $arrayGT = array('warning' => '非法访问。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }
    //底部
    $this->load->view('footer');
  }


  public function del($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name

              //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        if($this->simple_model->this_id_is_admin($id))  //是否是管理员组用户
        {
            $url = base_url()."usercen";
            $arrayGT = array('warning' => '不能删除管理员群组的用户。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
            $this->load->view('goto',$arrayGT);
        }
        else
        {
          if($this->simple_model->del_user($id))
          {
            $url = base_url()."usercen";
            $arrayGT = array('warning' => '会员信息删除成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
            $this->load->view('goto',$arrayGT);
          }
        }
      }
      else
      {
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
              //底部
      $this->load->view('footer');
    }                      
  }

  public function admin($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name

              //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        if($this->simple_model->this_id_is_admin($id))  //是否是管理员组用户
        {
          $url = base_url()."usercen";
          $arrayGT = array('warning' => '用户已经在管理员群组中了。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
        else
        {
          if($this->simple_model->admin_user($id))
          {
            $url = base_url()."usercen";
            $arrayGT = array('warning' => '提升为管理员成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
            $this->load->view('goto',$arrayGT);
          }
        }


      }
      else
      {
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
              //底部
      $this->load->view('footer');
    }                      
  }
}