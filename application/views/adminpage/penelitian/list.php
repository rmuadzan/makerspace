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
                                    <a class="btn btn-primary insert" href="<?=admin_url('penelitian/tambah')?>"><i class="fa fa-plus"></i> Tambah</a>
                                    <div class="pull-right">
                                        <form method="GET" class="form-inline">
                                            <div class="input-group">
                                                <input class="form-control" name="q" value="<?=($this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : '')?>" placeholder="Cari (tahun, judul, sumber dana)" />
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Judul<span></span></th>
                                            <th class="text-center">Ketua<span></span></th>
                                            <th class="text-center">Tahun<span></span></th>
                                            <th class="text-center">Sumber Dana<span></span></th>
                                            <th class="text-center">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($buku as $data): 
                                        $dosen = $this->crud->gd('dosen_penelitian', ['jabatan' => 'ketua', 'id_penelitian' => $data->id_penelitian]);
                                        $ketua = ($dosen)? $this->crud_mahasiswa->gd('data_dosen', ['nip' => $dosen->nip]) : NULL; ?>
                                        <tr>
                                            <td class="text-center"><?=$i?></td>
                                            <td><?=$data->judul?></td>
                                            <td><?=($ketua)? $ketua->nama_dosen : '-' ?></td>
                                            <td><?=$data->tahun?></td>
                                            <td><?=$data->sumber_dana?></td>
                                            <?php if ($this->session->akses_level != 'Blocked') { ?>
                                            <td class="text-center">
                                                <a href="<?=admin_url('penelitian/edit/'.$data->id_penelitian)?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="javascript:;" onclick="hapus_data('penelitian', '<?=$data->id_penelitian?>')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </td>
                                            <?php } else { ?>
                                            <td class="text-center"><i style="color: red;">N/A</i></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                        <tr class="footer">
                                            <td colspan="6"><?=(isset($pagination) ? $pagination : '')?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
