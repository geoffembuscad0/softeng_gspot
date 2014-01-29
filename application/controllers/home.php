<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('tour_model');
	}
	public function index(){
		redirect('home/homepage');
	}
	public function homepage(){
		$data = array();
		$data['head'] = $this->layout->head($this->lang->line('custom_app_name'), css_files(), js_files());
		$data['app_name'] = $this->lang->line('custom_app_name');
		$data['footer'] = $this->layout->footer();
		$this->load->view('home_homepage', $data);
	}
	public function nav($type = null){
		$data = array();
		$data['head'] = $this->layout->head($this->lang->line('custom_app_name'), css_files(), js_files());
		$data['app_name'] = $this->lang->line('custom_app_name');
		$data['search_results'] = $this->tour_model->get_tourist_spots($type, 'NAVIGATE');
		$data['number_of_results'] = count($this->tour_model->get_tourist_spots($type, 'NAVIGATE'));
		$data['footer'] = $this->layout->footer();
		$this->load->view('home_searchResults', $data);
	}
	public function search(){
		redirect("home/search_results?keyword=" . $this->input->post('keyword'));
	}
	public function search_results(){
		$data = array();
		$data['head'] = $this->layout->head($this->lang->line('custom_app_name'), css_files(), js_files());
		$data['app_name'] = $this->lang->line('custom_app_name');
		die();
		$data['search_results'] = $this->tour_model->get_tourist_spots($this->input->get('keyword'));
		$data['number_of_results'] = count($data['search_results']);
		$data['footer'] = $this->layout->footer();
		$this->load->view('home_searchResults', $data);
	}
	public function region($region = null){
		if($region == null){
			redirect('home');
		}
		
		$data = array();
		$data['head'] = $this->layout->head($this->lang->line('custom_app_name'), css_files(), js_files());
		$data['app_name'] = $this->lang->line('custom_app_name');
		$data['search_results'] = $this->tour_model->get_tourist_spots($region, 'REGION');
		$data['number_of_results'] = count($this->tour_model->get_tourist_spots($region, 'REGION'));
		$data['footer'] = $this->layout->footer();
		$this->load->view('home_searchResults', $data);
	}
	public function get_place_info($place){
		if($place == null){
			redirect('home');
		}
		$data = array();
		$data['head'] = $this->layout->head($this->lang->line('custom_app_name'), css_files(), js_files());
		$data['app_name'] = $this->lang->line('custom_app_name');
		$data['place_info'] = $this->tour_model->get_tourist_information($place);

		$data['place_reviews'] = $this->tour_model->get_reviews($place);
		$data['place_avg'] = $this->tour_model->get_avg_rate($place);
		
		$data['footer'] = $this->layout->footer();
		$this->load->view('home_placeinformation', $data);
	}
}
