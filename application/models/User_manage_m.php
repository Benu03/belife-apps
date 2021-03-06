<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');

ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv

class user_manage_m extends CI_Model
{


    function get_all_detaildataregister($id)
    {
     

        $query = "exec SP_BELIFE_DETAIL_PERSONAL_CUSTOMER   @id='$id'    ";
        return $this->db->query($query)->row_array();  
    }



    function get_all_detailuser($id)
    {
     

        $query = "select 
        a.id,
        a.username,
        b.name_full,
        a.email,
        b.phone,
        b.nik,
        convert(date,b.tgl_lahir,103) as tgl_lahir,
        b.tempat_lahir,
        b.jenis_kelamin,
        c.nama_provinsi,
        d.nama_kota_kabupaten,
        b.address_ktp,
        b.selfie_image,
        b.ktp_image,
        b.selfie_ktp_image,
        b.limit,
        b.id_loc,
        e.patner_name,
        a.is_active,
        b.datetime_post
        
         from users a
        left join personal_customer b on a.username = b.username 
        left join ms_provinsi c on b.provinsi_id = c.id_provinsi
        left join ms_kota_kabupaten d on b.kota_id = d.id_kota_kabupaten
        left join patner e on b.id_org = e.id
         where a.id_role=2 and a.id ='$id'    ";
        return $this->db->query($query)->row_array();  
    }




    
    function get_all_detaildataregister_generate($id)
    {
     

        $query = "
        select 
        a.id,
        a.username,
        b.name_full,
        a.email,
        b.phone,
        b.nik,
        convert(date,b.tgl_lahir,103) as tgl_lahir,
        b.tempat_lahir,
        b.jenis_kelamin,
        c.nama_provinsi,
        d.nama_kota_kabupaten,
        b.address_ktp,
        b.selfie_image,
        b.ktp_image,
        b.selfie_ktp_image,
        b.limit,
        b.id_loc,
        e.patner_name,
        a.is_active,
        b.datetime_post
        
         from users a
        left join personal_customer b on a.username = b.username 
        left join ms_provinsi c on b.provinsi_id = c.id_provinsi
        left join ms_kota_kabupaten d on b.kota_id = d.id_kota_kabupaten
        left join patner e on b.id_org = e.id
         where a.id_role=2 and a.is_active=0 and a.username ='$id'   ";
        return $this->db->query($query)->row_array();  
    }

    function get_all_detailuser_generate($id)
    {
     

        $query = "
        select 
        a.id,
        a.username,
        b.name_full,
        a.email,
        b.phone,
        b.nik,
        convert(date,b.tgl_lahir,103) as tgl_lahir,
        b.tempat_lahir,
        b.jenis_kelamin,
        c.nama_provinsi,
        d.nama_kota_kabupaten,
        b.address_ktp,
        b.selfie_image,
        b.ktp_image,
        b.selfie_ktp_image,
        b.limit,
        b.id_loc,
        e.patner_name,
        a.is_active,
        b.datetime_post
        
         from users a
        left join personal_customer b on a.username = b.username 
        left join ms_provinsi c on b.provinsi_id = c.id_provinsi
        left join ms_kota_kabupaten d on b.kota_id = d.id_kota_kabupaten
        left join patner e on b.id_org = e.id
         where a.id_role=2 and  a.username ='$id'   ";
        return $this->db->query($query)->row_array();  
    }



  
    function get_all_dataregister()
    {
     

        $query = "exec SP_BELIFE_ALL_PERSONAL_CUSTOMER        ";
        return $this->db->query($query)->result_array();  
    }


    function update_limitstatuspesonalcustomer($data)
    {
        $username = $data['username'];
        $limit = $data['limit'];
        $status_register = $data['status_register'];

        
        $query = "update personal_customer set limit=$limit,status_register='$status_register' where username ='$username' ";
        return $this->db->query($query);  

    }

    function update_limitstatuspesonalcustomer2($data)
    {
        $username = $data['username'];
        $limit = $data['limit'];
    

        
        $query = "update personal_customer set limit=$limit where username ='$username' ";
        return $this->db->query($query);  

    }
    

    function reject_limitstatuspesonalcustomer($username)
    {
        
       
        $query = "update personal_customer set limit = 0,status_register='Reject' where username ='$username' ";
        return $this->db->query($query);  

    }


    function get_list_user()
    {
     

        $query = "select 
        a.id,
        a.username,
        a.name,
        a.email,
        b.phone,
        d.patner_name
        
        
        
         from users a
         left join personal_customer b on a.username = b.username
         left join patner d on b.id_org = d.id
        
        
        where a.id_role=2 and status_register='Approved'";
        return $this->db->query($query)->result_array();  
    }


    function get_all_user_generate()
    {
    
        $query = "select 
        a.id,
        a.username,
        a.name,
        a.email,
        b.phone,
		b.nik,
		b.tgl_lahir,
		b.tempat_lahir,
		b.jenis_kelamin,
		e.nama_provinsi ,
		f.nama_kota_kabupaten,
		b.address_ktp,
		b.limit,
        d.patner_name
        
        
        
         from users a
         left join personal_customer b on a.username = b.username
         left join patner d on b.id_org = d.id
	     left join ms_provinsi e on b.provinsi_id = e.id_provinsi
		 left join ms_kota_kabupaten f on b.kota_id = f.id_kota_kabupaten
        
        where a.id_role=2";
        return $this->db->query($query)->result_array();  


    }
    
    

    
}
