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
                                    <a href="<?=admin_url('skripsi')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <?=form_open_multipart(admin_url('skripsi/edit/'.$data->id_perpustakaan), array('id' => 'form1'))?>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul Skripsi (Indonesia)<i class="req">*</i></label>
                                        <input type="target" name="nama_file_id" class="form-control" value="<?=set_value('nama_file_id', $data->nama_file_id)?>" />
                                        <?=form_error('nama_file_id')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul Skripsi (Inggris)</label>
                                        <input type="target" name="nama_file_en" class="form-control" value="<?=set_value('nama_file_en', $data->nama_file_en)?>" />
                                        <?=form_error('nama_file_en')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Mahasiswa <i class="req">*</i></label>
                                        <select name="mahasiswa" class="form-control">
                                            <option value="<?=set_value('mahasiswa', $data->nim. ' - '.$data->nama_mahasiswa)?>" >
                                                <?=$data->nim. ' - '.$data->nama_mahasiswa?>
                                            </option>
                                            <?php foreach ($mahasiswa as $mhs) { ?>
                                            <option value="<?=$mhs->stambuk.' - '.$mhs->nama_mahasiswa?>" <?=set_select('mahasiswa', $mhs->stambuk.' - '.$mhs->nama_mahasiswa, False) ?> ><?=$mhs->stambuk.' - '.$mhs->nama_mahasiswa ?> </option> 
                                            <?php } ?>
                                        </select>
                                        <?=form_error('mahasiswa')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Pembimbing 1 <i class="req">*</i></label>
                                        <select name="pembimbing_1" class="form-control">
                                            <option value="<?=set_value('pembimbing_1', $data->pembimbing_1)?>" >
                                                <?=$data->pembimbing_1 ?>
                                            </option>
                                            <?php foreach ($dosen as $p1) { ?>
                                            <option value="<?=($p1->gelar_depan != '' ? $p1->gelar_depan : '').$p1->nama_dosen.($p1->gelar_belakang != '' ? ', '.$p1->gelar_belakang : '') ?>" <?=set_select('pembimbing_1', ($p1->gelar_depan != '' ? $p1->gelar_depan : '').$p1->nama_dosen.($p1->gelar_belakang != '' ? ', '.$p1->gelar_belakang : ''), False); ?> ><?=($p1->gelar_depan != '' ? $p1->gelar_depan : '').$p1->nama_dosen.($p1->gelar_belakang != '' ? ', '.$p1->gelar_belakang : '') ?> </option> 
                                            <?php } ?>
                                        </select>
                                        <?=form_error('pembimbing_1')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Pembimbing 2 <i class="req">*</i></label>
                                        <select name="pembimbing_2" class="form-control">
                                            <option value="<?=set_value('pembimbing_2', $data->pembimbing_2)?>" >
                                                <?=$data->pembimbing_2 ?>
                                            </option>
                                            <?php foreach ($dosen as $p2) { ?>
                                            <option value="<?=($p2->gelar_depan != '' ? $p2->gelar_depan : '').$p2->nama_dosen.($p2->gelar_belakang != '' ? ', '.$p2->gelar_belakang : '') ?>" <?=set_select('pembimbing_2', ($p2->gelar_depan != '' ? $p2->gelar_depan : '').$p2->nama_dosen.($p2->gelar_belakang != '' ? ', '.$p2->gelar_belakang : ''), False); ?> ><?=($p2->gelar_depan != '' ? $p2->gelar_depan : '').$p2->nama_dosen.($p2->gelar_belakang != '' ? ', '.$p2->gelar_belakang : '') ?> </option> 
                                            <?php } ?>
                                        </select>
                                        <?=form_error('pembimbing_2')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Ujian</label>
                                                <input type="date" name="tanggal" class="form-control" value="<?=set_value('tanggal', $data->tanggal)?>" />
                                                <?=form_error('tanggal')?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Upload File</label>
                                                <input type="file" class="custom-file-input" id="file" name="file" value="<?= set_value('file') ?>" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>