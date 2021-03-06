<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PurchaseOrder_DeliveryOrder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        is_logged_in();

        $this->load->model('users_m');
        $this->load->model('DataMaster_m');
        $this->load->model('po_do_m');
    }

    

    public function PermohoanDana()
    {
        $data['title']          = "Permohonan Dana";
        $data['dtOrganization'] = $this->DataMaster_m->get_all_organization();
        $data['dtWorklocation'] = $this->DataMaster_m->get_all_worklocation();
        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('employeeid'));
        $data['podolist']     = $this->po_do_m->list_wating_podo();
        $data['kode_podo']    =    $this->po_do_m->kode_podo_seq();
        $kode_po_do =  $data['kode_podo'];
        $data['listadd']    =   $this->po_do_m->list_wating_podo_add($kode_po_do)->result_array();
        $data['countoderpodo']    =   $this->po_do_m->list_wating_podo_add($kode_po_do)->num_rows();
        $data['sumpodoadd']    =   $this->po_do_m->sum_wating_podo_add($kode_po_do);
     
    


        $this->load->view('Po_Do/PermohonanDana', $data);

    }

    
    public function PoDoSupplier()
    {
        $data['title']          = "PO & DO Supplier";
        $data['dtOrganization'] = $this->DataMaster_m->get_all_organization();
        $data['dtWorklocation'] = $this->DataMaster_m->get_all_worklocation();
        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('employeeid'));
        $data['list_supplier']     = $this->po_do_m->list_supplier();
        $data['kode_podo']    =    $this->po_do_m->kode_podo_seq();
        $kode_po_do =  $data['kode_podo'];
        $data['listadd_supplier']    =   $this->po_do_m->list_wating_podo_add_supplier($kode_po_do)->result_array();
        $data['countoderpodo']    =   $this->po_do_m->list_wating_podo_add_supplier($kode_po_do)->num_rows();
        $data['sumpodoadd']    =   $this->po_do_m->sum_wating_podo_add_supplier($kode_po_do);
        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('employeeid'));
        $this->load->view('Po_Do/PoDoSupplier', $data);


    }



    public function PostPoDo_1()
    { 
        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('username'));
        $username           = $data['usrProfile']['username'];
     
        $kode_po_do =$this->input->post('kodepodo');

        $datainsert = [

            'kode_po_do' => $this->input->post('kodepodo'),
            'total_req' => $this->input->post('totalreqpodo2'),
            'count_detail' => $this->input->post('countoderpodo'),
            'status_po_do' => 'REQ',
            'po_do_type' => 1,
            'is_print' => 0,
            'user_request' => $username,
            'date_request'  => date('Y-m-d H:i:s')
             ];


             $this->db->insert('po_do', $datainsert);
       

             $this->po_do_m->update_po_do_request($kode_po_do);

             $logData = [          
                'username' => $this->session->userdata('username'),
                'activities' => 'Req Permohonan Dana Pembelian Barang',
                'url'        => base_url('PurchaseOrder_DeliveryOrder/PostPoDo_1'),
                'object'     => $datainsert['kodepodo'],
                'ipdevice'   => Get_ipdevice(),
                'at_time'    => date('Y-m-d H:i:s')
            ];
            $this->db->insert('log_activity', $logData);

            $this->session->set_flashdata('message', '
               <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close text-sm-left" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>Success!</h5>
                   Request Permohonan Dana Sudah Terkirim Ke Finance .
                </div>
            ');
            redirect('PurchaseOrder_DeliveryOrder/PermohoanDana');




    }



    
    public function PostPoDo_2()
    { 
        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('username'));
        $username           = $data['usrProfile']['username'];
     
        $kode_po_do =$this->input->post('kodepodo');

        $datainsert = [

            'kode_po_do' => $this->input->post('kodepodo'),
            'total_req' => $this->input->post('totalreqpodo2'),
            'count_detail' => $this->input->post('countoderpodo'),
            'status_po_do' => 'REQ',
            'po_do_type' => 2,
            'is_print' => 0,
            'user_request' => $username,
            'date_request'  => date('Y-m-d H:i:s')
             ];


             $this->db->insert('po_do', $datainsert);
       

             $this->po_do_m->update_po_do_request_sup($kode_po_do);

             $logData = [          
                'username' => $this->session->userdata('username'),
                'activities' => 'Req PO DO Supplier',
                'url'        => base_url('PurchaseOrder_DeliveryOrder/PostPoDo_2'),
                'object'     => $datainsert['kodepodo'],
                'ipdevice'   => Get_ipdevice(),
                'at_time'    => date('Y-m-d H:i:s')
            ];
            $this->db->insert('log_activity', $logData);

            $this->session->set_flashdata('message', '
               <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close text-sm-left" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>Success!</h5>
                   Request Permohonan Dana Sudah Terkirim Ke Finance .
                </div>
            ');
            redirect('PurchaseOrder_DeliveryOrder/PoDoSupplier');




    }
    

   



    
    public function AddPoDoPermohonanDana()
    {

        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('username'));
        $username           = $data['usrProfile']['username'];
        $kode_po_do =$this->input->post('kode_po_do');
        $kode_parent =  $this->input->post('kode_parent');
    
        $price =  $this->input->post('price');

        $data = [

            'kode_po_do' => $kode_po_do,
            'kode_parent' => $kode_parent,        
            'price' => $price,
            'po_do_type' => 1,
            'is_request' => 0,
            'is_add' => 1,
            'user_post' => $username,
            'date_post'  => date('Y-m-d H:i:s')
             ];

     
        $this->db->insert('po_do_detail', $data);


        $data['countoderpodo']    =   $this->po_do_m->list_wating_podo_add($kode_po_do)->num_rows();
        $data['sumpodoadd']    =   $this->po_do_m->sum_wating_podo_add($kode_po_do);


        $data2 = [
                'countoderpodo' => $data['countoderpodo'],
                'sumpodoadd'  => $data['sumpodoadd']['price']

                 ];


        echo json_encode($data2);

     
    }


    public function DelPoDoPermohonanDana()
    {

        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('username'));
        $username           = $data['usrProfile']['username'];

        $id =  $this->input->post('id');
        $kode_po_do =  $this->input->post('kode_po_do');
     




        $this->po_do_m->del_wating_podo($id);

        $data['countoderpodo']    =   $this->po_do_m->list_wating_podo_add_supplier($kode_po_do)->num_rows();
        $data['sumpodoadd']    =   $this->po_do_m->sum_wating_podo_add($kode_po_do);


        $data = [
                'countoderpodo' => $data['countoderpodo'],
                'sumpodoadd'  => $data['sumpodoadd']['price']

                 ];

          


        echo json_encode($data);

    }

    public function Checksupplierdata()
    {

        $id_supplier =  $this->input->post('id_supplier');

        $data =  $this->po_do_m->getdatasupplier($id_supplier);




        echo json_encode($data);

    }



    
    
    public function AddPoDoSupplier()
    {

        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('username'));
       
        $username           = $data['usrProfile']['username'];
        $kode_po_do =$this->input->post('kode_po_do');
        $kode_parent =  $this->input->post('kode_parent');
    
        $price =  $this->input->post('price');

        $data = [

            'kode_po_do' => $kode_po_do,
            'kode_parent' => $kode_parent,        
            'price' => $price,
            'po_do_type' => 2,
            'is_request' => 0,
            'is_add' => 1,
            'user_post' => $username,
            'date_post'  => date('Y-m-d H:i:s')
             ];





     
        $this->db->insert('po_do_supplier_detail', $data);


        $data['countoderpodo']    =   $this->po_do_m->list_wating_podo_add_supplier($kode_po_do)->num_rows();
        $data['sumpodoadd']    =   $this->po_do_m->sum_wating_podo_add_supplier($kode_po_do);


        $data2 = [
                'countoderpodo' => $data['countoderpodo'],
                'sumpodoadd'  => $data['sumpodoadd']['price']

                 ];


        echo json_encode($data2);

     
    }
    


    public function DelPoDoSupplier()
    {

        $data['usrProfile']     = $this->users_m->get_user_profile($this->session->userdata('username'));
        $username           = $data['usrProfile']['username'];

        $id =  $this->input->post('id');
        $kode_po_do =  $this->input->post('kode_po_do');


     




        $this->po_do_m->del_wating_podo_sup($id);

        $data['countoderpodo']    =   $this->po_do_m->list_wating_podo_add_supplier($kode_po_do)->num_rows();
        $data['sumpodoadd']    =   $this->po_do_m->sum_wating_podo_add_supplier($kode_po_do);


        $data = [
                'countoderpodo' => $data['countoderpodo'],
                'sumpodoadd'  => $data['sumpodoadd']['price']

                 ];

    

        echo json_encode($data);

    }

    






    
}
