<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expend_iture extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'expenditury_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('expend_iture','read')->redirect();
        $data['title']    = 'Expenditure'; 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('expend_iture/expend_iture/index');
        $config["total_rows"]  = $this->expenditury_model->countlist();
        $config["per_page"]    = 15;
        $config["uri_segment"] = 4;
         /* This Application Must Be Used With BootStrap 4 * */
        $config['full_tag_open']='<ul class="pagination pagination-md">';
        $config['full_tag_close']='</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="ti-angle-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
		$config['prev_link'] = '<i class="ti-angle-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
		$config['last_link'] =false;
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["categorilist"] = $this->expenditury_model->read();
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('expend_iture_edit');
		$data['intinfo']   = $this->expenditury_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "expend_iture";
        $data['page']   = "expenditureylist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('expend_iture_add');
	  $this->form_validation->set_rules('categoryname',display('category_name'),'required|max_length[50]|is_unique[expenditureytype.categorytypetitle]|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('categorytypeid', TRUE))) {
		 $data['expend_iture']   = (Object) $postData = array(
		   'categorytypeid'     	 => $this->input->post('categorytypeid', TRUE),
		   'categorytypetitle' 	     => $this->input->post('categoryname',TRUE),
		  );
		$this->permission->method('expend_iture','create')->redirect();
		if ($this->expenditury_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('expend_iture/expend-iture-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("expend_iture/expend-iture-list"); 
	
	   } else {
		$this->permission->method('expenditury','update')->redirect();
		$data['expend_iture']   = (Object) $postData = array(
		   'categorytypeid'     	 => $this->input->post('categorytypeid', TRUE),
		   'categorytypetitle' 	     => $this->input->post('categoryname',TRUE),
		  );
	 
		if ($this->expenditury_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("expend_iture/expend-iture-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('expend_iture_edit');
		$data['intinfo']   = $this->expenditury_model->findById($id);
	   }
	    #
        #pagination starts
        #
        $config["base_url"] = base_url('expend_iture/expend_iture/index');
        $config["total_rows"]  = $this->expenditury_model->countlist();
        $config["per_page"]    = 15;
        $config["uri_segment"] = 4;
         /* This Application Must Be Used With BootStrap 4 * */
        $config['full_tag_open']='<ul class="pagination pagination-md">';
        $config['full_tag_close']='</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="ti-angle-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
		$config['prev_link'] = '<i class="ti-angle-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
		$config['last_link'] =false;
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["categorilist"] = $this->expenditury_model->read();
        $data["links"] = $this->pagination->create_links();
	   $data['module'] = "expend_iture";
	   $data['page']   = "expenditureylist";   
	   echo Modules::run('template/layout', $data); 
	   }   
    }
   public function updateintfrm($id){
		$this->permission->method('expend_iture','update')->redirect();
		$data['title'] = display('expend_iture_edit');
		$data['intinfo']   = $this->expenditury_model->findById($id);
        $data['module'] = "expend_iture";  
        $data['page']   = "expenditureyedit";
		$this->load->view('expend_iture/expenditureyedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('expend_iture','delete')->redirect();
		if ($this->expenditury_model->delete($id)) {
            $this->db->where("categoritypeid",$id)->delete("expeniturey_ref_accomodation");
            $this->db->where("categorytypeid",$id)->delete("expenditureydetails");
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('expend_iture/expend-iture-list');
    }
 
}
