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
                                    <a href="<?=admin_url('headline')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('headline/edit/'.$data->id_headline), array('id' => 'form1'))?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Judul Gambar <i class="req">*</i></label>
                                            <input type="text" name="judul" class="form-control" placeholder="Judul Headline" value="<?=set_value('judul', $data->judul)?>" required="true" />
                                            <?=form_error('judul')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Gambar</label>
                                            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Headline" value="<?=set_value('deskripsi', $data->deskripsi)?>" />
                                            <?=form_error('deskripsi')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar</label>
                                            <input type="file" class="form-control" id="image-upload" name="foto" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('headline/thumbs').(empty($data->gambar) ? 'no_image.png' : $data->gambar)?>" width="100%" alt="Upload Gambar" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Status Publikasi</label>
                                            <select name="status" class="form-control">
                                                <?php $status = array('Publish', 'Draft'); ?>
                                                <option value="<?=$status[0]?>"<?=set_select('status', $status[0], $status[0] === $data->status)?>>Publikasikan</option>
                                                <option value="<?=$status[1]?>"<?=set_select('status', $status[1], $status[1] === $data->status)?>>Simpan Sebagai Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('adminpage/_layout/cropper2'); ?>