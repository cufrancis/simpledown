<?php
class Simple extends CI_Controller 
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

    $this->load->view('search');
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源
    $data['hbdx_blue'] = $this->simple_model->get_data("all", 1);
    $this->load->view('index', $data);

  //分页
    $config['base_url']   = base_url('simple/page');
    $config['total_rows'] = $this->simple_model->get_data_num("all");
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

  public function page($pagenum = 1)
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    $this->load->view('search');
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源
    $data['hbdx_blue'] = $this->simple_model->get_data("all", $pagenum);
    $this->load->view('index', $data);

  //分页
    $config['base_url']   = base_url('simple/page');
    $config['total_rows'] = $this->simple_model->get_data_num("all");
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

  public function view($id)
  {
    if( !$this->simple_model->bool_view($id) ) 
    {
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);
      $arrayGT = array('warning' => '记录不存在。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }
    else
    {
      $view['hbdx_view'] = $this->simple_model->get_view($id);

          //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();

      foreach ($view['hbdx_view'] as $value) {
        $datatype['title']       = $value['filetitle'] . "-" . $this->simple_model->get_title();
        if($value['keywords'] != "") {
          $datatype['keywords']  = $value['keywords'] . "," . $this->simple_model->get_keywords();
        } else {
          $datatype['keywords']  = $value['filetag'] . "," . $this->simple_model->get_keywords();
        }

        if ($value['description'] != "") {
          $datatype['description'] = $value['description'];
        } else {
          $datatype['description'] = $value['filetitle'] . "。" . $this->simple_model->get_description();
        }
      }

      $this->load->view('header', $datatype);
      $this->load->view('view',  $view);
      $this->simple_model->update_viewnum($id);
      if( $this->session->userdata('online') )
      {
        $username = $this->session->userdata('Username');//从session中读取name
        $this->simple_model->set_lastview($id,$username);
      }
    }
    //底部
    $this->load->view('footer');
   }

  public function down($id)
  {
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->simple_model->bool_view($id) ) 
    {
      $this->simple_model->update_filenum($id);

      $file_integration = $this->simple_model->get_view_integration($id);
      if( $file_integration == 0 ) {  //免费资源直接下载
        $view['hbdx_view'] = $this->simple_model->get_view($id);
        foreach ($view['hbdx_view'] as $news_item)
        {
          $data = file_get_contents($news_item['fileurl']);
          force_download($news_item['filename'], $data);
        }
      } else {
        if( $this->session->userdata('online') )  //已登录
        {
          $username = $this->session->userdata('Username');
          $user    = $this->simple_model->get_userdisplayname($username);
          foreach ($user as $name)
          {
            $displayname = $name['user_displayname'];
          }
          $own_displayname = $this->simple_model->get_displayname_by_fileid($id);
          if ($displayname == $own_displayname) {   //下载自己的资源 直接下载
              $this->simple_model->add_down_record($id,$username);//新增下载记录
              $view['hbdx_view'] = $this->simple_model->get_view($id);
              foreach ($view['hbdx_view'] as $news_item)
              {
                $data = file_get_contents($news_item['fileurl']);
                force_download($news_item['filename'], $data);
              }
           } else {
            $user_integration = $this->simple_model->get_user_integration($username);
            if( $user_integration < $file_integration ) {
              $arrayGT = array('warning' => '积分不够。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
              $this->load->view('goto',$arrayGT);
            } else {
              if(!$this->simple_model->is_down_record($id,$username))  //没有下载记录
              {
                $this->simple_model->minus_user_integration($username,$file_integration); //下载者减少积分
                $this->simple_model->add_user_integration($own_displayname,$file_integration); //发布者增加积分
                $this->simple_model->add_down_record($id,$username);//新增下载记录
              }
              $view['hbdx_view'] = $this->simple_model->get_view($id);
              foreach ($view['hbdx_view'] as $news_item)
              {
                $data = file_get_contents($news_item['fileurl']);
                force_download($news_item['filename'], $data);
              }
            }
          }
        } else {   //未登录
          $arrayGT = array('warning' => '请登录后再下载。', 'times' => 3 , 'url' => base_url('login') ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
      }
    }
     $this->load->view('footer');
  }

 public function search( $search, $page = 1 )
 {
    //头部 显示分类
    $search = urldecode($search);

    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();

    $datatype['title']    = "搜索结果-" . $search . "-" .$this->simple_model->get_title();
    $datatype['keywords'] = $search . "," . $this->simple_model->get_keywords();
    $datatype['description'] = $search . "。" . $this->simple_model->get_title();
    
    $this->load->view('header', $datatype);

    $this->load->view('search');
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源
    $data['hbdx_blue'] = $this->simple_model->Search( $search,$page );
    $this->load->view('index', $data);
    
      //分页
    $config['base_url']   = base_url('simple/search');
    $config['total_rows'] = $this->simple_model->Searchnum($search);
    $config['per_page']   = $this->simple_model->get_shownum();
    $config['num_links']  = 4;
    $config['use_page_numbers'] = TRUE;
    $config['first_link'] = '首页';
    $config['last_link']  = '末页';
    $config['next_link']  = '下一页';
    $config['prev_link']  = '上一页';

    $this->pagination->initialize($config); 

    $this->load->view('page');

    $this->load->view('footer');
 }

  public function del($id)
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
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        //删除文件
        $view['hbdx_view'] = $this->simple_model->get_view($id);
        foreach ($view['hbdx_view'] as $news_item)
        {
          if($news_item['fileext'] != "net" && file_exists($news_item['fileurl']) )
          {
            unlink($news_item['fileurl']);
          }
        }
        //删除记录
        if($this->simple_model->del_view($id))
        {
          $arrayGT = array('warning' => '删除成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
      }
      elseif( $disname == $this->simple_model->get_data_user($id) )
      {
        //删除文件
        $view['hbdx_view'] = $this->simple_model->get_view($id);
        foreach ($view['hbdx_view'] as $news_item)
        {
          if($news_item['fileext'] != "net")
          {
            unlink($news_item['fileurl']);
          }
        }
        if($this->simple_model->del_view($id))
        {
          $arrayGT = array('warning' => '删除成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
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

  public function fav($id)
  {
          //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name


      if($this->simple_model->is_myfav($id,$username))
      {
        $arrayGT = array('warning' => '该资源已经在你的收藏列表中了。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
        return;
      }

      if($this->simple_model->fav_view($id,$username))
      {
        $arrayGT = array('warning' => '收藏成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
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

  public function unfav($id)
  {
          //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name

      if($this->simple_model->unfav_view($id,$username))
      {
        $url = base_url('fav');
        $arrayGT = array('warning' => '删除收藏成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
      else
      {
        $url = base_url();
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
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

  public function top($id)
  {
            //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        if($this->simple_model->top_view($id))
        {
          $arrayGT = array('warning' => '置顶成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
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

  public function untop($id)
  {
        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        if($this->simple_model->untop_view($id))
        {
          $arrayGT = array('warning' => '取消置顶成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
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

  public function upload()
  {
    $year  = date("Y");
    $month = date("m");
    $day   = date("d");

    if( !is_dir("uploads") ) {
      if( !mkdir ("uploads", 0755) ) {
        return false;
      }
    }
    chdir("uploads");
    if( !is_dir($year) ) {
      if( !mkdir ($year, 0755) ) {
        return false;
      }
    }
    chdir($year);
    if( !is_dir($month) ) {
      if( !mkdir ($month, 0755) ) {
        return false;
      }
    }
    chdir($month);
    if( !is_dir($day) ) {
      if( !mkdir ($day, 0755) ) {
        return false;
      }
    }
    chdir("../../../");

    $targetFolder = "uploads/".$year."/".$month."/".$day."/";

    if (!empty($_FILES)) 
    {
      $tempFile = $_FILES['Filedata']['tmp_name'];
      $fileName = $_FILES["Filedata"]["name"];

      $fileExt  = explode('.', $_FILES['Filedata']['name']);
      $ext = $fileExt[count($fileExt) - 1];
      $tempName = md5(uniqid(microtime())); 
    
      $fileParts = pathinfo($_FILES['Filedata']['name']);  
        
      $copyFilePath =  $targetFolder.$tempName.".".$ext;

      $Size  = number_format( ($_FILES['Filedata']['size']/1024), 2 );

      $temp = ".".$ext;
      $temps = explode($temp,$fileName);
      $Title = $temps[0];
 
      move_uploaded_file($tempFile,$copyFilePath);
      echo $Title."|".$fileName."|".$copyFilePath."|".$Size." KB|".$ext;
    }
  }

  public function repost($id)
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
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        if( !$this->simple_model->bool_view($id) ) 
        {
          $arrayGT = array('warning' => '记录不存在。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
        else
        {
          $view['hbdx_view'] = $this->simple_model->get_view($id);
          $this->load->view('post',  $view);
        }
      }
      elseif( $disname == $this->simple_model->get_data_user($id) )
      {
        if( !$this->simple_model->bool_view($id) ) 
        {
          $arrayGT = array('warning' => '记录不存在。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
        else
        {
          $view['hbdx_view'] = $this->simple_model->get_view($id);
          $this->load->view('post',  $view);
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