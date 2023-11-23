<style type="text/css">
    .table {
        width: 100%;
    }

    .table td {
        text-align: left;
        vertical-align: top;
    }
    .t-table {
        width: 100%;
    }

    .t-table td {
        text-align: center;
        vertical-align: top;
    }
    .page-break { page-break-before: always; }

    .s-table {
        border-collapse: collapse;
        width: 100%;
    }

    .s-table td, .s-table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .s-table th {
        text-align: center;
    }
    .page-break { page-break-before: always; }
</style>

<body>
  <div class="content-wrapper">
    <div class="bio" style="text-align:center;">
      <h2>Daftar Riwayat Hidup</h2>
    </div>

    <div>
      <b>A. Identitas Diri</b>
      <table class="table">
        <tbody>
          <tr>
            <td width="30%">1. Nama</td>
            <td width="5%">:</td>
            <td><?=($bio->gelar_depan != '' ? $bio->gelar_depan.'. ' : '').$bio->nama_dosen.($bio->gelar_belakang != '' ? ', '.$bio->gelar_belakang : '')?></td>
          </tr>
          <tr>
            <td width="20%">2. Jenis Kelamin</td>
            <td width="5%">:</td>
            <td><?=($bio->jenis_kelamin == 'l'? 'Laki-Laki':'Perempuan')?></td>
          </tr>
          <tr>
            <td width="20%">3. Jenis Fungsional</td>
            <td width="5%">:</td>
            <td><?=$bio->jabatan_dosen?></td>
          </tr>
          <tr>
            <td width="20%">4. NIP</td>
            <td width="5%">:</td>
            <td><?=$bio->nip?></td>
          </tr>
          <tr>
            <td width="20%">5. NIDK</td>
            <td width="5%">:</td>
            <td><?=$bio->nidn?></td>
          </tr>
          <tr>
            <td width="20%"> &nbsp;  &nbsp; Id Sinta</td>
            <td width="5%">:</td>
            <td><?=$bio->sinta_id?></td>
          </tr>
          <tr>
            <td width="20%"> &nbsp;  &nbsp; Id Google Scholar</td>
            <td width="5%">:</td>
            <td><?=$bio->scholar_id?></td>
          </tr>
          <tr>
            <td width="20%">6. Tempat dan Tanggal Lahir</td>
            <td width="5%">:</td>
            <td><?=$bio->tempat_lahir.', '.tgl_indo($bio->tanggal_lahir)?></td>
          </tr>
          <tr>
            <td width="20%">7. No. Telepon/Handphone</td>
            <td width="5%">:</td>
            <td><?=$bio->telepon?></td>
          </tr>
          <tr>
            <td width="20%">8. E-mail</td>
            <td width="5%">:</td>
            <td><?=$bio->email_dosen?></td>
          </tr>
          <tr>
            <td width="20%">9. Alamat Rumah</td>
            <td width="5%">:</td>
            <td><?=$bio->alamat?></td>
          </tr>
          <tr>
            <td width="20%">10. Alamat Kantor</td>
            <td width="5%">:</td>
            <td>Departemen Teknik Sistem Perkapalan, Fakultas Teknik Unhas, Jl. Poros Malino, Km.6, Bontomarannu, Gowa 92171</td>
          </tr>
          <tr>
            <td width="20%">11. No. Fax</td>
            <td width="5%">:</td>
            <td><?=$bio->fax?></td>
          </tr>
        </tbody>
      </table>
      <br><br>
      <b class="page-break">B. Pengalaman Penelitian</b>
      <table class="s-table">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="5%">Tahun <span></span></th>
                <th width="30%">Judul<span></span></th>
                <th width="50%">Sumber Dana<span></span></th>
                <th width="15%">Ketua/Anggota<span></span></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($penelitian as $data): if($data->jenis == 'penelitian') { ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$data->tahun?></td>
                <td><?=$data->judul?></td>
                <td><?=$data->sumber_dana?></td>
                <td><?=$data->jabatan?></td>
            </tr>
            <?php $i++; } endforeach; ?>
        </tbody>
      </table>
      <br><br>
      <b class="page-break">C. Pengalaman Pengabdian Kepada Masyarakat</b>
      <table class="s-table">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="5%">Tahun <span></span></th>
                <th width="30%">Judul<span></span></th>
                <th width="50%">Sumber Dana<span></span></th>
                <th width="15%">Ketua/Anggota<span></span></th>
            </tr>
        </thead>
        <tbody>
            <?php $x = 1; foreach($penelitian as $data): if($data->jenis == 'pengabdian') { ?>
            <tr>
                <td><?=$x?></td>
                <td><?=$data->tahun?></td>
                <td><?=$data->judul?></td>
                <td><?=$data->sumber_dana?></td>
                <td><?=$data->jabatan?></td>
            </tr>
            <?php $x++; } endforeach; ?>
        </tbody>
      </table>
      <br><br>
      <b class="page-break">D. Publikasi</b>
      <table class="s-table">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="40%">Judul Artikel <span></span></th>
                <th width="25%">Jurnal/Conference/Report<span></span></th>
                <th width="30%">Volume/Nomor/Tahun<span></span></th>
            </tr>
        </thead>
        <tbody>
            <?php $x = 1; foreach($publikasi as $data): ?>
            <tr>
                <td><?=$x?></td>
                <td><?=$data->judul?></td>
                <td><?=$data->jurnal?></td>
                <td><?=$data->vol.'/'.$data->no.'.'.$data->tahun?></td>
            </tr>
            <?php $x++;  endforeach; ?>
        </tbody>
      </table>
      <br><br>
      <b>E. HAKI</b>
      <table class="s-table">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="45%">Nama Produk <span></span></th>
                <th width="10%">Jenis<span></span></th>
                <th width="20%">Mulai Perlindungan<span></span></th>
                <th width="20%">Akhir Perlindungan<span></span></th>
            </tr>
        </thead>
        <tbody>
            <?php $x = 1; foreach($haki as $data): ?>
            <tr>
                <td><?=$x?></td>
                <td><?=$data->nama?></td>
                <td><?=$data->jenis?></td>
                <td><?=tgl_indo($data->tanggal_pencatatan)?></td>
                <td><?=tgl_indo($data->tanggal_akhir)?></td>
            </tr>
            <?php $x++;  endforeach; ?>
        </tbody>
      </table>
      <br><br><br>
      <table class="t-table">
        <tr>
          <td width="50%"></td>
          <td>Gowa, <?=tgl_indo(date('Y-m-d'))?></td>
        </tr>
        <tr>
          <td height="8%"></td>
          <td></td>
        </tr>
        <tr>
          <td width="50%"></td>
          <td><?=($bio->gelar_depan != '' ? $bio->gelar_depan.'. ' : '').$bio->nama_dosen.($bio->gelar_belakang != '' ? ', '.$bio->gelar_belakang : '')?></td>
        </tr>
      </table>
    </div>

  </div>
</body> 