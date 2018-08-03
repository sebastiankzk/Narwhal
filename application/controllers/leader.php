<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leader extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('leader_model');
        $this->load->helper('form');
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
    
    //show all records based on specific cca
    function view_record($ccaid)
    {
        $this->load->model('leader_model');
        $data['training'] = $this->leader_model->get_training($ccaid);
        $data['view'] = $this->leader_model->get_allattendance($ccaid);
        
        $this->load->view('attendance',$data);
    }

    // function view_record($attid)
    // {
    //     $this->load->model('leader_model');
    //     //call the model function to get the User data
    //     $userresult = $this->leader_model->get_attendance();
    //     $data['query'] = $userresult;
    //     //load the profile view
    //     $this->load->view('add_attendance',$data);
    // }

    function get_record($ccaid)
    {  
         //load the Profile_model
        $this->load->model('leader_model');

        $data['query'] = $this->leader_model->get_attendance($ccaid);
        $data['datetime'] = $this->leader_model->get_datetime($ccaid);
        // $data['date'] = $this->leader_model->get_date();
        // $data['time'] = $this->leader_model->get_time();
        $this->load->view('add_attendance', $data);
    }

    function get_training($ccaid)
    {  
         //load the Profile_model
        $this->load->model('leader_model');

        $data['query'] = $this->leader_model->get_attendance($ccaid);
        $this->load->view('add_training', $data);
    }

    function create_record($ccaid)
    {   
        // if($this->session->userdata('role') == 'Admin')
        // {
        $this->load->library('form_validation');

            //set validation rules
        // $this->form_validation->set_rules('date', 'Date', 'required');
        // $this->form_validation->set_rules('time', 'Time', 'required');

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
                    // if (isset($this->input->post('attendance')[$i])) {
                    //     $attendance[$i] = 1;
                    // } else {
                    //     $attendance[$i] = 0;
                    // }
                    
                    $data[] = array(
                        'userid' => $this->input->post('userid')[$i],
                        'ccaid' => $this->input->post('ccaid')[$i],
                        'trainingID' => $this->input->post('datetime'),
                        // $this->input->post('dob'),
                        // 'time' => $this->input->post('time'),
                        'attendance' => $this->input->post('attendance')[$i] ? 1:0,
                        'reason' => $this->input->post('reason')[$i],
                        'remarks' => $this->input->post('remarks')[$i],
                    );
                }

        // $data = array(
        //     'date' => @date('d-m-Y', @strtotime($this->input->post('date'))),
        //             // $this->input->post('dob'),
        //     'time' => $this->input->post('time'),
        // );


                //insert the form data into database
        $this->db->insert_batch('attendance', $data);

                //create insert
        // $data = array(
        //     'title' => 'My title',
        //     'name' => 'My Name',
        //     'date' => 'My date'
        // );

        // $this->db->insert('mytable', $data);

                //display success message

                $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">New attendance record has been added!</div>');
                redirect('leader/get_record/' . $ccaid);

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

    function create_training()
    {
        // if($this->session->userdata('role') == 'Admin')
        // {
            $this->load->library('form_validation');

            //set validation rules
            
            $this->form_validation->set_rules('datetime', 'datetime', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                //fail validation
                $this->load->view('add_training');
            }
            else
            {

                //pass validation
                $data = array(
                    'datetime' => ($this->input->post('datetime')),
                    'ccaID' => ($this->input->post('ccaid'))
                );

                //insert the form data into database
                $this->db->insert('training', $data);

                //display success message
                $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">New training session has been added!</div>');
                redirect(base_url(). '/index.php/leader/get_training/3','refresh');
            }
        // }
        // else
        // {
        //     redirect(base_url() . 'index.php');
        // }
    }

    // function search_training($ccaid)
    // {
    //     //load the Profile_model
    //     $this->load->model('leader_model');

    //     $datetime = $this->input->post('datetime');

    //     // if(isset($name) and !empty($name)){
    //     $data['training'] = $this->leader_model->get_training($ccaid);
    //     $data['view'] = $this->leader_model->get_allattendance($ccaid);
    //     $data['datetime'] = $this->leader_model->search_training($datetime);
    //     $this->load->view('attendance',$data);   
    // }

    function get_interest($ccaID)
    {
        $userID = $this->session->userdata('userID');
        //load the Profile_model
        $this->load->model('leader_model');
        $query = $this->leader_model->get_interest($ccaID);

        $this->load->model('audition_model');
        $list = $this->audition_model->load($ccaID);

        $count = 0;
        foreach($query as $user){
            if(count($list) > 0){
                $status = true;
                foreach($list as $audition){
                    $dataField = $this->audition_model->getAuditionPerson($audition['id'],$user->userID);
                    if($dataField){
                        $status = false;
                        $query[$count]->audiStatus = $dataField[0]['status'];
                        break;
                    }

                    if($status){
                        $query[$count]->audiStatus = 'Has not applied';
                    }
                }

                
            }else{
                $query[$count]->audiStatus = 'No Audition for this CCA';
            }
            $count++;
        }

        $data['query'] = $query;
        $this->load->view('interest', $data);
    }

    function get_contact_us()
    {        
        //load the Profile_model
        $this->load->model('leader_model');
        $data['query'] = $this->leader_model->get_contact_us();
        $this->load->view('cca_contact_us', $data);
    }

    function acceptUser($interestId){
        $this->load->model('leader_model');
        $query = $this->leader_model->get_interest_base($interestId);

        $data = ['userID' => $query[0]->userID,'ccaID' => $query[0]->ccaID, 'quit'=> 'Not Quit'];

        $this->leader_model->add_member($data);

        $this->db->where('id', $interestId);
        $this->db->delete('cca_interest');

        redirect('/leader','refresh');
    }
}