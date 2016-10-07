<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Controller {

	public function index() {
		$this->form_validation->set_error_delimiters('<span class="onshow">', '</span>');

		$this->form_validation->set_rules('username', '用户名', 'trim|required|min_length[5]|max_length[12]|alpha_dash|is_unique[hbdx_users.user_name]|xss_clean');
		$this->form_validation->set_rules('password', '密码', 'trim|required|min_length[6]|max_length[18]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', '确认密码', 'trim|required');
		$this->form_validation->set_rules('email', '邮箱', 'trim|required|valid_email|is_unique[hbdx_users.user_mail]');
		$this->form_validation->set_rules('displayname', '昵称', 'trim|required|min_length[2]|max_length[12]|is_unique[hbdx_users.user_displayname]');
		$this->form_validation->set_rules('qq', 'QQ', 'trim|required|min_length[5]|max_length[15]|integer|is_unique[hbdx_users.user_qq]');
    
    	$datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
        $this->load->view('header', $datatype);

	  	if($this->form_validation->run() == FALSE) {
	  		if( $this->session->userdata('online') ) {
	  			redirect(base_url(), 'refresh');
	  		} else {
	  			$this->load->view('reg');
	  		}
	 	} else {
	 		if($this->simple_model->reg_user()){
	 			$url = base_url('login');
        		$arrayGT = array('warning' => '注册成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        		$this->load->view('goto',$arrayGT);
	 		} else {
	 			$url = base_url('reg');
        		$arrayGT = array('warning' => '注册失败。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        		$this->load->view('goto',$arrayGT);
	 		}	
	  	}

	  	$this->load->view('footer');
	}
}

/* End of file xixi.php */
/* Location: ./application/controllers/xixi.php */