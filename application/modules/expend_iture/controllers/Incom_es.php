<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incom_es extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'incomes_model'
        ));
    }

    public function index($id = null)
    {

        $this->permission->method('expend_iture', 'read')->redirect();
        $data['title'] = display('incomes_list');
        $data['categorytype'] = $this->incomes_model->allcategorytype();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('expend_iture/incom_es/index');
        $config["total_rows"] = $this->incomes_model->countlist();
        $config["per_page"] = 15;
        $config["uri_segment"] = 4;
        /* This Application Must Be Used With BootStrap 4 * */
        $config['full_tag_open'] = '<ul class="pagination pagination-md">';
        $config['full_tag_close'] = '</ul>';
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
        $config['last_link'] = false;
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["incomeslist"] = $this->incomes_model->read();
        $data["links"] = $this->pagination->create_links();

        if (!empty($id)) {
            $data['title'] = display('expend_iture_edit');
            $data['intinfo'] = $this->incomes_model->findById($id);
        }
        #
        #pagination ends
        #   
        $data['module'] = "expend_iture";
        $data['page'] = "incomeslist";
        echo Modules::run('template/layout', $data);
    }


    public function create($id = null)
    {
        $data['title'] = display('expend_iture_add');
        $this->form_validation->set_rules('categoritypeyname', display('add_category_type'), 'required|xss_clean');
        $this->form_validation->set_rules('incom_es', display('incom_es'), 'required|xss_clean');
        $saveid = $this->session->userdata('id');
        $data['intinfo'] = "";
        if ($this->form_validation->run()) {
            $img = $this->fileupload->do_upload(
                'application/modules/room_facilities/assets/images/', 'facilitypicture'
            );
            if ($img === false) {
                $this->session->set_flashdata('exception', "Please Upload a Valid Document");
            }
            if (empty($this->input->post('mesurementid', TRUE))) {
                $category = $this->input->post('categoritypeyname', TRUE);
                $category_details = $this->input->post('categoryname', TRUE);
                $this->db->where('categorytypeid', $category);
                $this->db->where('LOWER(incomesmesurementitle)', strtolower($category_details));
                $this->db->where('LOWER(incomesmamount)', strtolower($category_details));
                $this->db->where('LOWER(incomesmrecorder)', strtolower($category_details));
                $this->db->FROM('incomesmesurement');
                $query = $this->db->get();
                $result = $query->row();
                if ($result <= 0) {
                    $data['expend_iture'] = (object)$postData = array(
                        'mesurementid' => $this->input->post('mesurementid', TRUE),
                        'categorytypeid' => $this->input->post('categoritypeyname', TRUE),
                        'incomesmesurementitle' => $this->input->post('incom_es', TRUE),
                        'incomesmamount' => $this->input->post('incom_esamount', TRUE),
                        'incomesmrecorder' => $this->input->post('incom_esrecorder', TRUE),
                        'image' => $img,
                    );
                } else {
                    $this->permission->method('expend_iture', 'create')->redirect();
                }
                if ($this->incomes_model->create($postData)) {
                    $this->session->set_flashdata('message', display('save_successfully'));
                    redirect('expend_iture/incom-es-list');
                } else {
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
                redirect("expend_iture/incom-es-list");

            } else {
                $this->permission->method('expenditury', 'update')->redirect();
                $id = $this->input->post('mesurementid', TRUE);
                $imageinfo = $this->db->select('*')->from('incomesmesurement')->where('mesurementid', $id)->get()->row();
                if (!empty($img)) {
                    unlink($imageinfo->image);
                } else {
                    $img = $imageinfo->image;
                }
                $postData = array(
                    'mesurementid' => $this->input->post('mesurementid', TRUE),
                    'categorytypeid' => $this->input->post('categoritypeyname', TRUE),
                    'incomesmesurementitle' => $this->input->post('incom_es', TRUE),
                    'incomesmamount' => $this->input->post('incom_esmamount', TRUE),
                    'incomesmrecorder' => $this->input->post('incom_esmrecorder', TRUE),
                    'image' => $img
                );

                if ($this->incomes_model->update($postData)) {
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
                redirect("expend_iture/incom-es-list");
            }
        } else {
            if (!empty($id)) {
                $data['title'] = display('expend_iture_edit');
                $data['intinfo'] = $this->incomes_model->findById($id);
            }
            $data['categorytype'] = $this->incomes_model->allcategorytype();
            $data['module'] = "expend_iture";
            $data['page'] = "incomeslist";
            echo Modules::run('template/layout', $data);
        }

    }

    public function updateintfrm($id)
    {

        $this->permission->method('expend_iture', 'update')->redirect();
        $data['title'] = display('expend_iture_edit');
        $data['intinfo'] = $this->incomes_model->findById($id);
        $data['categorytype'] = $this->incomes_model->allcategorytype();
        $data['module'] = "expend_iture";
        $data['page'] = "incomesedit";
        $this->load->view('expend_iture/incomesedit', $data);
    }

    public function delete($id = null)
    {
        $this->permission->module('expend_iture', 'delete')->redirect();

        if ($this->incomes_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('expend_iture/incom-es-list');
    }

}
