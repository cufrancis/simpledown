<?php
class System extends CI_Controller 
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
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $this->load->view('system');
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

  public function type()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $typeinfo['hbdx_baseinfo'] = $this->simple_model->get_type();
        $this->load->view('systemtype',$typeinfo);
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

  public function tag()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $taginfo['hbdx_baseinfo'] = $this->simple_model->get_tag();
        $this->load->view('systemtag',$taginfo);
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

  public function show()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $this->load->view('systemshow');
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

    public function mupost()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $this->load->view('mupost');
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

  public function hbdxcc()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $this->load->view('hbdxcc');
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

  public function setsys()
  {
    $this->form_validation->set_rules('title','title','required');
    $this->form_validation->set_rules('fileshow','fileshow','required');
    $this->form_validation->set_rules('maxsize','maxsize','required');
    $this->form_validation->set_rules('typeexts','typeexts','required');
    $this->form_validation->set_rules('integration','integration','required');

        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if($this->form_validation->run() == FALSE)
    {
      redirect( base_url('system'), 'refresh');
    }
    else
    {
      if($query = $this->simple_model->set_sys())
      {
        $url = base_url('system');
        $arrayGT = array('warning' => '保存系统设置成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
      else
      {
        $url = base_url('system');
        $arrayGT = array('warning' => '保存系统设置失败。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
    }
        //底部
    $this->load->view('footer');
  }

  public function del_type($id)
  {
                  //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        //删除记录
        if($this->simple_model->del_type($id))
        {
          $arrayGT = array('warning' => '删除分类成功。', 'times' => 3 , 'url' => base_url()."system/type" ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
      }
      else
      {
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
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

  public function settype()
  {
    $this->form_validation->set_rules('type_name','type_name','required');
    $this->form_validation->set_rules('type_id','type_id','required');

        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if($this->form_validation->run() == FALSE)
    {
      redirect( base_url('system/type'), 'refresh');
    }
    else
    {
      if($query = $this->simple_model->set_type())
      {
        $url = base_url('system/type');
        $arrayGT = array('warning' => '新增分类成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
      else
      {
        $url = base_url('system/type');
        $arrayGT = array('warning' => '新增分类失败,分类名称或者序号已经存在。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
    }
        //底部
    $this->load->view('footer');
  }

  public function set_show($id)
  {
                  //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        if($this->simple_model->update_show($id))
        {
          $arrayGT = array('warning' => '更新状态成功。', 'times' => 3 , 'url' => base_url()."system/show" ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
      }
      else
      {
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
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

  public function settag()
  {
    $this->form_validation->set_rules('tag_name','tag_name','required');

        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if($this->form_validation->run() == FALSE)
    {
      redirect( base_url('system/tag'), 'refresh');
    }
    else
    {
      if($query = $this->simple_model->set_tag())
      {
        $url = base_url('system/tag');
        $arrayGT = array('warning' => '新增标签成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
      else
      {
        $url = base_url('system/tag');
        $arrayGT = array('warning' => '新增标签失败,标签名称已经存在。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
    }
        //底部
    $this->load->view('footer');
  }

  public function del_tag($id)
  {
                  //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        //删除记录
        if($this->simple_model->del_tag($id))
        {
          $arrayGT = array('warning' => '删除标签成功。', 'times' => 3 , 'url' => base_url()."system/tag" ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
      }
      else
      {
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
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

  public function postmany()
  {
    $this->load->helper('directory');
                  //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      $user    = $this->simple_model->get_userdisplayname($username);
      foreach ($user as $name)
      {
        $userdisname = $name['user_displayname'];
      }
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {

          $path = "myfile";
          if( !is_dir( $path ) )
          {
              $arrayGT = array('warning' => 'Myfile文件夹不存在。', 'times' => 3 , 'url' => base_url()."system/mupost" ); //3秒后跳转到首页
              $this->load->view('goto',$arrayGT);
          } 
          else
          {
            $current_dir = opendir( $path );
                 
            while( ( $file = readdir( $current_dir ) ) !== false ) 
            {
              $sub_dir = $path ."/". $file;
              if( $file == '.' || $file == '..' ) 
              {
                  continue;
              } 
              else if( is_dir( $sub_dir ) ) //文件夹
              {
                  continue;
              } 
              else    //文件
              {
                $file_name  = basename( $sub_dir );
                $file_exts  = pathinfo( $sub_dir, PATHINFO_EXTENSION );
                $file_title = basename( $file_name, ".".$file_exts );
                $file_title = iconv('GB2312','UTF-8//IGNORE',$file_title);
                $file_name  = iconv('GB2312','UTF-8//IGNORE',$file_name);
                $file_size  = filesize( $sub_dir );

                $edit_size  = number_format( ( $file_size/1024 ), 2 )." KB";    //文件大小
                $edit_date  = date("Y-m-d H:i:s");

                if( file_exists( $sub_dir ) ) 
                {
                    $temp_name = md5( uniqid( microtime() ) );  
                    $news_name = $temp_name . '.' . $file_exts;  //编码后的文件名
                    $save_path = './uploads/'.$news_name;
                    $fileinfo = array('filetitle' => $file_title, 'filename' => $file_name, 'filesize' => $edit_size, 'filetype' => $this->input->post('filetype'), 'fileurl' => $save_path, 'fileext' => $file_exts, 'fileuser' => $userdisname, 'filetag' => $this->input->post('tag'), 'filetext' => "",'filenum' => 0, 'loaddate' => $edit_date, 'top' => 1);
                    if( $this->simple_model->mupost_insert( $fileinfo ) )
                    {
                      copy($sub_dir,$save_path);
                      if(file_exists($sub_dir) )
                      {
                        unlink($sub_dir);
                      }
                    } 
                }
              }
            }
            $arrayGT = array('warning' => '批量发布完成。', 'times' => 3 , 'url' => base_url()."system/mupost" ); //3秒后跳转到首页
            $this->load->view('goto',$arrayGT);
          }
      }
      else
      {
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
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

}