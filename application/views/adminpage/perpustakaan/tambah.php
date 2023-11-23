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
                                    <a href="<?=admin_url('Perpustakaan')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a id="submit" class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('perpustakaan/tambah'), array('id' => 'form1'))?>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-lg">
                                        <label class="control-label">Nama File (Indonesia) <i class="req">*</i></label>
                                        <input type="text" name="nama_file_id" class="form-control" placeholder="Unggah File" value="<?=set_value('nama_file')?>" required />
                                        <?=form_error('nama_file')?>
                                        <div class="form-group form-group-lg">
                                        <label class="control-label">Nama File (Inggris) <i class="req">*</i></label>
                                        <input type="text" name="nama_file_en" class="form-control" placeholder="Unggah File" value="<?=set_value('nama_file_en')?>" required />
                                        <?=form_error('nama_file_en')?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Upload File</label>
                                        <input type="file" class="form-control" id="image-upload" name="foto" accept="document/*" />
                                        <?=(isset($error_upload) ? $error_upload : '')?>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Jenis</label>
                                            <select name="jenis" class="form-control">
                                                <?php $status = array('buku', 'jurnal', 'skripsi', 'lain-lain'); ?>
                                                <option value="<?=$status[0]?>"<?=set_select('jenis', $status[0])?>>Buku</option>
                                                <option value="<?=$status[1]?>"<?=set_select('jenis', $status[1])?>>Jurnal & Prosiding</option>
                                                <option value="<?=$status[2]?>"<?=set_select('jenis', $status[2])?>>Skripsi</option>
                                                <option value="<?=$status[3]?>"<?=set_select('jenis', $status[3])?>>Lain-lain</option>
                                            </select>
                                        </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
