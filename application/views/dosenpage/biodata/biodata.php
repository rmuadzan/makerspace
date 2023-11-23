				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
							<div class="d-flex align-items-center">
								<div class="mr-auto">
									<h3 class="m-subheader__title m-subheader__title--separator">
										Biodata
									</h3>
									<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
										<li class="m-nav__item m-nav__item--home">
											<a href="#" class="m-nav__link m-nav__link--icon">
												<i class="m-nav__link-icon la la-home"></i>
											</a>
										</li>
										<li class="m-nav__separator">
											-
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
												<span class="m-nav__link-text">
													<?=$title?>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-lg-12">
								<!--begin::Biodata Diri-->
								<div class="m-portlet">
									<!--begin::Form-->
									<?=form_open_multipart(dosen_url('biodata/edit/'.$data->nip), array('id' => 'form1'))?>
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-9">
													<label class="col-form-label">
														Nama Lengkap Tanpa Gelar :
													</label>
													<input type="text" name="nama" class="form-control m-input" placeholder="Masukkan nama lengkap tanpa gelar" value="<?=set_value('nama', $data->nama_dosen)?>" required>
													<?=form_error('nama')?>
												</div>
												<div class="col-lg-9">
													<label class="col-form-label">
														Jenis Kelamin :
													</label>
													<select name="jenis_kelamin" class="form-control m-bootstrap-select m_selectpicker">
														<option value="">
															Pilih dosen
														</option>
														<?php $status = array('l', 'p'); ?>
			                                                <option value="<?=$status[0]?>"<?=set_select('jenis_kelamin', $status[0], $status[0] === $data->jenis_kelamin)?>>Laki-laki</option>
			                                                <option value="<?=$status[1]?>"<?=set_select('jenis_kelamin', $status[1], $status[1] === $data->jenis_kelamin)?>>Perempuan</option>
			                                        </select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="col-form-label">
														Tempat Lahir :
													</label>
													<input type="text" name="tempat_lahir" class="form-control m-input" placeholder="Masukkan tempat lahir" value="<?=set_value('tempat_lahir', $data->tempat_lahir)?>">
													<?=form_error('tempat_lahir')?>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">
														Tanggal Lahir :
													</label>
													<input type="date" name="tanggal_lahir" class="form-control m-input" placeholder="Masukkan tanggal lahir" value="<?=set_value('tanggal_lahir', $data->tanggal_lahir)?>">
													<?=form_error('tanggal_lahir')?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="col-form-label">
														Gelar Depan :
													</label>
													<input type="text" name="gelar_depan" class="form-control m-input" placeholder="Masukkan gelar depan" value="<?=set_value('gelar_depan', $data->gelar_depan)?>">
													<?=form_error('gelar_depan')?>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">
														Gelar Belakang :
													</label>
													<input type="text" name="gelar_belakang" class="form-control m-input" placeholder="Masukkan gelar belakang" value="<?=set_value('gelar_belakang', $data->gelar_belakang)?>">
													<?=form_error('gelar_belakang')?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="col-form-label">
														Telepon :
													</label>
													<input type="text" name="telepon" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="telepon" maxlength="20" placeholder="Masukkan Telepon" value="<?=set_value('telepon', $data->telepon)?>">
													<?=form_error('telepon')?>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">
														FAX :
													</label>
													<input type="text" name="fax" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="nip" maxlength="18" placeholder="Masukkan Fax" value="<?=set_value('fax', $data->fax)?>">
													<?=form_error('fax')?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-12">
													<label class="col-form-label">
														Alamat :
													</label>
													<textarea class="summernote" name="alamat" id=""><?=set_value('alamat', $data->alamat)?></textarea>
														<?=form_error('alamat')?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="col-form-label">
														NIDN :
													</label>
													<input type="text" name="nidn" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="nidn" maxlength="10" placeholder="Masukkan NIDN" value="<?=set_value('nidn', $data->nidn)?>">
													<?=form_error('nidn')?>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">
														NIP :
													</label>
													<input type="text" name="nip" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="nip" maxlength="18" placeholder="Masukkan NIP" value="<?=set_value('nip', $data->nip)?>">
													<?=form_error('nip')?>
												</div>
											</div><div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="col-form-label">
														ID Sinta :
													</label>
													<input type="text" name="sinta_id" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="sinta_id" maxlength="10" placeholder="Masukkan Sinta" value="<?=set_value('sinta_id', $data->sinta_id)?>">
													<?=form_error('sinta_id')?>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">
														ID Google Scholar :
													</label>
													<input type="text" name="scholar_id" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="scholar_id" maxlength="18" placeholder="Masukkan NIP" value="<?=set_value('scholar_id', $data->scholar_id)?>">
													<?=form_error('scholar_id')?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="col-form-label">
														Jabatan Akademik :
													</label>
													<input type="text" name="jabatan" class="form-control m-input" placeholder="Masukkan Jabatan" value="<?=set_value('jabatan', $data->jabatan_dosen)?>">
												</div>
												<?=form_error('jabatan')?>
												<div class="col-lg-6">
													<label class="col-form-label">
														Email :
													</label>
													<input type="email" name="email" class="form-control m-input" placeholder="Masukkan email" value="<?=set_value('email', $data->email_dosen)?>" required>
													<?=form_error('email')?>
													<!-- <span class="m-form__help">
														(Password akan dikirim ke email dosen yang bersangkutan)
													</span> -->
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-12">
													<label class="col-form-label">
														Bidang Keahlian :
													</label>
													<input type="text" name="keahlian" class="form-control m-input" placeholder="Masukkan bidang keahlian" value="<?=set_value('keahlian', $data->bidang_penelitian)?>">
													<?=form_error('keahlian')?>
													<span class="m-form__help">
														Apabila lebih dari 2 bidang keahlian, pisahkan dengan koma ( , ).
														<br>
														Contoh bidang keahlian :<br> 
														Sistem Transportasi Laut<br>
														Hidrodinamika Kapal<br>
														Sistem Bangunan Laut<br>
														Keselamatan Maritim dan Kelistrikan Kapal<br>
														Listrik dan Kendali Kapal<br>
														Permesinan Kapal dan Reparasi Permesinan<br>
														Manajemen Perawatan Sistem Bangunan Laut<br>
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label class="col-form-label">
														Universitas S1 :
													</label>
													<input type="text" name="s1" class="form-control m-input" placeholder="Masukkan universitas" value="<?=set_value('s1', $data->s1)?>">
													<?=form_error('s1')?>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label">
														Universitas S2 :
													</label>
													<input type="text" name="s2" class="form-control m-input" placeholder="Masukkan universitas" value="<?=set_value('s2', $data->s2)?>">
													<?=form_error('s2')?>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label">
														Universitas S3 :
													</label>
													<input type="text" name="s3" class="form-control m-input" placeholder="Masukkan universitas" value="<?=set_value('s3', $data->s3)?>">
													<?=form_error('s3')?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="col-form-label">
														Foto :
													</label>
													<input type="file" name="nama_file" class="form-control m-input" onchange="readURL(this);">
													<?=(isset($error_upload) ? $error_upload : '')?>
													<span class="m-form__help">
														*format file .jpg, .png<br>
														*ukuran file max 2MB
													</span>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">
														Foto yang di upload
													</label>
													<br>
													<img src="<?=upload_url('dosen').(empty($data->foto_dosen) ? 'no_image.png' : $data->foto_dosen)?>" id="uploadgambar" alt="Upload Foto Profil" class="img-fluid">
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-6">
														<button type="submit" class="btn btn-primary">
															Simpan
														</button>
														<button type="button" class="btn btn-secondary">
															Batal
														</button>
													</div>
												</div>
											</div>
										</div>
									<?=form_close()?>
									<!--end::Form-->
								</div>
								<!--end::Biodata Diri-->
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<!--begin::Ubah Password-->
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Ubah Password
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<?=form_open_multipart(dosen_url('biodata/edit_pass/'.$data->nip), array('id' => 'form1'))?>
										<div class="m-form">
											<div class="m-portlet__body">
												<div class="m-form__section m-form__section--first">
													<div class="form-group m-form__group">
														<label for="example_input_full_name">
															Password Baru :
														</label>
														<input type="password" name="password" class="form-control m-input" placeholder="Password" >
														<span class="m-form__help">
															Kosongkan apabila tidak ingin mengubah password
														</span>
													</div>
												</div>
											</div>
											<div class="m-portlet__foot m-portlet__foot--fit">
												<div class="m-form__actions m-form__actions">
													<button type="submit" class="btn btn-primary">
														Simpan
													</button>
												</div>
											</div>
										</div>	
									<?=form_close()?>
									<!--end::Form-->
								</div>
								<!--end::Ubah Password-->
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php $this->load->view('dosenpage/_layout/image_cropper'); ?>
    <?=$load_manager?>
			<!-- end:: Body -->
			<!-- begin::Footer -->
