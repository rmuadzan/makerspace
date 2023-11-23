        <h1 class="page-header"><?=$title?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse" data-sortable-id="index-1">
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
                                    <a href="<?=admin_url('dosen')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('dosen/tambah'), array('id' => 'form1'))?>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">NIP <i class="req">*</i></label>
                                        <input type="text" name="nip" class="form-control" placeholder="NIP" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="18" value="<?=set_value('nip')?>" required />
                                        <?=form_error('nip')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">NIDN</label>
                                        <input type="text" name="nidn" class="form-control" placeholder="NIDN" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="18" value="<?=set_value('nidn')?>"/>
                                        <?=form_error('nidn')?>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Gelar Depan</label>
                                            <input type="text" name="gelar_depan" class="form-control" placeholder="Gelar Depan" value="<?=set_value('gelar_depan')?>" required />
                                            <?=form_error('gelar_depan')?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Nama Dosen<i class="req">*</i></label>
                                            <input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen" value="<?=set_value('nama_dosen')?>" required />
                                            <?=form_error('nama_dosen')?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Gelar Belakang<i class="req">*</i></label>
                                            <input type="text" name="gelar_belakang" class="form-control" placeholder="Gelar Belakang" value="<?=set_value('gelar_belakang')?>" required />
                                            <?=form_error('gelar_belakang')?>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Jabatan Dosen<i class="req">*</i></label>
                                        <input type="text" name="jabatan_dosen" class="form-control" placeholder="Jabatan Dosen" value="<?=set_value('jabatan_dosen')?>" required />
                                        <?=form_error('jabatan_dosen')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Email Dosen<i class="req">*</i></label>
                                        <input type="email" name="email_dosen" class="form-control" placeholder="Email Dosen" value="<?=set_value('email_dosen')?>" required />
                                        <?=form_error('email_dosen')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Bidang Penelitian<i class="req">*</i></label>
                                        <input type="text" name="bidang_penelitian" class="form-control" placeholder="Bidang Penelitian" value="<?=set_value('bidang_penelitian')?>" required />
                                        <?=form_error('bidang_penelitian')?>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Upload Gambar Dosen</label>
                                            <input type="file" class="form-control" name="gambar" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('dosen/thumbs')?>no_image.png" width="100%" alt="Upload Gambar" />
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script>CKEDITOR.replace("textarea");</script> -->
