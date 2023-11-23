<style>
    /* Accordian */

    .accordion-group {
        width: 90vw;
        margin: 0 auto;
    }
    .accordion-group .card-header .btn[aria-expanded="true"]{
        color: #57aeee;
    }

    .accordion-group .card-body img {
        max-width: 901px;
        margin-bottom: 10px;
    }

    .table tr td{
        border: 2px solid #d9d9d9;
    }

    .table tr th{
        border: 2px solid #d9d9d9;
    }

    .peta{
        width: 901px;
        height: 600px;
        margin: 0 auto;
        /* border: 2px solid #57aeee; */
    }


</style>

<div id="banner-area" class="banner-area"
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9)), url(images/tambahan/gedung.jpeg) ">
      <div class="banner-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title"><?=$title?></h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="#">beranda</a></li>
                <li class="breadcrumb-item"><a href="#">akademik</a></li>
                    <li class="breadcrumb-item"><a href="#"><?=$title?></a></li>
                  </ol>
                </nav>
              </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
        </div><!-- Container end -->
      </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <div class="row justify-content-center mt-5 mb-5">
      <div class="col-lg-8 mb-5 mb-lg-0">
       <table class="table" border="0" cellpadding="5" cellspacing="1">

            <tbody><tr><td> 1 </td>
            <td>Menguasai konsep teoritis pada bidang ilmu teknik sistem dalam kapal maupun struktur terapung lainnya</td></tr>
            
            <tr><td> 2 </td>
            <td>Memiliki kemampuan dalam merancang konsep-konsep yang memenuhi prinsip-prinsip teknologi rekayasa  sistem perkapalan yang efektif, efisien, ergonomis, serta ramah lingkungan</td></tr>
            
            <tr><td> 3 </td>
            <td>Memiliki kemampuan dalam konsep fabrikasi dan instalasi teknik sistem perkapalan dan kelautan</td></tr>
            
            <tr><td> 4 </td>
            <td>Memiliki kemampuan dalam prinsip-prinsip rekayasa perbaikan dan pemeliharaan produk dan teknologi sistem perkapalan dan kelautan</td></tr>
            
            <tr><td> 5 </td>
            <td>Mampu memahami dan menerapkan standar dan peraturan yang berlaku di bidang desain, fabrikasi, instalasi, pengawasan serta operasi di bidang teknik sistem perkapalan.</td></tr>
            
            <tr><td> 6 </td>
            <td>Mampu menerapkan konsep teoritis ilmu teknik sistem pada kapal dan pada struktur terapung lainnya.</td></tr>
            
            <tr><td> 7 </td>
            <td>Mampu merancang sistem pada kapal, kendaraan laut, dan struktur terapung lainnya.</td></tr>
            
            <tr><td> 8 </td>
            <td>Mampu melakukan pemeriksaan dan pengawasan di bidang teknik sistem perkapalan dan kelautan.</td></tr>
            
            </tbody>
        </table>
      </div>
    </div>

    <!-- Accordian  -->
    <!-- <section>
      <div class="accordion accordion-group accordion-classic" id="construction-accordion">
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  Capaian Pembelajaran Program Studi (CPPS)
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
              data-parent="#construction-accordion">
              <div class="card-body">
               <table class="table" border="0" cellpadding="5" cellspacing="1">
      
                    <tbody><tr><td> 1 </td>
                    <td>Menguasai konsep teoritis pada bidang ilmu teknik sistem dalam kapal maupun struktur terapung lainnya</td></tr>
                    
                    <tr><td> 2 </td>
                    <td>Memiliki kemampuan dalam merancang konsep-konsep yang memenuhi prinsip-prinsip teknologi rekayasa  sistem perkapalan yang efektif, efisien, ergonomis, serta ramah lingkungan</td></tr>
                    
                    <tr><td> 3 </td>
                    <td>Memiliki kemampuan dalam konsep fabrikasi dan instalasi teknik sistem perkapalan dan kelautan</td></tr>
                    
                    <tr><td> 4 </td>
                    <td>Memiliki kemampuan dalam prinsip-prinsip rekayasa perbaikan dan pemeliharaan produk dan teknologi sistem perkapalan dan kelautan</td></tr>
                    
                    <tr><td> 5 </td>
                    <td>Mampu memahami dan menerapkan standar dan peraturan yang berlaku di bidang desain, fabrikasi, instalasi, pengawasan serta operasi di bidang teknik sistem perkapalan.</td></tr>
                    
                    <tr><td> 6 </td>
                    <td>Mampu menerapkan konsep teoritis ilmu teknik sistem pada kapal dan pada struktur terapung lainnya.</td></tr>
                    
                    <tr><td> 7 </td>
                    <td>Mampu merancang sistem pada kapal, kendaraan laut, dan struktur terapung lainnya.</td></tr>
                    
                    <tr><td> 8 </td>
                    <td>Mampu melakukan pemeriksaan dan pengawasan di bidang teknik sistem perkapalan dan kelautan.</td></tr>
                    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Capaian Pembelajaran Lulusan (CPL)
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#construction-accordion">
              <div class="card-body">
                <table class="" border="1" cellpadding="5" cellspacing="1">
      
                    <tbody><tr><td> A. SIKAP (Attitude) </td>
                    <td>Berjiwa Pancasila, menjunjung tinggi nilai kebangsaan, beretika keilmuan, memiliki kepekaan sosial, bekerja sama dan bertanggung jawab atas pekerjaan di bidang keahlian secara mandiri.</td></tr>
                    
                    <tr><td> B. PENGETAHUAN (Knowledge and Understanding) </td>
                    <td>Memahami aspek kunci dan konsep dari desain kapal, sistem permesinan dan kelistrikan kapal, serta struktur bangunan laut untuk merumuskan pemecahan masalah prosedural</td></tr>
                    
                    <tr><td>  </td>
                    <td>Menguasai teori sistem permesinaan bangunan laut yang mencakup teknik perancangan, fabrikasi, instalasi, supervisi, survey serta maintenance dan repair, sehingga mampu menghasilkan rancangan yang optimal.</td></tr>
                    
                    <tr><td>  </td>
                    <td>Menguasai dan mampu mengembangkan teknik pelaksanaan supervisi, dapat mengembangkan prosedur proses fabrikasi yang efisien, serta menghasilkan sistem manajemen yang efektif.</td></tr>
                    
                    <tr><td> C. KEMAMPUAN KERJA UMUM (Engineering Skill) </td>
                    <td>Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan atau implementasi ilmu pengetahuan dan teknologi yang memperhatikan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya; </td></tr>
                    
                    <tr><td>  </td>
                    <td>Mampu mengambil keputusan secara tepat dalam konteks penyelesaian masalah di bidang keahliannya, berdasarkan hasil analisis informasi  dan data;  </td></tr>
                    
                    <tr><td>  </td>
                    <td>Mampu bertanggungjawab atas pencapaian hasil kerja kelompok dan melakukan supervisi dan evaluasi terhadap penyelesaian pekerjaan yang ditugaskan kepada pekerja yang berada di bawah tanggungjawabnya;  </td></tr>
                    
                    <tr><td> D. KEMAMPUAN KERJA KHUSUS (Competence) </td>
                    <td>Mampu merancang/menganalisa sistem permesinan, penggerak dan kendali kapal, dan bangunan laut dengan menggunakan program komputasi aplikasi melalui proses merancang untuk berbagai jenis sistem permesinan, penggerak, dan kendali sebagai implementasi keahlian dan kemampuan beradaptasi terhadap masalah lingkungan laut yang dihadapi sebagai wujud kemampuan dalam menyelesaikan masalah energi, keselamatan dan pencemaran laut. </td></tr>
                    
                    <tr><td>  </td>
                    <td>Mampu merancang sistem instalasi perpipaan dan instrumentasi di kapal dan bangunan laut dengan menerapkan aturan standard dan regulasi untuk berbagai jenis sistem permesinan, penggerak, dan kendali sebagai implementasi keahlian dan kemampuan beradaptasi terhadap masalah lingkungan laut yang dihadapi dalam menyelesaikan masalah energi, keselamatan dan pencemaran laut. </td></tr>
                    
                    <tr><td>  </td>
                    <td>Mampu melaksanakan pekerjaan supervisi &amp; survey untuk sistem permesinan kapal dan bangunan laut dengan menerapkan standard dan regulasi untuk berbagai jenis sistem permesinan, penggerak, dan kendali sebagai implementasi keahlian sebagai wujud implementasi keahlian dan kemampuan beradaptasi terhadap masalah lingkungan laut yang dihadapi dalam menyelesaikan masalah energi, keselamatan dan pencemaran laut. </td></tr>
                    
                    <tr><td>  </td>
                    <td>Mampu merancang sistem pemeliharaan dan perawatan permesinan kapal dan sistem perlengkapan kapal serta sistem bangunan laut dengan menggunakan metode Kuantitatif.</td></tr>
                    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Mata Kuliah
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
              data-parent="#construction-accordion">
              <div class="card-body">
                <table class="table1" border="1" cellspacing="1" align="center" font="" face="Tahoma">
                    <tbody><tr><th>No.</th><th>Semester</th><th>Kode mk</th><th>Nama MK</th><th>SKS</th></tr>
                    
                    <tr><td font="" size="2"> 1 </td>
                    
                    <td align="center" font-bold="true"> 1 </td>
                    
                    <td>18E05110782</td>
                    <td>Pendidikan Kewarganegaraan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 2 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18H04110742</td>
                    <td>Wawasan IPTEKS</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 3 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18F01110752</td>
                    <td>Bahasa Indonesia</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 4 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18H01110823</td>
                    <td>Matematika Dasar I</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 5 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18H02110863</td>
                    <td>Fisika Dasar I</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 6 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09110103</td>
                    <td>Gambar Teknik</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 7 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09110202</td>
                    <td>Pengantar Teknologi Kelautan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 8 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09110302</td>
                    <td>Mekanika Teknik I</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 9 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09110402</td>
                    <td>Termodinamika</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 10 </td>
                    
                    <td align="center"> 2 </td>
                    
                    <td>18F03110612</td>
                    <td>Pendidikan Agama Islam</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 11 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18F05110642</td>
                    <td>Pendidikan Agama Katolik</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 12 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18F05110662</td>
                    <td>Pendidikan Agama Protestan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 13 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18F09110682</td>
                    <td>Pendidikan Agama Hindu</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 14 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18F09110702</td>
                    <td>Pendidikan Agama Budha</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 15 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18F09110772</td>
                    <td>Pendidikan Agama Khong Hu Cu</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 16 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18E05110792</td>
                    <td>Pancasila</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 17 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18E07110732</td>
                    <td>Wawasan Sosial Budaya Maritim</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 18 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18F04110762</td>
                    <td>Bahasa Inggris</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 19 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18H02110883</td>
                    <td>Fisika Dasar  II</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 20 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>18H01110833</td>
                    <td>Matematika Dasar  II</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 21 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09110502</td>
                    <td>Mekanika Teknik II</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 22 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09110602</td>
                    <td>Mekanika Fluida</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 23 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09110703</td>
                    <td>Teori dan Disain Kapal</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 24 </td>
                    
                    <td align="center"> 3 </td>
                    
                    <td>21D09120102</td>
                    <td>Matematika Teknik I</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 25 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09120203</td>
                    <td>Tahanan Kapal</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 26 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09120303</td>
                    <td>Perpindahan Panas</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 27 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09120403</td>
                    <td>Permesinan Kapal I</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 28 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09120503</td>
                    <td>Konstruksi Kapal</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 29 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09120603</td>
                    <td>Mesin-Mesin Fluida</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 30 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09120703</td>
                    <td>Energi  laut Terbarukan</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 31 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09120802</td>
                    <td>Komputasi dan Pemrograman</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 32 </td>
                    
                    <td align="center"> 4 </td>
                    
                    <td>21D09120903</td>
                    <td>Propulsi Kapal</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 33 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121004</td>
                    <td>Desain Sistem Permesinan I</td>
                    <td align="center">4</td></tr>
                    
                    <tr><td font="" size="2"> 34 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121102</td>
                    <td>Sistem Instalasi Perpipaan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 35 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121203</td>
                    <td>Permesinan Kapal II</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 36 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121302</td>
                    <td>Ekonomi Maritim</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 37 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121402</td>
                    <td>Listrik Kapal</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 38 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121502</td>
                    <td>Matematika Teknik II</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 39 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121602</td>
                    <td>Metode dan Analisa Numerik</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 40 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09121702</td>
                    <td>Manajemen Kesehatan dan Keselamatan Laut </td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 41 </td>
                    
                    <td align="center"> 5 </td>
                    
                    <td>21D09130103</td>
                    <td>Permesinan Kapal III</td>
                    <td align="center">3</td></tr>
                    
                    <tr><td font="" size="2"> 42 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09130202</td>
                    <td>Pengkondisian Udara</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 43 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09130304</td>
                    <td>Desain Sistem Permesinan II</td>
                    <td align="center">4</td></tr>
                    
                    <tr><td font="" size="2"> 44 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09130402</td>
                    <td>Sistem Instrumentasi Kelautan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 45 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09130502</td>
                    <td>Sistem Transmisi Permesinan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 46 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09130602</td>
                    <td>Keandalan dan Manajemen Perawatan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 47 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09130702</td>
                    <td>Sistem Komunikasi dan Navigasi</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 48 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09130802</td>
                    <td>Reparasi Permesinan Kapal</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 49 </td>
                    
                    <td align="center"> 6 </td>
                    
                    <td>21D09130902</td>
                    <td>Statistik Teknik</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 50 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09133402</td>
                    <td>Metode Penelitian</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 51 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09131002</td>
                    <td>Metode Optimasi</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 52 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09131102</td>
                    <td>Getaran Kapal</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 53 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09131203</td>
                    <td>Sistem Pengendalian</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 54 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09131302</td>
                    <td>Sistem Bangunan Laut</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 55 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09131402</td>
                    <td>Kewirausahaan</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 56 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09131502</td>
                    <td>Kokurikuler*</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 57 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09131601</td>
                    <td>Seminar Desain Kapal*</td>
                    <td align="center">1</td></tr>
                    
                    <tr><td font="" size="2"> 58 </td>
                    
                    <td align="center"> 7 </td>
                    
                    <td>21D0919604</td>
                    <td>Kuliah Kerja Nyata*</td>
                    <td align="center">4</td></tr>
                    
                    <tr><td font="" size="2"> 59 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09140104</td>
                    <td>Kerja Praktek*</td>
                    <td align="center">4</td></tr>
                    
                    <tr><td font="" size="2"> 60 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td></td>
                    <td>Pilihan Wajib Labo 1*</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 61 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td></td>
                    <td>Pilihan Wajib Labo 2*</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 62 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td></td>
                    <td>Pilihan Umum Labo 1*</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 63 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td></td>
                    <td>Pilihan Umum Labo 2*</td>
                    <td align="center">2</td></tr>
                    
                    <tr><td font="" size="2"> 64 </td>
                    
                    <td align="center"> 8 </td>
                    
                    <td>21D09142601</td>
                    <td>Seminar*</td>
                    <td align="center">1</td></tr>
                    
                    <tr><td font="" size="2"> 65 </td>
                    
                    <td rowspan="$jjarak" align="center"> - </td>
                    
                    <td>21D09142705</td>
                    <td>Skripsi*</td>
                    <td align="center">5</td></tr>
                    
                    </tbody>
                </table>
              </div>   
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingFour">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour"
                  aria-expanded="false" aria-controls="collapseFour">
                  Tabel Daftar Mata Kuliah Pilihan Wajib Labo
                </button>
              </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#construction-accordion">
              <div class="card-body">
                <table class="table1" border="1" cellspacing="1" align="center" font="" face="Tahoma">
                    <tbody><tr><th>No.</th><th>Kode mk</th><th>Nama MK</th><th>SKS</th><th>Keterangan</th></tr>
                    
                    <tr><td font="" size="2"> 1 </td>
                    <td>21D09140202</td>
                    <td>Sistem Hidrolik dan Pneumatik</td>
                    <td>2</td>
                    <td>Wajib Labo 1</td></tr>
                    
                    <tr><td font="" size="2"> 2 </td>
                    <td>21D09140302</td>
                    <td>Keselamatan Permesinan</td>
                    <td>2</td>
                    <td>Wajib Labo 1</td></tr>
                    
                    <tr><td font="" size="2"> 3 </td>
                    <td>21D09140402</td>
                    <td>Teknik Eks. Permesinan</td>
                    <td>2</td>
                    <td>Wajib Labo 1</td></tr>
                    
                    <tr><td font="" size="2"> 4 </td>
                    <td>21D09140502</td>
                    <td>Survey dan Inspeksi Permesinan</td>
                    <td>2</td>
                    <td>Wajib Labo 1</td></tr>
                    
                    <tr><td font="" size="2"> 5 </td>
                    <td>21D09140602</td>
                    <td>Sistem Monitoring Kapal</td>
                    <td>2</td>
                    <td>Wajib Labo 2</td></tr>
                    
                    <tr><td font="" size="2"> 6 </td>
                    <td>21D09140702</td>
                    <td>Sistem Pembangkit Daya Listrik</td>
                    <td>2</td>
                    <td>Wajib Labo 2</td></tr>
                    
                    <tr><td font="" size="2"> 7 </td>
                    <td>21D09140802</td>
                    <td>Teknik Eks. Listrik dan Kendali</td>
                    <td>2</td>
                    <td>Wajib Labo 2</td></tr>
                    
                    <tr><td font="" size="2"> 8 </td>
                    <td>21D09140902</td>
                    <td>Perancangan Sistem Kendali</td>
                    <td>2</td>
                    <td>Wajib Labo 2</td></tr>
                    
                    <tr><td font="" size="2"> 9 </td>
                    <td>21D09141002</td>
                    <td>Hidrodinamika Propulsi</td>
                    <td>2</td>
                    <td>Wajib Labo 3</td></tr>
                    
                    <tr><td font="" size="2"> 10 </td>
                    <td>21D09141102</td>
                    <td>Pemodelan Sistem Propulsi</td>
                    <td>2</td>
                    <td>Wajib Labo 3</td></tr>
                    
                    <tr><td font="" size="2"> 11 </td>
                    <td>21D09141202</td>
                    <td>Propulsi Kapal Cepat</td>
                    <td>2</td>
                    <td>Wajib Labo 3</td></tr>
                    
                    <tr><td font="" size="2"> 12 </td>
                    <td>21D09141302</td>
                    <td>Teknik Eks. Propulsi</td>
                    <td>2</td>
                    <td>Wajib Labo 3</td></tr>
                    
                    <tr><td font="" size="2"> 13 </td>
                    <td>21D09141402</td>
                    <td>Pemodelan Distribusi Fluida</td>
                    <td>2</td>
                    <td>Wajib Labo 4</td></tr>
                    
                    <tr><td font="" size="2"> 14 </td>
                    <td>21D09141502</td>
                    <td>Hidrodinamika Laut</td>
                    <td>2</td>
                    <td>Wajib Labo 4</td></tr>
                    
                    <tr><td font="" size="2"> 15 </td>
                    <td>21D09141602</td>
                    <td>Teknik Eks. Kelautan</td>
                    <td>2</td>
                    <td>Wajib Labo 4</td></tr>
                    
                    <tr><td font="" size="2"> 16 </td>
                    <td>21D09141702</td>
                    <td>Manajemen Energi</td>
                    <td>2</td>
                    <td>Wajib Labo 4</td></tr>
                    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingFive">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Tabel Daftar mata kuliah pilihan umum labo
                </button>
              </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#construction-accordion">
              <div class="card-body">
              <table class="table1" cellspacing="1" align="center" font="" face="Tahoma">
                    <tbody><tr><th>No.</th><th>Kode mk</th><th>Nama MK</th><th>SKS</th></tr>
                    
                    <tr><td font="" size="2"> 1 </td>
                    <td>21D09141802</td>
                    <td>Sistem Pendingin</td>
                    <td>2</td></tr>
                    
                    <tr><td font="" size="2"> 2 </td>
                    <td>21D09141902</td>
                    <td>Sistem Transmisi Kelistrikan</td>
                    <td>2</td></tr>
                    
                    <tr><td font="" size="2"> 3 </td>
                    <td>21D09142002</td>
                    <td>Sistem Propulsi Udara</td>
                    <td>2</td></tr>
                    
                    <tr><td font="" size="2"> 4 </td>
                    <td>21D09142102</td>
                    <td>Sistem Propulsi Elektrik</td>
                    <td>2</td></tr>
                    
                    <tr><td font="" size="2"> 5 </td>
                    <td>21D09142202</td>
                    <td>Efesiensi Energi</td>
                    <td>2</td></tr>
                    
                    <tr><td font="" size="2"> 6 </td>
                    <td>21D09142302</td>
                    <td>Teknologi Bawah Laut</td>
                    <td>2</td></tr>
                    
                    <tr><td font="" size="2"> 7 </td>
                    <td>21D09142402</td>
                    <td>Kecerdasan Buatan</td>
                    <td>2</td></tr>
                    
                    <tr><td font="" size="2"> 8 </td>
                    <td>21D09142502</td>
                    <td>Perancangan Berbasis Komputer</td>
                    <td>2</td></tr>
                    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingSix">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  Gambar Peta Mata Kuliah
                </button>
              </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#construction-accordion">
              <div class="card-body">
                <div class="peta">
                    <img src="https://eng.unhas.ac.id/tsp/akademik/images/8vmbsbbbkj.jpg" id="Image4" alt="" width="901" height="535">
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingSeven">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  SOP (Standar Operasional Prosedure)
                </button>
              </h2>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#construction-accordion">
              <div class="card-body">
                <table class="table" cellspacing="1" align="center" font="" face="Tahoma">
      
                    <tbody><tr><td font="" size="2"> 1 </td>
                    <td>SOP Seminar Proposal</td>
                    <td><a href=""><img src="https://eng.unhas.ac.id/tsp/gambarq/download1x.png" title="Klik Download Dokumen" alt="Klik Download Dokumen"></a></td></tr>
                    
                    <tr><td font="" size="2"> 2 </td>
                    <td>SOP Seminar Hasil</td>
                    <td><a href=""><img src="https://eng.unhas.ac.id/tsp/gambarq/download1x.png" title="Klik Download Dokumen" alt="Klik Download Dokumen"></a></td></tr>
                    
                    <tr><td font="" size="2"> 3 </td>
                    <td>SOP Ujian Tutup</td>
                    <td><a href=""><img src="https://eng.unhas.ac.id/tsp/gambarq/download1x.png" title="Klik Download Dokumen" alt="Klik Download Dokumen"></a></td></tr>
                    
                    <tr><td font="" size="2"> 4 </td>
                    <td>SOP Seminar KP</td>
                    <td><a href=""><img src="https://eng.unhas.ac.id/tsp/gambarq/download1x.png" title="Klik Download Dokumen" alt="Klik Download Dokumen"></a></td></tr>
                    
                    <tr><td font="" size="2"> 5 </td>
                    <td>SOP Seminar Desain Kapal (Komprehensif)</td>
                    <td><a href=""><img src="https://eng.unhas.ac.id/tsp/gambarq/download1x.png" title="Klik Download Dokumen" alt="Klik Download Dokumen"></a></td></tr>
                    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingEight">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                  Beasiswa dan Bantuan
                </button>
              </h2>
            </div>
            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#construction-accordion">
              <div class="card-body">
                <table class="table" cellspacing="1" align="center" font="" face="Tahoma">
      
                    <tbody><tr><td font="" size="2"> 1 </td>
                    <td>Beasiswa Bidik Misi</td></tr>
                    
                    <tr><td font="" size="2"> 2 </td>
                    <td> Mahasiswa Unggulan Aktivis (BMU)</td></tr>
                    
                    <tr><td font="" size="2"> 3 </td>
                    <td>Peningkatan Prestasi Ekstra Kurikuler (PPE)</td></tr>
                    
                    <tr><td font="" size="2"> 4 </td>
                    <td>PT. INCO</td></tr>
                    
                    <tr><td font="" size="2"> 5 </td>
                    <td>Peningkatan Prestasi Akademik (PPA)</td></tr>
                    
                    <tr><td font="" size="2"> 6 </td>
                    <td>PT. Thiess Constractors Indonesia</td></tr>
                    
                    <tr><td font="" size="2"> 7 </td>
                    <td>Mahasiswa Yang Lulus Pada Seleksi Penerimaan Mahasiswa Baru Pusat (BMU-SPMB Pusat)</td></tr>
                    
                    <tr><td font="" size="2"> 8 </td>
                    <td>Yayasan Toyota Astra</td></tr>
                    
                    <tr><td font="" size="2"> 9 </td>
                    <td>Surya Citra Televisi (SCTV)</td></tr>
                    
                    <tr><td font="" size="2"> 10 </td>
                    <td>Peningkatan Prestasi Mahasiswa Baru (PPA-MABA)</td></tr>
                    
                    <tr><td font="" size="2"> 11 </td>
                    <td>Bank Indonesia (BI)</td></tr>
                    
                    <tr><td font="" size="2"> 12 </td>
                    <td>Pertamina Energi Equity Sengkang</td></tr>
                    
                    <tr><td font="" size="2"> 13 </td>
                    <td>PT. Medco</td></tr>
                    
                    <tr><td font="" size="2"> 14 </td>
                    <td>Indosat/PT. Telkom</td></tr>
                    
                    <tr><td font="" size="2"> 15 </td>
                    <td>Yayasan Amal Masyarakat Pertanian Indonesia (YAMPI)</td></tr>
                    
                    <tr><td font="" size="2"> 16 </td>
                    <td>PT. Jarum</td></tr>
                    
                    <tr><td font="" size="2"> 17 </td>
                    <td>Program Kompensasi Pengurangan Subsidi Bahan Bakar Minya (PKPS-BBM)</td></tr>
                    
                    <tr><td font="" size="2"> 18 </td>
                    <td>Supersemar</td></tr>
                    
                    <tr><td font="" size="2"> 19 </td>
                    <td>Ikatan Alumni Unhas (IKA-UNHAS)</td></tr>
                    
                    <tr><td font="" size="2"> 20 </td>
                    <td>Bank Export</td></tr>
                    
                    <tr><td font="" size="2"> 21 </td>
                    <td>Bank Niaga</td></tr>
                    
                    <tr><td font="" size="2"> 22 </td>
                    <td>Bank Bukopin</td></tr>
                    
                    <tr><td font="" size="2"> 23 </td>
                    <td>Bank Rakyat Indonesia (BRI)</td></tr>
                    
                    <tr><td font="" size="2"> 24 </td>
                    <td>Bank Tabungan Negara (BTN)</td></tr>
                    
                    <tr><td font="" size="2"> 25 </td>
                    <td>MARUKI</td></tr>
                    
                    <tr><td font="" size="2"> 26 </td>
                    <td>Yayasan Kalbe</td></tr>
                    
                    <tr><td font="" size="2"> 27 </td>
                    <td>PERAK</td></tr>
                    
                    <tr><td font="" size="2"> 28 </td>
                    <td>Yayasan Salim</td></tr>
                    
                    <tr><td font="" size="2"> 29 </td>
                    <td>MARU BENI</td></tr>
                    
                    <tr><td font="" size="2"> 30 </td>
                    <td>JAPAN</td></tr>
                    
                    <tr><td font="" size="2"> 31 </td>
                    <td>Yayasan Pertamina</td></tr>
                    
                    <tr><td font="" size="2"> 32 </td>
                    <td>PT. Tabungan Pensiun (TASPEN)</td></tr>
                    
                    <tr><td font="" size="2"> 33 </td>
                    <td>Eka Tjipta Sarjana</td></tr>
                    
                    <tr><td font="" size="2"> 34 </td>
                    <td>Baznas (Badan Amil Zakat Nasional)</td></tr>
                    
                    <tr><td font="" size="2"> 35 </td>
                    <td>Bank BCA</td></tr>
                    
                    <tr><td font="" size="2"> 36 </td>
                    <td>Komatsu</td></tr>
                    
                    <tr><td font="" size="2"> 37 </td>
                    <td>Bantuan Khusus Mahasiswa (BKM)</td></tr>
                    
                    <tr><td font="" size="2"> 38 </td>
                    <td>Biro Klasifikasi Indonesia (BKI)</td></tr>
                    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section> -->
    <!-- End Accordian -->