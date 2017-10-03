<?php
class News_model extends CI_Model{
	public function __construct(){
		parent::__construct();
			$this->load->database();
	}
	//get all news record and get a news items from its slug
	public function get_news($slug = FALSE){
        if ($slug == FALSE){
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
	}
	//insert news item into the database
		public function set_news(){
			$this->load->helper(array('url', 'form'));

			$slug = url_title($this->input->post('title'), 'dash', TRUE);

				$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'text' => $this->input->post('text')
				);

		return $this->db->insert('news', $data);
	} 
	//register user details into the database
	public function register($data){
		return $this->db->insert('news_login', $data);
	} 
	//get user details into database
	public function get_user($user_id){
		$this->db->where('id', $user_id);
		return $this->db->get('news_login')->row();
}
	//verify user password before login
	public function resolve_login($username, $password){
		
		$this->db->where('username', $username);
		
		$hash = $this->db->get('news_login')->row('password');
		
		return password_verify($password, $hash);
	}
	//get user's username from database
	public function get_user_from_username($username){
		$this->db->where('username', $username);
		return $this->db->get('news_login')->row();
	}
	//get id from user
	public function get_user_id_from_username($username){
		$this->db->where('username', $username);
		$this->db->select('id');
		return $this->db->get('news_login')->row();
	}
}
?>