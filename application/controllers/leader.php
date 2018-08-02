<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leader extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        // $this->load->helper('checkbox');
        $this->load->library('form_validation');
    }

	public function index()
	{
        //Check if logged in. If not logged in, proceed; Else redirect back to previous page.
        if($this->session->userdata('role') == 'Leader')
        {
            //model function
            $this->load->model('leader_model');
            $userID = $this->session->userdata('userID');
            //$ccaID = $this->leader_model->getCCAID($userID);
            $data['studentlist'] = $this->leader_model->get_student_list($userID);
            $data['CCAID'] = $this->leader_model->getCCAID($userID)[0]->ccaID;

            $this->load->view('leader', $data);
        }
        else
        {
            redirect(base_url() . 'index.php');
        }
	}

	//delete student record from db
	 function delete_member($user_ccaID)
	 {
	 	//model function
        $this->load->model('leader_model');
        $this->leader_model->delete_specific_member($user_ccaID);

        $this->session->set_flashdata('msg', 'Member has been deleted!');
        redirect('leader','refresh');
     }

    function view_record($ccaid)
    {
        $this->load->model('leader_model');
        $viewrecord= $this->leader_model->get_allattendance($ccaid);
        $data['view'] = $viewrecord;
        $this->load->view('attendance',$data);
    }

    function get_record($ccaid)
    {  
         //load the Profile_model
        $this->load->model('leader_model');

        $data['query'] = $this->leader_model->get_attendance($ccaid);
        // $data['date'] = $this->leader_model->get_date();
        // $data['time'] = $this->leader_model->get_time();
        // $data['ccaid']=$ccaid;
        $this->load->view('add_attendance', $data);
    }

    function get_recordupdate($ccaid)
    {  
         //load the Profile_model
        $this->load->model('leader_model');

        $data['query'] = $this->leader_model->get_attendanceupdate($ccaid);
        $data['cca'] = $this->leader_model->get_attendance($ccaid);
        $data['date'] = $this->leader_model->get_date();
        $data['time'] = $this->leader_model->get_time();
        $this->load->view('update_attendance', $data);
    }

    function create_record($ccaid)
    {   
        // if($this->session->userdata('role') == 'Admin')
        // {

            $this->load->model('leader_model');
            // $data['query'] = $this->leader_model->get_attendance($ccaid);
            // $this->load->view('add_attendance', $data);
            $this->load->library('form_validation');

            //set validation rules
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('time', 'Time', 'required');
            
            // if ($this->form_validation->run() == FALSE)
            // {
            //     //fail validation
            //     $this->load->view('add_profile');
            // }
            // else
            // {
                //pass validation

                // $insert = $this->leader_model->get_attendance($ccaid);
                // for($i=0;$i<$insert;$i++) {
                // $data[$i]=array(
                //     'userid' => $this->input->post('userid'),
                //     'ccaid' => $this->input->post('ccaid'),
                //     'date' => $this->input->post('date'),
                //     'time' => $this->input->post('time'),
                //     'attendance'=>$_POST['attendance'.$insert[$i]->userID],
                //     'reason' => $this->input->post('reason'),
                //     'remarks' => $this->input->post('remarks'),
                // );}
               
                $rows = count($this->leader_model->get_attendance($ccaid));
               // $temp = "attendance" . $this->input->post('userid');
                $data = array();

                for($i=0; $i < $rows; $i++) {
                    if (isset($this->input->post('attendance')[$i])) {
                        $attendance[$i] = 1;
                    } else {
                        $attendance[$i] = 0;
                    }
                    
                    $data[] = array(
                        'userid' => $this->input->post('userid')[$i],
                        'ccaid' => $this->input->post('ccaid')[$i],
                        'date' => $this->input->post('date'),
                        // $this->input->post('dob'),
                        'time' => $this->input->post('time'),
                        'attendance' => $attendance[$i],
                        'reason' => $this->input->post('reason')[$i],
                        'remarks' => $this->input->post('remarks')[$i],
                    );
                }


                //insert the form data into database
                $this->db->insert_batch('attendance', $data);

                //  $data_view = array(
                //     'User_name' => $this->input->post('username'),
                //     'cca_name' => $this->input->post('ccaname'),
                // );

                // $this->db->insert('attendance_view', $data_view);

                //display success message
                $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">New user has been added!</div>');
                // redirect('leader/get_record/' . $ccaid);
            // }
        // }
        // else
        // {
        //     redirect(base_url() . 'index.php');
        // }
    }

    function update_record()
    {
        $data['studid'] = $studid;

            //fetch data from user table
            $data['user'] = $this->Profile_model->get_user();

            //fetch student record for the given student no.
            $data['query'] = $this->Profile_model->get_student_record($studid);

            //set validation rules
            $this->form_validation->set_rules('name', 'Name',
                'trim|required|callback_alpha_only_space');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('adminno', 'AdminNo', 'required|alpha_numeric|exact_length[7]');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('dob', 'Dob', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                //fail validation
                $this->load->view('update_profile', $data);

            }
            else
            {
                //pass validation
            $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'adminNumber' => $this->input->post('adminno'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'role' => $this->input->post('role'),
                //'dob' => @date('d-m-Y',@strtotime($this->input->post('dateofbirth'))),
            );

                //update the student record
            $this->db->where('userID',$studid);
            $this->db->update('user',$data);

                //display success message
            $this->session->set_flashdata('msg','<div class="alert alert-success textcenter">Details has been updated successfully.</div>');
            redirect('profile/get_user/' . $studid);
            }
    }

    function search_record()
    {
        //load the Profile_model
        $this->load->model('leader_model');
       
        $date = $this->input->post('date');
        $time = $this->input->post('time');

        // if(isset($name) and !empty($name)){
        $data['datetime'] = $this->leader_model->search_dt($date,$time);
        $this->load->view('add_attendance',$data);   
    }

     function get_interest($ccaID)
    {
        $userID = $this->session->userdata('userID');
        //load the Profile_model
        $this->load->model('leader_model');
        $data['query'] = $this->leader_model->get_interest($ccaID);
        $this->load->view('interest', $data);
    }

    function get_contact_us()
    {        
        //load the Profile_model
        $this->load->model('leader_model');
        $data['query'] = $this->leader_model->get_contact_us();
        $this->load->view('cca_contact_us', $data);
    }
}