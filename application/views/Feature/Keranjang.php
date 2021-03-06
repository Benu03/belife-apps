<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">
                                <?= $this->uri->segment(1); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= $title; ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
           
                <div class="col-12">
              
                   


                        <div class="card card-solid">
                         <div class="card-body">
                         <?=  $this->session->flashdata('alert');   ?>

                         <div class="card-body table-responsive pad">
                         <table  id="tbk1"class="table table-hover text-nowrap mb-3">
                                <thead class="text-center">
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Sub-Total</th>
                                         <th>Aksi</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($datacart as $dt) : ?>
                                        <tr >
                                            <td width="100px" class="text-center">
                                                
                                            <img src="<?= base_url('assets/img/product/').$dt['image_product']; ?>" class="img-thumbnail" >
                                            
                                            
                                          
                                        
                                        
                                           </td>
                                            <td  class="text-left" style="vertical-align:middle" ><?= $dt['nama_product']; ?></td>
                                            <td  width="150px" class="text-center"  style="vertical-align:middle" >
                                          

                                       

   

                                            
                                           
                                                <input type="number" value="<?= $dt['qty']; ?>" min="1" max="<?= $dt['stok']; ?>" name="qtykeranjang" id="qtykeranjang<?= $dt['id']; ?>"  onchange="qty_subtotal(<?= $dt['id']; ?>)" />             
        
                                     

                                                <input class="form-control input-sm" type="text" value="<?= $dt['price']; ?>"  
                                                name="hrgbrg<?= $dt['id']; ?>" id="hrgbrg<?= $dt['id']; ?>"  hidden />       
                                                
                                                <input class="form-control input-sm" type="text" value="<?= $dt['kode_product']; ?>"  
                                                name="kodeprd<?= $dt['id']; ?>" id="kodeprd<?= $dt['id']; ?>"  hidden />  
                                          
                                            
        
                                        



                                        
                                        
                                        </td>
                                            <td   class="text-center" style="vertical-align:middle" >Rp. <?= number_format($dt['price'],0 ,',','.'); ?></td>
                                            <td width="150px" class="text-center"  style="vertical-align:middle"   id="datasubtotal<?= $dt['id']; ?>" name="datasubtotal<?= $dt['id']; ?>">
                                           Rp. <?= number_format($dt['subtotal'],0 ,',','.'); ?></td>

                                            <td class="text-center"  style="vertical-align:middle" >
                                         
                                            <a class="btn btn-sm bg-warning" href="<?= base_url('Feature/DeleteProductkeranjang'); ?>/<?= $dt['id']; ?>" ><i class="fas fa-inbox"></i> Hapus</a> 

                                            <a class="btn btn-sm bg-success" href="<?= base_url('Feature/DetailProductkeranjang'); ?>/<?= $dt['kode_product']; ?>" ><i class="fas fa-barcode"></i> Lihat Detail</a> 
                                         
                                            </td>
                                         
                                        </tr>
                                    <?php endforeach; ?>
                                        <tr>
                                        <td colspan="6" class="text-right" >
                                            <h5>Total Harga : <b  id="totalhargakeranjang"> Rp  <?= number_format($totalharga['totalharga'],0 ,',','.'); ?> </b> </h5> 


                                        


                                        </td>



                                        </tr>


                                </tbody>
                            </table>


                   

                            </div>


                            




                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= base_url('Feature/Deleteallkeranjang/') ?>" class="btn btn-sm btn-danger mx-1">
                              <i class="fas fa-inbox"></i> Hapus</a>

                           
                              <a href="<?= base_url('DashboardUser') ?>" class="btn btn-sm btn-success  mx-1">
                              <i class="fas fa-cart-arrow-down"></i> Tambah</a>
                           
                              <a href="<?= base_url('Feature/OrderUser') ?>" class="btn btn-sm btn-primary">
                              <i class="fas fa-hand-holding-heart"></i> Ajukan</a>
                            </div>

                        </div>








                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer'); ?>