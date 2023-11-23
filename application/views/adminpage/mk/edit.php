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
                                    <a href="<?=admin_url('mata_kuliah')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <?=form_open_multipart(admin_url('mata_kuliah/edit/'.$data->id_mata_kuliah), array('id' => 'form1'))?>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nama Mata Kuliah<i class="req">*</i></label>
                                        <input type="text" name="nama" class="form-control"  value="<?=set_value('nama', $data->nama_mata_kuliah)?>" />
                                        <?=form_error('nama')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Kode Mata Kuliah<i class="req">*</i></label>
                                        <input type="text" name="kode" class="form-control"  value="<?=set_value('kode', $data->kode_mata_kuliah)?>" />
                                        <?=form_error('kode')?>
                                    </div>
                                    <button type="button" onclick="addPenulis()">Tambah Dosen</button>
                                    <div class="form-group form-group-lg">
                                        <?php $i = 1; foreach ($anggota as $anggota) { ?>
                                        <div id="input-penulis">
                                        <label class="control-label" for="penulis_<?=$i?>">Dosen <?=$i?><i class="req">*</i></label>
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
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Semester<i class="req">*</i></label>
                                                <input type="text" name="semester" class="form-control" value="<?=set_value('semester', $data->semester)?>" />
                                                <?=form_error('semester')?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">SKS<i class="req">*</i></label>
                                                <input type="text" name="sks" class="form-control" value="<?=set_value('sks', $data->sks)?>" />
                                                <?=form_error('sks')?>
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Jenis<i class="req">*</i></label>
                                                <select name="jenis" class="form-control">
                                                    <?php $status = array('wajib', 'laboratorium', 'pilihan'); ?>
                                                    <option value="<?=$status[0]?>"<?=set_select('jenis', $status[0], $status[0] === $data->jenis)?>>Wajib</option>
                                                    <option value="<?=$status[1]?>"<?=set_select('jenis', $status[1], $status[1] === $data->jenis)?>>Wajib Laboratorium</option>
                                                    <option value="<?=$status[2]?>"<?=set_select('jenis', $status[2], $status[2] === $data->jenis)?>>Pilihan Laboratorium</option>
                                                </select>
                                                <?=form_error('jenis')?>
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
                    <div class="input-penulis">
                    <label class="control-label" for="penulis_${bCounter}">Dosen ${bCounter}<i class="req">*</i></label>
                    <select name="dosen[]" class="form-control select2">
                        <option value="">
                            Pilih Penulis ${bCounter}
                        </option>`;
                for (var i = 0; i < data.length; i++) {
                    so += `<option value="${data[i].nip}">${data[i].nama_dosen}</option>`;
                }

                so += `</select>
                    <button id="delete-form">Delete</button>
                    </div>`;

                // console.log(data);
                
                // Append the div to the container
                container.append(so);

                  $('#selectPenulis .input-penulis:last-child select').select2({
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

    $(document).on('click', '#delete-form', function() {
        $(this).closest('.input-penulis').remove();

        // Reinitialize Select2 after deleting the form
        $('#selectPenulis .input-penulis select').select2();

        bCounter--;

        return false;
    });



</script>