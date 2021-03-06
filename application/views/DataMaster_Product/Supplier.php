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
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_error('supplier_name', '<div class="alert alert-danger alert-dismissible text-sm"><button type="button" class="close text-sm-left" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>'); ?>
                    <?= form_error('is_active', '<div class="alert alert-danger alert-dismissible text-sm"><button type="button" class="close text-sm-left" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>'); ?>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-file-alt mr-1"></i>
                                List Data
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-data">
                                            <i class="fas fa-plus-circle"></i>
                                            Add Data
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body table-responsive pad">
                            <table id="tbsupplier" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Kontak Supplier</th>
                                        <th>Nama Kontak</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dtsupplier as $org) : ?>
                                        <tr>
                                            <td width="30px"><?= $i++; ?></td>
                                            <td><?= $org['supplier_name']; ?></td>
                                            <td><?= $org['kontak_supplier']; ?></td>
                                            <td><?= $org['nama_kontak_supplier']; ?></td>
                                            <td width="80px" class="text-center">
                                                <?php if ($org['is_active'] == '1') : ?>
                                                    Yes
                                                <?php else : ?>
                                                    No
                                                <?php endif; ?>
                                            </td>
                                            <td width="80px" class="text-center">
                                                <div class="btn-group-vertical">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='<?= base_url('DataMaster_Product/UpdateSupplier/' . Encrypt_url($org['id'])); ?>'">Update</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confDelete('<?= base_url('DataMaster_Product/DeleteSupplier/' . Encrypt_url($org['id'])); ?>')">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- MODAL ADD DATA -->
<div class="modal fade" id="modal-add-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('DataMaster_Product/AddSupplier'); ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="supplier_name" class="col-sm-3 col-form-label">Supplier Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="supplier_name" name="supplier_name" placeholder="Enter Supplier Name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                        <textarea class=" col-sm-12 form-control " style="overflow:auto;resize:none" id="alamat"  name="alamat" normalizer_normalize="alamat" rows="3"   value="<?= set_value('alamat'); ?>"></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="nama_kontak_supplier" class="col-sm-3 col-form-label">Nama Kontak</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="nama_kontak_supplier" name="nama_kontak_supplier" placeholder="Enter Nama Kontak" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="kontak_supplier" class="col-sm-3 col-form-label">Kontak</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" id="kontak_supplier" name="kontak_supplier" placeholder="Enter Kontak Supplier"  onkeypress="return hanyaAngka(event)" required>
                        </div>
                    </div>                  


                    <div class="form-group row">
                        <label for="bank_supplier" class="col-sm-3 col-form-label">Bank Supplier</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="bank_supplier" name="bank_supplier" placeholder="Enter Bank" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="norek_supplier" class="col-sm-3 col-form-label">No Rekening Supplier</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" id="norek_supplier" name="norek_supplier" placeholder="Enter No Rekening"  onkeypress="return hanyaAngka(event)" required>
                        </div>
                    </div>



                    <div class="form-group row">
                    <label for="is_active1" class="col-sm-3 col-form-label">Is Active ?</label>

                    <div class="col-sm-4">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="is_active1" name="is_active" value="1">
                            <label for="is_active1" class="custom-control-label">Yes</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="is_active2" name="is_active" value="0">
                            <label for="is_active2" class="custom-control-label">No</label>
                        </div>

                        </div>

                    </div>






                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Notes: includes file views templates/footer.php -->
<?php $this->load->view('templates/footer'); ?>