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
                                    <a href="<?=admin_url('blogs')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a id="submit" class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('laboratorium/tambah_alat/'.$id), array('id' => 'form1'))?>
                                    <div class="col-md-9">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Nama Alat</label>
                                            <input type="text" name="nama_alat" id="nama_alat" class="form-control" placeholder="Nama Alat" value="<?=set_value('nama_alat')?>"/>
                                            <?=form_error('nama_alat')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Spesifikasi</label>
                                            <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" placeholder="Spesifikasi Alat" value="<?=set_value('spesifikasi')?>"/>
                                            <?=form_error('spesifikasi')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Keterangan</label>
                                            <textarea name="keterangan" class="form-control ckeditor" placeholder="Tuliskan keterangan di sini." rows="100"><?=set_value('keterangan')?></textarea>
                                            <?=form_error('keterangan')?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" value="<?=set_value('jumlah')?>"/>
                                            <?=form_error('jumlah')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Satuan</label>
                                            <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan" value="<?=set_value('satuan')?>"/>
                                            <?=form_error('satuan')?>
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
