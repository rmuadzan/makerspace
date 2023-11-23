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
                                    <a class="btn btn-primary insert" href="<?=admin_url('kerjasama/tambah')?>"><i class="fa fa-plus"></i> Tambah</a>
                                    <div class="pull-right">
                                        <form method="GET" class="form-inline">
                                            <div class="input-group">
                                                <!--<input class="form-control" name="q" value="<?=($this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : '')?>" placeholder="Cari Halaman..." />
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
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Mitra <span></span></th>
                                            <th class="text-center">Tingkat Kerjasama <span></span></th>
                                            <th class="text-center">Tanggal Mulai <span></span></th>
                                            <th class="text-center">Masa Berlaku <span></span></th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($data as $data): ?>
                                        <tr>
                                            <td class="text-center"><?=$i?></td>
                                            <td><?=$data->mitra?></td>
                                            <td><?=$data->tingkat?></td>
                                            <td><?=$data->tanggal_mulai?></td>
                                            <td class="text-center">
                                                
                                                <?php  
                                                    $date1 = date_create($data->tanggal_mulai);
                                                    $date2 = date_create($data->tanggal_akhir);

                                                    $date = date_diff($date1, $date2); 
                                                ?>
                                                <?=$date->y." Tahun "?>
                                                    
                                            </td>
                                            <?php if ($this->session->akses_level != 'Blocked') { ?>
                                            <td class="text-center">
                                                <a href="<?=admin_url('kerjasama/edit/'.$data->id_kerjasama)?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                                <a href="javascript:;" onclick="hapus_data('kerjasama', '<?=$data->id_kerjasama?>')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                                
                                            </td>
                                            <?php } else { ?>
                                            <td class="text-center"><i style="color: red;">N/A</i></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
