<?php
class News extends CI_Controller {

    public function __construct(){
		parent::__construct();
                $this->load->model('news_model');
                $this->load->helper(array('form', 'url_helper'));
	}
		
			//view all news
    public function index(){
		
		
                $data['news'] = $this->news_model->get_news();
				$data['title'] = 'News archieve';

				$this->load->view('templates/header', $data);
				$this->load->view('news/index', $data);
				$this->load->view('templates/footer');
        }
			//view a specific news item
    public function view($slug = NULL){
            
			$data['news_item'] = $this->news_model->get_news($slug);
				
				if (empty($data['news_item'])){
                show_404();
				}
					$data['title'] = $data['news_item']['title'];

					$this->load->view('templates/header', $data);
					$this->load->view('news/view');
					$this->load->view('templates/footer');
		}
	
	
	//check whether the form was submitted and whether the submitted form passed the validation rules
	public function create(){
		if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in']==false){
				redirect('news/login');
		}
		
		$this->load->library('form_validation');

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('news/create');
        $this->load->view('templates/footer');
		
		//if form was submitted and passed the validation rules, load the model
		}else{
			
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}
	
	//user signup
		public function signup(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'password confirmation', 
		'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]');
		
		if ($this->form_validation->run()== false){
			
			$this->load->view('news/sign_up');
			$this->load->view('templates/footer');
		}else{
			//register user details into database
			$user_details = array(
				'username' => $_POST['username'],
				'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),//password_hashing
				'email' => $_POST['email'],
				);
		if($this->news_model->register($user_details)){
			
			//$this->load->view('news/index');
			$this->load->view('news/sign_up_success');
		}else{
			$this->load->view('news/login_error');
		}
		
	}
	}
	//user login
	public function login(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('news/login');
		}else{
			$username=$_POST['username'];
			$password= $_POST['password'];
			
		if ($this->news_model->resolve_login($username, $password)){
			
			$user = $this->news_model->get_user_from_username($username);
			$_SESSION['user_id'] = $user->id;
			$_SESSION['username'] = $user->username;
			$_SESSION['email'] = $user->email;
			$_SESSION['logged_in'] = true;
			
			redirect('news/create');
			
		}else{
			$this->load->view('news/login_error');
		}
	}
	}
	//logout user account
	public function logout(){
		if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in']==false){
				redirect('news/login');
		}
		
		$this->session->sess_destroy();
		redirect('news/login');
	}
	
	
	
	//verify session login
	public function news_content(){
		var_dump($_SESSION);
	}
}
?>