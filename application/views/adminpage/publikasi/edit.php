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
                                    <a href="<?=admin_url('publikasi')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <?=form_open_multipart(admin_url('publikasi/edit/'.$data->id_publikasi), array('id' => 'form1'))?>
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul Publikasi (Indonesia)<i class="req">*</i></label>
                                        <textarea name="judul" class="form-control" placeholder="Tuliskan Judul Publikasi di sini." rows="100"><?=set_value('judul', $data->judul)?></textarea>
                                        <?=form_error('judul')?>
                                    </div>
                                    <button type="button" onclick="addPenulis()">Tambah Penulis</button>
                                    <div class="form-group form-group-lg">
                                        <?php $i = 1; foreach ($anggota as $anggota) { ?>
                                        <div class="input-penulis">
                                        <label class="control-label" for="penulis_<?=$i?>">Penulis <?=$i?><i class="req">*</i></label>
                                            <select name="dosen[]" class="form-control select2">
                                                <?php foreach ($dosen as $d)  {  ?>
                                                    <option value="<?=$d->nip?>"<?=set_select('dosen[]', $d->nip, $d->nip === $anggota->nip)?>><?=$d->nama_dosen?></option>
                                                <?php } ?>

                                            </select>
                                        <button id="delete-form">Delete</button>
                                        </div>
                                        <?php $i++; } ?>
                                        <div id="selectPenulis">
                                        <?=form_error('dosen[]')?>
                                        </div>
                                    </div>
                                    <button type="button" onclick="addLuar()">Tambah Penulis Luar</button>
                                    <div class="form-group form-group-lg">
                                        <?php $i = 1; foreach ($luar as $anggota) { ?>
                                        <div class="input-luar">
                                        <label class="control-label" for="penulis_<?=$i?>">Penulis <?=$i?><i class="req">*</i></label>
                                        <input type="text" name="luar[]" value="<?=set_value('luar[]', $anggota->nama_peneliti)?>" class="form-control" />
                                        <button id="delete-luar">Delete</button>
                                        </div>
                                        <?php $i++; } ?>
                                        <div id="selectLuar">
                                        <?=form_error('luar[]')?>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nama Jurnal/Prosiding<i class="req">*</i></label>
                                        <textarea name="jurnal" class="form-control" placeholder="Tuliskan Nama Jurnal di sini." rows="100"><?=set_value('jurnal', $data->jurnal)?></textarea>
                                        <?=form_error('jurnal')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">DOI</label>
                                        <input type="text" name="doi" class="form-control" value="<?=set_value('doi', $data->doi)?>" />
                                        <?=form_error('doi')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Scopus</label>
                                        <input type="text" name="scopus" class="form-control" value="<?=set_value('scopus', $data->scopus)?>" />
                                        <?=form_error('scopus')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Vol</label>
                                                <input type="text" name="vol" class="form-control" value="<?=set_value('vol', $data->vol)?>" />
                                                <?=form_error('vol')?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">No</label>
                                                <input type="text" name="no" class="form-control" value="<?=set_value('no', $data->no)?>" />
                                                <?=form_error('no')?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">PP</label>
                                                <input type="text" name="pp" class="form-control" value="<?=set_value('pp', $data->pp)?>" />
                                                <?=form_error('pp')?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Bulan</label>
                                                <input type="text" name="bulan" class="form-control" value="<?=set_value('bulan', $data->bulan)?>" />
                                                <?=form_error('bulan')?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Jenis<i class="req">*</i></label>
                                        <select name="jenis" class="form-control">
                                            <?php $status = array('prosiding', 'jurnal', 'lain-lain'); ?>
                                            <option value="<?=$status[0]?>"<?=set_select('jenis', $status[0], $status[0] === $data->jenis)?>>Prosiding</option>
                                            <option value="<?=$status[1]?>"<?=set_select('jenis', $status[1], $status[1] === $data->jenis)?>>Jurnal</option>
                                            <option value="<?=$status[2]?>"<?=set_select('jenis', $status[2], $status[2] === $data->jenis)?>>Lain-lain</option>
                                        </select>
                                        <?=form_error('jenis')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Level<i class="req">*</i></label>
                                        <select name="level" class="form-control">
                                            <?php $level = array('nasional', 'internasional'); ?>
                                            <option value="<?=$level[0]?>"<?=set_select('level', $level[0], $level[0] === $data->level)?>>Nasional</option>
                                            <option value="<?=$level[1]?>"<?=set_select('level', $level[1], $level[1] === $data->level)?>>Internasional</option>
                                        </select>
                                        <?=form_error('level')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" value="<?=set_value('tahun', $data->tahun)?>" />
                                                <?=form_error('tahun')?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Sitasi</label>
                                                <input type="text" name="sitasi" class="form-control" value="<?=set_value('sitasi', $data->sitasi)?>" />
                                                <?=form_error('sitasi')?>
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

<script>
    var bCounter = 1; // Start with the next select number
    var uCounter = 1;
    
    function addPenulis() {
        var container = $("#selectPenulis");

        $.ajax({
            url: "<?= admin_url(); ?>/dosen/get_dosen",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var so = `
                    <label class="control-label" for="penulis_${bCounter}">Penulis ${bCounter}<i class="req">*</i></label>
                    <select name="dosen[]" class="form-control select2">
                        <option value="">
                            Pilih Penulis ${bCounter}
                        </option>`;
                for (var i = 0; i < data.length; i++) {
                    so += `<option value="${data[i].nip}">${data[i].nama_dosen}</option>`;
                }

                so += `</select>`;

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

    $(document).on('click', '#delete-form', function() {
        console.log('halo');
        $(this).closest('.input-penulis').remove();

        console.log('hai');

        // Reinitialize Select2 after deleting the form
        $('#selectPenulis .input-penulis select').select2();

        return false;
    });

    $(document).on('click', '#delete-luar', function() {
        console.log('halo');
        $(this).closest('.input-luar').remove();

        return false;
    });

</script>
