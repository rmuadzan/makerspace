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
                                <div class="col-sm-12">
                                    <a class="btn btn-primary insert" href="<?=admin_url('haki/tambah')?>"><i class="fa fa-plus"></i> Tambah</a>
                                    <div class="pull-right">
                                        <form method="GET" class="form-inline">
                                            <div class="input-group">
                                                <!--<input class="form-control" name="q" value="<?=($this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : '')?>" placeholder="Cari File..." />
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="haki-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nama Produk <span></span></th>
                                            <th class="text-center">Jenis <span></span></th>
                                            <th class="text-center">Nomor Permohonan <span></span></th>
                                            <th class="text-center">Nomor Pencatatan <span></span></th>
                                            <th class="text-center">Tanggal Mulai <span></span></th>
                                            <th class="text-center">Tanggal Berakhir <span></span></th>
                                            <th class="text-center">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($haki as $data): ?>
                                        <tr>
                                            <td class="text-center"><?=$i?></td>
                                            <td><?=$data->nama?></td>
                                            <td><?=$data->jenis?></td>
                                            <td class="text-center"><?=$data->nomor_permohonan?></td>
                                            <td class="text-center">
                                                <?php if ($data->nomor_pencatatan == NULL){ ?>
                                                    <a href="javascript:void(0);" class="btn btn-info catat" data-id="<?=$data->id_haki?>" data-nama="<?=$data->nama?>" data-jenis="<?=$data->jenis?>" data-tanggal="<?=tgl_indo($data->tanggal_permohonan)?>">Nomor Pencatatan</a>
                                                <?php } else{ ?>
                                                    <?=tgl_indo($data->nomor_pencatatan)?>
                                                <?php }?>
                                                    
                                            </td>
                                            <td class="text-center"><?=$data->tanggal_permohonan?></td>
                                            <td class="text-center"><?=$data->tanggal_akhir?></td>
                                            <!-- <?php if ($this->session->akses_level != 'Blocked') { ?>
                                            <td class="text-center">
                                                <a href="<?=admin_url('skripsi/edit/'.$data->id_perpustakaan)?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="javascript:;" onclick="hapus_data('skripsi', '<?=$data->id_perpustakaan?>')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </td>
                                            <?php } else { ?>
                                            <td class="text-center"><i style="color: red;">N/A</i></td>
                                            <?php } ?> -->
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                        <tr class="footer">
                                            <td colspan="7"><?=(isset($pagination) ? $pagination : '')?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-catat" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Update Tanggal Pencatatan</h4>
                          </div>
                          <div class="modal-body">
                            <?=form_open_multipart(admin_url('haki/catat/'), array('id' => 'form1'))?>
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Nama Produk</label>
                                  <input type="text" class="form-control nama" disabled>
                                </div>
                                <div class="form-group">
                                  <label>Jenis</label>
                                  <input type="text" class="form-control jenis" disabled>
                                </div>
                                <div class="form-group">
                                  <label>Tanggal Permohonan</label>
                                  <input type="text" class="form-control tanggal" disabled>
                                </div>
                                <div class="form-group">
                                  <label>Tanggal Pencatatan</label>
                                  <input type="date" class="form-control" name="tanggal_pencatatan" required>
                                </div>
                                <div class="form-group">
                                  <label>Nomor Pencatatan</label>
                                  <input type="text" class="form-control" name="nomor_pencatatan" required>
                                </div>
                                <div class="form-group">
                                  <label>Tanggal Akhir</label>
                                  <input type="date" class="form-control" name="tanggal_akhir" required>
                                </div>
                                <div class="form-group">
                                  <label>Status</label>
                                  <input type="text" class="form-control" name="status" required>
                                </div>
                              </div>
                              <!-- /.card-body -->

                              <div class="card-footer">
                                <input type="hidden" name="id_haki" class="id">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            <?=form_close()?>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">
     $(document).ready(function(){
    // var terima = document.getElementById("qty-terima").textContent;
    // console.log(jml_kembali)

    // console.log(terima)

    $('#haki-table').on('click','.catat',function(){
      var nama = $(this).data('nama');
      var jenis = $(this).data('jenis');
      var tanggal = $(this).data('tanggal');
      var id = $(this).data('id');
      $('#modal-catat').modal('show');
      $('.nama').val(nama);
      $('.jenis').val(jenis);
      $('.tanggal').val(tanggal);
      $('.id').val(id);
    });

  });
</script>