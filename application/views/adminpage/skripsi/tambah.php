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
                                <?=form_open_multipart(admin_url('skripsi/tambah/'), array('id' => 'form1'))?>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul Skripsi (Indonesia)<i class="req">*</i></label>
                                        <input type="text" name="nama_file_id" class="form-control" value="<?=set_value('nama_file_id')?>" />
                                        <?=form_error('nama_file_id')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul Skripsi (Inggris)</label>
                                        <input type="text" name="nama_file_en" class="form-control" value="<?=set_value('nama_file_en')?>" />
                                        <?=form_error('nama_file_en')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Mahasiswa <i class="req">*</i></label>
                                        <select name="mahasiswa" class="form-control">
                                            <option value="">
                                                Pilih Mahasiswa
                                            </option>
                                            <?php foreach ($mahasiswa as $mhs) { ?>
                                            <option value="<?=$mhs->stambuk.' - '.$mhs->nama_mahasiswa?>" <?=set_select('mahasiswa', $mhs->stambuk.' - '.$mhs->nama_mahasiswa, False) ?> ><?=$mhs->stambuk.' - '.$mhs->nama_mahasiswa ?> </option> 
                                            <?php } ?>
                                        </select>
                                        <?=form_error('mahasiswa')?>
                                    </div>
                                    <button type="button" onclick="addPembimbing()">Tambah Pembimbing</button>
                                    <div class="form-group form-group-lg" id="selectPembimbing">
                                        <?=form_error('pembimbing[]')?>
                                    </div>
                                    <button type="button" onclick="addPenguji()">Tambah Penguji</button>
                                    <div class="form-group form-group-lg" id="selectPenguji">
                                        <?=form_error('penguji[]')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Proposal</label>
                                                <input type="date" name="tanggal_proposal" class="form-control" value="<?=set_value('tanggal_proposal')?>" />
                                                <?=form_error('tanggal_proposal')?>
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
    
    function addPembimbing() {
        var container = $("#selectPembimbing");

        $.ajax({
            url: "<?= admin_url(); ?>/dosen/get_dosen",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var so = `
                    <label class="control-label" for="pembimbing_${bCounter}">Pembimbing ${bCounter}<i class="req">*</i></label>
                    <select name="pembimbing[]" class="form-control select2">
                        <option value="">
                            Pilih Pembimbing ${bCounter}
                        </option>`;
                for (var i = 0; i < data.length; i++) {
                    so += `<option value="${data[i].nip}">${data[i].nama_dosen}</option>`;
                }

                so += `</select>`;

                // console.log(data);
                
                // Append the div to the container
                container.append(so);

                 $('#selectPembimbing select:last-child').select2({
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

    function addPenguji() {
        var container = $("#selectPenguji");

        $.ajax({
            url: "<?= admin_url(); ?>/dosen/get_dosen",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var so = `
                    <label class="control-label" for="penguji_${uCounter}">Penguji ${uCounter}<i class="req">*</i></label>
                    <select name="penguji[]" class="form-control select2">
                        <option value="">
                            Pilih Penguji ${uCounter}
                        </option>`;
                for (var i = 0; i < data.length; i++) {
                    so += `<option value="${data[i].nip}">${data[i].nama_dosen}</option>`;
                }

                so += `</select>`;

                // console.log(data);
                
                // Append the div to the container
                container.append(so);

                 $('#selectPenguji select:last-child').select2({
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
                
                uCounter++; // Increment the select counter

            }
        });
    }

</script>
