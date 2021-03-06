<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets'); ?>/auth_assets/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/auth_assets/css/owl.carousel.min.css" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/auth_assets/css/bootstrap.min.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/mycss.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/auth_assets/css/style2.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/sweetalert2.min.css" >

    <title><?= $title; ?></title>
    <link rel="Shortcut Icon" href="<?php echo base_url('assets');?>/img/belife-logo-1.png"/>

   
  

  </head>
  <body>

    <div class="content">
    


<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
        <img src="<?= base_url('assets'); ?>/auth_assets/images/belife-logo-full.png" alt="Image" class="img-fluid" />
            
        <img src="<?= base_url('assets'); ?>/auth_assets/images/undraw_reviewed_docs_re_9lmr.svg" alt="Image" class="img-fluid" />
            <p>Belife Apps Change Your Life Become Better</p>
         <br>
            <span class="d-block text-left my-4 text-center">Copyright &copy;<?= date('Y'); ?> PT Betterlife Jaya Indonesia</span>
        </div>
        <div class="col-md-9 register-right">
           
          
                    <h3 class="register-heading">Registrasi</h3>
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('Auth/Registration')?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row register-form">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Lengkap *" id="name" name="name"   value="<?= set_value('name'); ?>"  required  />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" id="email" name="email"   value="<?= set_value('email'); ?>"   />
                            </div>

                            <div class="form-group">
                                <input type="nohp" class="form-control" placeholder="No Handphone *" id="nohp" name="nohp"   value="<?= set_value('nohp'); ?>"  onkeypress="return hanyaAngka(event)" required />
                            </div>

                            <div class="form-group">
                                <input type="nik" class="form-control" placeholder="NIK KTP *"  id="nik" name="nik"   value="<?= set_value('nik'); ?>"  onkeypress="return hanyaAngka(event)" required  />
                            </div>
                           
                            <div class="form-group">
                                <input type="tgl_lahir" class="form-control" placeholder="Tangal Lahir *"  id="tgl_lahir" name="tgl_lahir"   value="<?= set_value('tgl_lahir'); ?>"   required  />
                                
                            </div>

                                            
                           
                            <div class="form-group">
                                <input type="tempat_lahir" class="form-control" placeholder="Tempat Lahir *"  id="tempat_lahir" name="tempat_lahir"   value="<?= set_value('tempat_lahir'); ?>"  required />
                            </div>

                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline">
                                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" checked>
                                        <span>Laki-Laki </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="jenis_kelamin"  id="jenis_kelamin2" value="perempuan">
                                        <span>Perempuan</span>
                                    </label>
                                </div>
                             </div>

                            <div class="form-group">
                            <select class="form-control" id="provinsi" name="provinsi">
                            <option value="" hidden>Provinsi</option> 

                                <?php foreach($provinsi as $r) :   ?>
                                    <option value="<?= $r['id_provinsi']; ?>"> <?= $r['nama_provinsi'];  ?></option> 
                                <?php endforeach;   ?> 
                                </select>      
                                                              
                            </div>

                            <div class="form-group">
                            <select class="form-control" id="kota" name="kota">
                            <option value="" hidden>Kota</option> 

                                    <?php foreach($kota as $r) :   ?>
                                        <option value="<?= $r['id_kota_kabupaten']; ?>"> <?= $r['nama_kota_kabupaten'];  ?></option> 
                                    <?php endforeach;   ?> 
                                </select>
                            </div>
                           
                           

                         
                      </div>
                        <div class="col-md-6">
                            <div class="form-group">
                             
                                <textarea class=" col-lg-12 form-control " style="overflow:auto;resize:none" id="alamat"  name="alamat" normalizer_normalize="alamat" rows="3"   value="<?= set_value('alamat'); ?>"  placeholder="Alamat Lengkap *"></textarea>
                            </div>


                            <div class="form-group">
                               <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="selfie_image" name="selfie_image" value="<?= set_value('selfie_image'); ?>" >
                                  <label class="custom-file-label" for="selfie_image">Foto Selfie *</label>
                                  </div>
                            </div>                       

                        

                            <div class="form-group">
                               <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="ktp_image" name="ktp_image"  value="<?= set_value('ktp_image'); ?>">
                                  <label class="custom-file-label" for="ktp_image">Foto KTP *</label>
                                  </div>
                            </div>

                           


                            <div class="form-group">
                               <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="selfie_ktp_image" name="selfie_ktp_image" value="<?= set_value('selfie_ktp_image'); ?>">
                                  <label class="custom-file-label" for="selfie_ktp_image">Foto Selfie Dengan KTP *</label>
                                  </div>
                            </div>





                            <div class="form-group">
                            <select class="form-control select2" id="id_org" name="id_org" data-placeholder="Select an Organization" style="width: 100%;" required>
                                    <option hidden>Nama Perusahaan</option>
                                           <?php foreach ($patner as $dt) : ?>
                                                  
                                                            <option value="<?= $dt['id']; ?>">
                                                                <?= $dt['patner_name']; ?>
                                                            </option>
                                                  
                                                    <?php endforeach; ?>
                                </select>
                            </div>
                           

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" value=""  id="password1" name="password1"  required/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password *" value="" id="password2" name="password2"  required />
                            </div>

                            
                           
                           
                           
                        </div>
                        <a href="<?= base_url('Auth'); ?>" class="btnSignIn text-center">Sign In</a>
                        <button type="submit" class="btnRegister">Register</button>
                       


                        </form>

                    </div>
                </div>
                

              
        </div>
    </div>

</div>


    </div>

    </div>


    <script src="<?= base_url('assets'); ?>/auth_assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets'); ?>/auth_assets/js/popper.min.js"></script>
    <script src="<?= base_url('assets'); ?>/auth_assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets'); ?>/auth_assets/js/main.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      	
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>      	   
        <script src="<?= base_url('assets/'); ?>dist/js/sweetalert2.min.js"></script>



    <script>
            $(document).ready(function () {
                $('#tgl_lahir').datepicker({
                    autoclose: true,
                    format: "dd/mm/yyyy"
                });
            });



        </script>     

<script>

function hanyaAngka(event) {
	var nohp = event.which ? event.which : event.keyCode;
    var nik = event.which ? event.which : event.keyCode;
	if (
		nohp != 46 &&
		nohp > 31 &&
		(nohp < 48 || nohp > 57)
	)
    if (
		nik != 46 &&
		nik > 31 &&
		(nik < 48 || nik > 57)
	)


		return false;
	return true;
}




</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>



  </body>
</html>
