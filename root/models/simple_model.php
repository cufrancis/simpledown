<?php
class Simple_model extends CI_Model
{
	public function __construct()
  {
    $this->load->database();
  }
  //查询数据库获得每页显示的最大记录数
  public function get_shownum()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'FILESHOW'));
    foreach ($query->result_array() as $row)
    {
      return $row['code'];
    }
  }
  public function get_title()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'TITLE'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }
  //根据type和page查询记录，type = all时查询所有记录
  public function get_data($type,$page)
  {
    $limitnum = $this->get_shownum();

    if($type=="all")
    {
      $this->db->order_by("top", "asc");
      $this->db->order_by("id", "desc");  
      $query = $this->db->get('hbdx_blue',$limitnum,$limitnum*($page-1));
      return $query->result_array();
    }
    $this->db->order_by("top", "asc");
    $this->db->order_by("id", "desc"); 
    $query = $this->db->get_where('hbdx_blue', array('filetype' => $type),$limitnum,$limitnum*($page-1));
    return $query->result_array();
  }
  //根据type返回查询到的记录数
  public function get_data_num($type)
  {
    if($type=="all")
    {
      $query = $this->db->get('hbdx_blue');
      return $query->num_rows();
    }
    $query = $this->db->get_where('hbdx_blue', array('filetype' => $type));
    return $query->num_rows();
  }
  //根据记录id查询一条记录
  public function get_view( $id )
  {
    $query = $this->db->get_where('hbdx_blue',array('id' => $id));
    return $query->result_array();
  }
  public function bool_view( $id )
  {
    $query = $this->db->get_where('hbdx_blue',array('id' => $id));
    return $query->num_rows();
  }
  //查询所有分类
  public function get_type()
  {
    $this->db->order_by("tagsecond", "asc"); 
    $query = $this->db->get_where('hbdx_baseinfo', array('tagfirst' => 'LIST'));
    return $query->result_array();
  }

  public function update_filenum($id)
  {
    $query = $this->db->get_where( 'hbdx_blue',array( 'id' => $id ) );
    foreach ($query->result_array() as $row)
    {
      $num = $row['filenum'];
    }

    $num++;
    $data = array( 'filenum' => $num );  
    $this->db->where('id',$id); 
    $this->db->update('hbdx_blue', $data);  

  }

  public function Search($value,$page)
  {
    $limitnum = $this->get_shownum();
    $this->db->order_by("top", "asc");
    $this->db->order_by("id", "desc"); 
    $this->db->like('filetitle', $value); 
    $query = $this->db->get('hbdx_blue',$limitnum,$limitnum*($page-1));
    return $query->result_array();
  }

  public function Searchnum($value)
  {
    $this->db->like('filetitle', $value); 
    $query = $this->db->get('hbdx_blue');
    return $query->num_rows();
  }

    //查询所有标签
  public function get_tag()
  {
    $this->db->order_by("id", "asc"); 
    $query = $this->db->get('hbdx_tag');
    return $query->result_array();
  }

  public function tag($value,$page)
  {
    $limitnum = $this->get_shownum();
    $this->db->order_by("top", "asc");
    $this->db->order_by("id", "desc"); 
    $this->db->like('filetag', $value); 
    $query = $this->db->get('hbdx_blue',$limitnum,$limitnum*($page-1));
    return $query->result_array();
  }

  public function tagnum($value)
  {
    $this->db->like('filetag', $value); 
    $query = $this->db->get('hbdx_blue');
    return $query->num_rows();
  }

  public function reg_user()
  {
    $date = date("Y-m-d H:i:s");

    $integration = $this->get_sys_integration();

    $insert = array(
      'user_name'        => $this->input->post('username'), 
      'user_displayname' => $this->input->post('displayname'),
      'user_pass'        => $this->input->post('password'),
      'user_qq'          => $this->input->post('qq'),
      'user_mail'        => $this->input->post('email'),
      'user_group'       => "普通会员",
      'user_integration' => $integration,
      'registerdate'     => $date
    );

    $sdb = $this->db->insert('hbdx_users',$insert);
    return $sdb;
  }

  function login_user()
  {
    $this->db->where('user_name',$this->input->post('t_UserName'));
    $this->db->where('user_pass',md5($this->input->post('t_UserPass')));
    $query = $this->db->get('hbdx_users');

    return $query->num_rows();
  }

  function net_insert()
  {
    $date = date("Y-m-d H:i:s");
    $id = $this->input->post('fileid');

    $query = $this->db->get_where('hbdx_blue',array('id' => $id));
    if( $query->num_rows())
    {
      $updata = array(
        'filetitle' => $this->input->post('title'), 
        'filename' => $this->input->post('filename'),
        'filesize' => $this->input->post('filesize'),
        'filetype' => $this->input->post('filetype'),
        'fileurl' => $this->input->post('fileurl'),
        'fileext' => $this->input->post('fileext'),
        'fileuser' => $this->input->post('diaplayname'),
        'filetag' => $this->input->post('tag'),
        'filetext' => $this->input->post('message'),
        'keywords' => $this->input->post('keywords'),
        'description' => $this->input->post('description'),
        'integration' => $this->input->post('integration')
      );

      $this->db->where('id', $id);
      $sdb = $this->db->update('hbdx_blue', $updata);
      return $sdb;
    }
    else
    {
      $insert = array(
        'filetitle' => $this->input->post('title'), 
        'filename' => $this->input->post('filename'),
        'filesize' => $this->input->post('filesize'),
        'filetype' => $this->input->post('filetype'),
        'fileurl' => $this->input->post('fileurl'),
        'fileext' => $this->input->post('fileext'),
        'fileuser' => $this->input->post('diaplayname'),
        'filetag' => $this->input->post('tag'),
        'filetext' => $this->input->post('message'),
        'filenum' => 0,
        'loaddate' => $date,
        'top' => 1,
        'keywords' => $this->input->post('keywords'),
        'description' => $this->input->post('description'),
        'integration' => $this->input->post('integration')
      );

      $sdb = $this->db->insert('hbdx_blue',$insert);

      return $sdb;
    }
    
  }

  function upload_insert()
  {
      $date = date("Y-m-d H:i:s");
      $insert = array(
      'filetitle' => $this->input->post('title'), 
      'filename' => $this->input->post('filename'),
      'filesize' => $this->input->post('filesize'),
      'filetype' => $this->input->post('filetype'),
      'fileurl' => $this->input->post('fileurl'),
      'fileext' => $this->input->post('fileext'),
      'fileuser' => $this->input->post('diaplayname'),
      'filetag' => $this->input->post('tag'),
      'fileext' => $this->input->post('message'),
      'filenum' => 0,
      'loaddate' => $date,
      'top' => 1
    );

    $sdb = $this->db->insert('hbdx_blue',$insert);
    return $sdb;
  }

    //根据UserName查询DisplayName
  public function get_userdisplayname( $name )
  {
    $query = $this->db->get_where('hbdx_users',array('user_name' => $name));
    return $query->result_array();
  }

  public function is_admin( $name )
  {
    $query = $this->db->get_where('hbdx_users',array('user_name' => $name,'user_group' => "管理员"));
    return $query->num_rows();
  }

  public function this_id_is_admin( $id )
  {
    $query = $this->db->get_where('hbdx_users',array('id' => $id,'user_group' => "管理员"));
    return $query->num_rows();
  }

  public function get_user( $name )
  {
    $query = $this->db->get_where('hbdx_users',array('user_name' => $name));
    return $query->result_array();
  }

  public function del_view($id)
  {
    $this->db->where('id',$id); 
    $query=$this->db->delete('hbdx_blue'); 
    return $query; 
  }

  public function is_myfav( $id,$name )
  {
    $query = $this->db->get_where('hbdx_fav',array('fav_viewid' => $id,'fav_username' => $name));
    return $query->num_rows();
  }

  public function fav_view($id,$name)
  {
    $date = date("Y-m-d H:i:s");
    $view = $this->db->get_where('hbdx_blue',array('id' => $id));
    foreach ($view->result_array() as $row)
    {
      $title = $row['filetitle'];
    }
    
    $insert = array(
      'fav_viewid' => $id,
      'fav_viewtitle' => $title, 
      'fav_username' => $name,
      'FAV_DATE' => $date
    );

    $query = $this->db->insert('hbdx_fav',$insert);
    return $query;
  }

  public function unfav_view($id,$name)
  {
    $view = $this->db->get_where('hbdx_fav',array('id' => $id));
    foreach ($view->result_array() as $row)
    {
      $username = $row['fav_username'];
    }

    if($row['fav_username'] == $name)
    {
      $this->db->where('id',$id); 
      $query=$this->db->delete('hbdx_fav'); 
      return $query; 
    }
    else
    {
      return false;
    }


  }

  public function get_fav($name)
  {
    $query = $this->db->get_where('hbdx_fav',array('fav_username' => $name));
    return $query->result_array();
  }

  public function is_top($id)
  {
    $query = $this->db->get_where('hbdx_blue',array('id' => $id));
    foreach ($query->result_array() as $row)
    {
      if( $row['top'] == 0 )
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  }

  public function top_view($id)
  {
    $data = array('top' => 0);
    $this->db->where('id', $id);
    $query = $this->db->update('hbdx_blue', $data);
    return $query;
  }

  public function untop_view($id)
  {
    $data = array('top' => 1);
    $this->db->where('id', $id);
    $query = $this->db->update('hbdx_blue', $data);
    return $query;
  }

  public function get_all_data_name($name)
  {
    $limitnum = $this->get_shownum();
    $this->db->order_by("top", "asc");
    $this->db->order_by("id", "desc");
    $query = $this->db->get_where('hbdx_blue',array('fileuser' => $name));
    return $query->result_array();
  }

  public function get_data_name($name,$page)
  {
    $limitnum = $this->get_shownum();
    $this->db->order_by("top", "asc");
    $this->db->order_by("id", "desc");
    $query = $this->db->get_where('hbdx_blue',array('fileuser' => $name),$limitnum,$limitnum*($page-1));
    return $query->result_array();
  }

  public function get_data_name_num($name)
  {
    $query = $this->db->get_where('hbdx_blue', array('fileuser' => $name));
    return $query->num_rows();
  }

  public function get_data_user($id)
  {
    $query = $this->db->get_where('hbdx_blue',array('id' => $id));
    foreach ($query->result_array() as $row)
    {
      return $row['fileuser'];
    }
  }

  public function get_alluser($page)
  {
    $limitnum = $this->get_shownum();
    $this->db->order_by("user_group", "desc"); 
    $query = $this->db->get('hbdx_users',$limitnum,$limitnum*($page-1));
    return $query->result_array();
  }

  public function get_user_num()
  {
    $query = $this->db->get('hbdx_users');
    return $query->num_rows();
  }

  public function del_user($id)
  {
    $this->db->where('id',$id);
    $query=$this->db->delete('hbdx_users'); 
    return $query; 
  }

  public function admin_user($id)
  {
    $data = array('user_group' => "管理员");
    $this->db->where('id', $id);
    $query = $this->db->update('hbdx_users', $data);
    return $query;
  }

  public function repassword($id)
  {
     $pass = md5($this->input->post('t_UserPass'));
     $data = array('user_pass' => $pass);
     $this->db->where('id', $id);
     $query = $this->db->update('hbdx_users', $data);
     return $query;
  }

  public function get_system()
  {
    $this->db->order_by("tagsecond", "asc"); 
    $query = $this->db->get_where('hbdx_baseinfo', array('tagfirst' => 'SYSTEMINFO'));
    return $query->result_array();
  }

  public function get_show()
  {
    $this->db->order_by("tagsecond", "desc"); 
    $query = $this->db->get_where('hbdx_baseinfo', array('tagfirst' => 'SHOW'));
    return $query->result_array();
  }

  public function set_sys()
  {
    $title = array( 'code' => $this->input->post('title') );  
    $this->db->where('tagsecond',"TITLE");
    $query = $this->db->update('hbdx_baseinfo', $title); 

    $fileshow = array( 'code' => $this->input->post('fileshow') );  
    $this->db->where('tagsecond',"FILESHOW");
    $query = $this->db->update('hbdx_baseinfo', $fileshow); 

    $maxsize = array( 'code' => $this->input->post('maxsize') );  
    $this->db->where('tagsecond',"MAXSIZE");
    $query = $this->db->update('hbdx_baseinfo', $maxsize); 

    $typeexts = array( 'code' => $this->input->post('typeexts') );  
    $this->db->where('tagsecond',"TYPEEXTS");
    $query = $this->db->update('hbdx_baseinfo', $typeexts); 

    $keywords = array( 'code' => $this->input->post('keywords') );  
    $this->db->where('tagsecond',"KEYWORDS");
    $query = $this->db->update('hbdx_baseinfo', $keywords); 

    $description = array( 'code' => $this->input->post('description') );  
    $this->db->where('tagsecond',"DESCRIPTION");
    $query = $this->db->update('hbdx_baseinfo', $description);

    $tongji = array( 'code' => $this->input->post('tongji') );
    $this->db->where('tagsecond',"TONGJI");
    $query = $this->db->update('hbdx_baseinfo', $tongji);

    $pinglun = array( 'code' => $this->input->post('pinglun') );
    $this->db->where('tagsecond',"PINGLUN");
    $query = $this->db->update('hbdx_baseinfo', $pinglun);

    $pinglun = array( 'code' => $this->input->post('integration') );
    $this->db->where('tagsecond',"INTEGRATION");
    $query = $this->db->update('hbdx_baseinfo', $pinglun);

    return $query;
  }

  public function del_type($id)
  {
    $this->db->where('id',$id); 
    $query=$this->db->delete('hbdx_baseinfo'); 
    return $query; 
  }

    public function del_tag($id)
  {
    $this->db->where('id',$id); 
    $query=$this->db->delete('hbdx_tag'); 
    return $query; 
  }

  public function set_type()
  {
    $name = $this->input->post('type_name');
    $id   = $this->input->post('type_id');

    $query = $this->db->get_where('hbdx_baseinfo',array('code' => $name));
    if( $query->num_rows() )
    {
      $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => $id));

      if( $query->num_rows() )
      {
        return false;
      }
      else
      {
        $typename = array( 'tagsecond' => $id );  
        $this->db->where('code',$name);
        $query = $this->db->update('hbdx_baseinfo', $typename); 

        return $query;
      }
    }

    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => $id));
    if( $query->num_rows() )
    {
      $typeid = array( 'code' => $name );  
      $this->db->where('tagsecond',$id);
      $query = $this->db->update('hbdx_baseinfo', $typeid); 

      return $query;
    }

    $type = array(
      'tagfirst' => "LIST",
      'tagsecond' => $id, 
      'code' => $name
    );

    $query = $this->db->insert('hbdx_baseinfo',$type);
    return $query;
  }

  public function update_show($id)
  {
    $query = $this->db->get_where( 'hbdx_baseinfo',array( 'id' => $id ) );
    foreach ($query->result_array() as $row)
    {
      if ($row['code'] == "TRUE") {
        $show = "FALSE";
      } else {
        $show = "TRUE";
      }
    }

    $showfalg = array( 'code' => $show );  
    $this->db->where('id',$id);
    $query = $this->db->update('hbdx_baseinfo', $showfalg); 

    return $query;
  }

  public function set_tag()
  {
    $name = $this->input->post('tag_name');

    $query = $this->db->get_where('hbdx_tag',array('tag_name' => $name));
    if( $query->num_rows() )
    {
      return false;
    }

    $tag = array('tag_name' => $name);

    $query = $this->db->insert('hbdx_tag',$tag);
    return $query;
  }

  public function get_show_size()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => '大小'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_use()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => '操作'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_number()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => '下载量'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_user()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => '发布者'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_date()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => '日期'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_integration()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => '积分'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_tag()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => '标签'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }
  

  public function get_upload_typexts()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'TYPEEXTS'));
    foreach ($query->result_array() as $row)
    {
      $thisext = "";
      $exts = explode(",", $row['code']);
      for ($i=0; $i < count($exts); $i++) {
        $thisext = $thisext . "*." . $exts[$i] . ";";
      }

      return $thisext;
    }
  }

  public function get_show_typexts()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'TYPEEXTS'));
    foreach ($query->result_array() as $row)
    {
      return $row['code'];
    }
  }

  public function get_show_maxsize()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'MAXSIZE'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_tongji()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'TONGJI'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_show_pinglun()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'PINGLUN'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_keywords()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'KEYWORDS'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  public function get_description()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'DESCRIPTION'));
    foreach ($query->result_array() as $row)
    {
     return $row['code'];
    }
  }

  function mupost_insert($insert)
  {
    $sdb = $this->db->insert('hbdx_blue',$insert);
    return $sdb;
  }

  public function get_music()
  {
    $query = $this->db->get_where('hbdx_blue',array('fileext' => 'mp3'));
    return $query->result_array();
  }

  public function get_one_mp3()
  {
    $this->db->order_by("rand()"); 
    $query = $this->db->get_where('hbdx_blue',array('fileext' => 'mp3'));
    foreach ($query->result_array() as $row)
    {
     return $row['fileurl'];
    }
  }

  public function get_user_byid( $userid )
  {
    $query = $this->db->get_where('hbdx_users',array('id' => $userid));
    return $query->result_array();
  }

  public function get_user_bydisname( $disname )
  {
    $query = $this->db->get_where('hbdx_users',array('user_displayname' => $disname));
    return $query->result_array();
  }

  public function set_lastview($id,$username)
  {
    $query = $this->db->get_where( 'hbdx_users',array( 'user_name' => $username ) );
    foreach ($query->result_array() as $row)
    {
      $lastview = $row['lastview'];
    }
    if ($lastview == "") 
    {
      $lastview = $id;
    }
    else
    {
      if(!stristr($lastview,$id))
      {
        if(substr_count($lastview,"-")>=28) //记录最近30条浏览记录
        {
          $num = strrpos($lastview,"-"); 
          if ($num) 
          {
            $new = substr($lastview,0,$num); 
          }
          $lastview = $id."-".$new;
        }
        else
        {
          $lastview = $id."-".$lastview;
        }
      }
    }
    
    $data = array( 'lastview' => $lastview );  
    $this->db->where('user_name',$username); 
    $this->db->update('hbdx_users', $data);  
  }

  public function update_viewnum($id)
  {
    $query = $this->db->get_where( 'hbdx_blue',array( 'id' => $id ) );
    foreach ($query->result_array() as $row)
    {
      $num = $row['viewnum'];
    }

    $num++;
    $data = array( 'viewnum' => $num );  
    $this->db->where('id',$id); 
    $this->db->update('hbdx_blue', $data);  
  }

  public function get_view_integration($fileid)
  {
    $query = $this->db->get_where('hbdx_blue',array('id' => $fileid));
    foreach ($query->result_array() as $row)
    {
     return $row['integration'];
    }
  }

  public function get_user_integration($username)
  {
    $query = $this->db->get_where('hbdx_users',array('user_name' => $username));
    foreach ($query->result_array() as $row)
    {
     return $row['user_integration'];
    }
  }

  public function minus_user_integration($username,$integration)
  {
    $query = $this->db->get_where( 'hbdx_users',array( 'user_name' => $username ) );
    foreach ($query->result_array() as $row)
    {
      $user_integration = $row['user_integration'];
    }

    $user_integration = $user_integration - $integration;
    $data = array( 'user_integration' => $user_integration );  
    $this->db->where('user_name',$username); 
    $this->db->update('hbdx_users', $data);

    return $user_integration;
  }

  public function add_user_integration($username,$integration)
  {
    $query = $this->db->get_where( 'hbdx_users',array( 'user_displayname' => $username ) );
    foreach ($query->result_array() as $row)
    {
      $user_integration = $row['user_integration'];
    }

    $user_integration = $user_integration + $integration;
    $data = array( 'user_integration' => $user_integration );  
    $this->db->where('user_displayname',$username); 
    $this->db->update('hbdx_users', $data);

    return $user_integration;
  }

  public function get_displayname_by_fileid($fileid)
  {
    $query = $this->db->get_where('hbdx_blue',array('id' => $fileid));
    foreach ($query->result_array() as $row)
    {
     return $row['fileuser'];
    }
  }

  public function get_sys_integration()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('tagsecond' => 'INTEGRATION'));
    foreach ($query->result_array() as $row)
    {
      return $row['code'];
    }
  }

  public function add_down_record($viewid,$username)
  {
    $insert = array(
      'record_id' => $viewid,
      'user_name' => $username
    );

    $query = $this->db->insert('hbdx_downrecord',$insert);
    return $query;
  }

  public function is_down_record($viewid,$username)
  {
    $query = $this->db->get_where('hbdx_downrecord',array('record_id' => $viewid,'user_name' => $username));
    return $query->num_rows();
  }
}
