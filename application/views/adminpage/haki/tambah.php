    <h1 class="page-header"><?=$title?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title"><?=$title?></h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="row-fluid">
                                <div class="col-sm-12 text-right">
                                    <a href="<?=admin_url('haki')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <?=form_open_multipart(admin_url('haki/tambah/'), array('id' => 'form1'))?>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nama Barang<i class="req">*</i></label>
                                        <input type="text" name="nama" class="form-control" value="<?=set_value('nama')?>" />
                                        <?=form_error('nama')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Jenis<i class="req">*</i></label>
                                        <input type="text" name="jenis" class="form-control" value="<?=set_value('jenis')?>" />
                                        <?=form_error('jenis')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Status<i class="req">*</i></label>
                                        <input type="text" name="status_barang" class="form-control" value="<?=set_value('status_barang')?>" />
                                        <?=form_error('status_barang')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Uraian<i class="req">*</i></label>
                                        <textarea name="uraian" class="form-control ckeditor" placeholder="Tuliskan Uraian di sini." rows="100"><?=set_value('uraian')?></textarea>
                                        <?=form_error('uraian')?>
                                    </div>
                                    <button type="button" onclick="addPenulis()">Tambah Pemilik</button>
                                    <div class="form-group form-group-lg" id="selectPenulis">
                                        <?=form_error('dosen[]')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Tanggal Permohonan<i class="req">*</i></label>
                                        <input type="date" name="tanggal_permohonan" class="form-control" value="<?=set_value('tanggal_permohonan')?>" />
                                        <?=form_error('tanggal_permohonan')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nomor Permohonan<i class="req">*</i></label>
                                        <input type="text" name="nomor_permohonan" class="form-control" value="<?=set_value('nomor_permohonan')?>" />
                                        <?=form_error('nomor_permohonan')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Web Link</label>
                                        <input type="text" name="web" class="form-control" value="<?=set_value('web')?>" />
                                        <?=form_error('web')?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Upload Gambar<i class="req">*</i></label>
                                        <input type="file" class="form-control" name="foto" onchange="readURL(this);" accept="image/*" />
                                        <input type="hidden" id="image-cropped" name="cfoto" />
                                        <?=(isset($error_upload) ? $error_upload : '')?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Tampilan Gambar</label>
                                        <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('haki/thumbs')?>no_image.png" width="100%" alt="Upload Gambar" />
                                    </div>
                                </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('adminpage/_layout/image_cropper'); ?>

<script>
    var bCounter = 1; // Start with the next select number
    var uCounter = 1;
    
    function addPenulis() {
        var container = $("#selectPenulis");
        // var

        $.ajax({
            url: "<?= admin_url(); ?>/dosen/get_dosen",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var so = `
                    <div class="col-lg-8">
                    <label class="control-label" for="penulis_${bCounter}">Penulis ${bCounter}<i class="req">*</i></label>
                    <select name="dosen[]" class="form-control select2">
                        <option value="">
                            Pilih Penulis ${bCounter}
                        </option>`;
                for (var i = 0; i < data.length; i++) {
                    so += `<option value="${data[i].nip}">${data[i].nama_dosen}</option>`;
                }

                so += `
                    </select>
                    </div>
                    <div class="col-lg-4">
                    <label class="control-label" for="status_${bCounter}">Status ${bCounter}<i class="req">*</i></label>
                    <select name="status[]" id="select${bCounter}">
                        <option value="Pemilik">Pemilik</option>
                        <option value="Pencipta">Pencipta</option>
                        <option value="Pemilik dan Pencipta">Pemilik & Pencipta</option>
                    </select>
                    </div>`;

                // console.log(data);
                
                // Append the div to the container
                container.append(so);

                 $('#selectPenulis select:last-child').select2({
                    createTag: function(params) {
                        if (params.term.indexOf('@') === -1) {
                            return null;
                        }
                        return {
                            id: params.term,
                            text: params.term
                        };
                    },
                    insertTag: function(data, tag) {
                        data.push(tag);
                    },
                    placeholder: "Pilih"
                });
                
                bCounter++; // Increment the select counter

            }
        });
    }

    function addLuar() {
        var container = $("#selectLuar");

        var so = `
            <label class="control-label" for="luar_${uCounter}">Penulis Luar ${uCounter}<i class="req">*</i></label>
            <input type="text" name="luar[]" class="form-control" />`;

        // console.log(data);
        
        // Append the div to the container
        container.append(so);
        
        uCounter++; // Increment the select counter

    }

</script>
