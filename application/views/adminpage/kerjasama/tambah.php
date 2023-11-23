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
                                    <a href="<?=admin_url('kerjasama')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('kerjasama/tambah'), array('id' => 'form1'))?>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Mitra<i class="req">*</i></label>
                                        <input type="text" name="mitra" class="form-control" placeholder="Mitra"  value="<?=set_value('mitra')?>" required />
                                        <?=form_error('mitra')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Kerjasama<i class="req">*</i></label>
                                        <input type="text" name="kerjasama" class="form-control" placeholder="Kerjasama"  value="<?=set_value('kerjasama')?>" required />
                                        <?=form_error('kerjasama')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Tingkat</label>
                                        <select name="tingkat" class="form-control">
                                            <?php $status = array('lokal', 'nasional', 'internasional'); ?>
                                            <option value="<?=$status[0]?>"<?=set_select('tingkat', $status[0])?>>Lokal</option>
                                            <option value="<?=$status[1]?>"<?=set_select('tingkat', $status[1])?>>Nasional</option>
                                            <option value="<?=$status[2]?>"<?=set_select('tingkat', $status[2])?>>Internasional</option>
                                        </select>
                                        <?=form_error('tingkat')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">PIC <i class="req">*</i></label>
                                        <select name="nip" class="form-control">
                                            <option value="">
                                                Pilih Ketua
                                            </option>
                                            <?php foreach ($dosen as $d) { ?>
                                                <option value="<?php echo $d->nip ; ?>" <?php echo set_select('nip', $d->nama_dosen, False); ?> ><?php echo $d->nama_dosen ; ?> </option> 
                                            <?php } ?>
                                        </select>
                                        <?=form_error('nip')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-4">
                                            <label class="control-label">Tanggal Mulai</label>
                                            <input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai" value="<?=set_value('tanggal_mulai')?>">
                                            <?=form_error('tanggal_mulai')?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">Tanggal Akhir</label>
                                            <input type="date" name="tanggal_akhir" class="form-control" placeholder="Tanggal Akhir" value="<?=set_value('tanggal_akhir')?>">
                                            <?=form_error('tanggal_akhir')?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Upload File<i class="req">*</i></label>
                                                <input type="file" class="custom-file-input" id="file" name="file" value="<?= set_value('file') ?>" accept="application/pdf">
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
        <!-- <script>CKEDITOR.replace("textarea");</script> -->
