<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

		public function get_news($articles = FALSE)
		{
		        if ($articles === FALSE)
		        {
		                $query = $this->db->get('articles');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('articles', array('id' => $articles));
		        return $query->row_array();
		}

		public function set_news()
		{
		    $this->load->helper('url');

		    $articles = url_title($this->input->post('title'), 'dash', TRUE);

		    $data = array(
		        'title' => $this->input->post('title'),
		        'content' => $this->input->post('content')
		    );

		    return $this->db->insert('articles', $data);
		}
}