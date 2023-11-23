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
                                    <a href="<?=admin_url('penelitian')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <?=form_open_multipart(admin_url('penelitian/tambah/'), array('id' => 'form1'))?>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul<i class="req">*</i></label>
                                        <input type="text" name="judul" class="form-control" value="<?=set_value('judul')?>" />
                                        <?=form_error('judul')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Ketua Penelitian <i class="req">*</i></label>
                                        <select name="dosen[]" class="form-control">
                                            <option value="">
                                                Pilih Ketua
                                            </option>
                                            <?php foreach ($dosen as $ketua) { ?>
                                                <option value="<?php echo $ketua->nip ; ?>" <?php echo set_select('dosen', $ketua->nama_dosen, False); ?> ><?php echo $ketua->nama_dosen ; ?> </option> 
                                            <?php } ?>
                                        </select>
                                        <?=form_error('dosen[]')?>
                                    </div>
                                    <button type="button" onclick="addPenulis()">Tambah Penulis</button>
                                    <div class="form-group form-group-lg" id="selectPenulis">
                                        <?=form_error('dosen[]')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Jenis<i class="req">*</i></label>
                                                <select name="jenis" class="form-control">
                                                    <?php $status = array('penelitian', 'pengabdian'); ?>
                                                    <option value="<?=$status[0]?>"<?=set_select('jenis', $status[0])?>>Penelitian</option>
                                                    <option value="<?=$status[1]?>"<?=set_select('jenis', $status[1])?>>Pengabdian</option>
                                                </select>
                                                <?=form_error('jenis')?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Dana Penelitian (Juta)<i class="req">*</i></label>
                                                <input type="text" name="dana" class="form-control" value="<?=set_value('dana')?>" />
                                                <?=form_error('dana')?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Sumber Dana Penelitian<i class="req">*</i></label>
                                                <input type="text" name="sumber_dana" class="form-control" value="<?=set_value('sumber_dana')?>" />
                                                <?=form_error('sumber_dana')?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tahun Penelitian<i class="req">*</i></label>
                                                <input type="text" name="tahun" class="form-control" value="<?=set_value('tahun')?>" />
                                                <?=form_error('tahun')?>
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
                    <label class="control-label" for="penulis_${bCounter}">Penulis ${bCounter}<i class="req">*</i></label>
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