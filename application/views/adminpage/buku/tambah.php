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
                                    <a href="<?=admin_url('buku')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <?=form_open_multipart(admin_url('buku/tambah/'), array('id' => 'form1'))?>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul<i class="req">*</i></label>
                                        <input type="text" name="judul" class="form-control" value="<?=set_value('judul')?>" />
                                        <?=form_error('judul')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Penulis<i class="req">*</i></label>
                                        <textarea name="penulis" class="form-control" placeholder="Tuliskan Penulis di sini." rows="100"><?=set_value('penulis')?></textarea>
                                        <?=form_error('penulis')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-lg-3">
                                            <label class="control-label">Jilid<i class="req">*</i></label>
                                            <input type="text" name="jilid" class="form-control" value="<?=set_value('jilid')?>" />
                                            <?=form_error('jilid')?>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="control-label">Edisi<i class="req">*</i></label>
                                            <input type="text" name="edisi" class="form-control" value="<?=set_value('edisi')?>" />
                                            <?=form_error('edisi')?>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="control-label">Tahun<i class="req">*</i></label>
                                            <input type="text" name="tahun" class="form-control" value="<?=set_value('tahun')?>" />
                                            <?=form_error('tahun')?>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="control-label">Jumlah<i class="req">*</i></label>
                                            <input type="text" name="jumlah" class="form-control" value="<?=set_value('jumlah')?>" />
                                            <?=form_error('jumlah')?>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-lg-6">
                                            <label class="control-label">ISBN<i class="req">*</i></label>
                                            <input type="text" name="isbn" class="form-control" value="<?=set_value('isbn')?>" />
                                            <?=form_error('isbn')?>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="control-label">Sumber<i class="req">*</i></label>
                                            <input type="text" name="sumber" class="form-control" value="<?=set_value('sumber')?>" />
                                            <?=form_error('sumber')?>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="control-label">Jenis<i class="req">*</i></label>
                                                <select name="jenis" class="form-control">
                                                    <?php $jenis = array('buku', 'jurnal', 'publikasi'); ?>
                                                    <option value="<?=$jenis[0]?>"<?=set_select('jenis', $jenis[0])?>>Buku</option>
                                                    <option value="<?=$jenis[1]?>"<?=set_select('jenis', $jenis[1])?>>Jurnal & Prosiding</option>
                                                    <option value="<?=$jenis[2]?>"<?=set_select('jenis', $jenis[2])?>>Publikasi</option>
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