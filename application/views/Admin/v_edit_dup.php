<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- batas atas -->
                <div class="card">
                    <form id="form-siswa" method="POST" action="<?php echo base_url('duplikat/update_data/') ?>" enctype="multipart/form-data">
                        <div class="card-header">
                            <h5 class="card-title m-0">--Form Edit Permohonan Duplikat--</h5>
                            <?php foreach ($data_dup as $hasil) : ?>

                            <?php endforeach;  ?>
                            <div class="card-tools">
                                <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group row">
                                                    <div class="form-group col-md-6">
                                                        <label for="reg_dup" class="col-sm-5 col-form-label">Register Duplikat</label>
                                                        <input type="text" class="form-control" name="reg_dup" value="<?= $hasil['reg_dup']; ?>" required>
                                                        <input type="hidden" name="id_dup" value="<?= $hasil['id_dup']; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="tgl_dup">Tanggal Permohonan</label>
                                                        <input type="date" name="tgl_dup" class="form-control form-control-sm" value="<?= $hasil['tgl_dup']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nama_pemohon">Nama Pemohon</label>
                                                        <input type="text" name="nama_pemohon" class="form-control form-control-sm" value="<?= $hasil['nama_pemohon']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="umur_pemohon">Umur Pemohon</label>
                                                        <input type="text" name="umur_pemohon" class="form-control form-control-sm" value="<?= $hasil['umur_pemohon']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="kerja_pemohon">Pekerjaan Pemohon</label>
                                                        <input type="text" name="kerja_pemohon" class="form-control form-control-sm" value="<?= $hasil['kerja_pemohon']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="alamat_pemohon">Alamat Pemohon</label>
                                                        <textarea name="alamat_pemohon" class="form-control form-control-sm" required><?= $hasil['alamat_pemohon']; ?></textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <hr/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="no_ac">No Akta Cerai</label>
                                                        <input type="text" name="no_ac" class="form-control form-control-sm" value="<?= $hasil['no_ac']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="tgl_terbit_ac">Tanggal Akta Cerai</label>
                                                        <input type="date" class="form-control form-control-sm" name="tgl_terbit_ac" value="<?= $hasil['tgl_terbit_ac']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="jenis_ac">Jenis Akta Cerai</label>
                                                        <select name="jenis_ac" class="form-control" required>
                                                            <option value=''>--Pilih Jenis--</option>
                                                            <option value='Talak' <?php if($hasil['jenis_ac'] == 'Talak'){ ?> selected = "selected"<?php } ?>>Talak</option>
                                                            <option value='Gugat' <?php if($hasil['jenis_ac'] == 'Gugat'){ ?> selected = "selected"<?php } ?>>Gugat</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                    <hr/>
                                                </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="no_perkara">Nomor Perkara</label>
                                                        <input type="text" class="form-control form-control-sm" name="no_perkara" value="<?= $hasil['no_perkara']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="pemohon_perkara">Nama Penggugat / Pemohon</label>
                                                        <input type="text" class="form-control form-control-sm" name="pemohon_perkara" value="<?= $hasil['pemohon_perkara']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="termohon_perkara">Nama Tergugat / Termohon</label>
                                                        <input type="text" class="form-control form-control-sm" name="termohon_perkara" value="<?= $hasil['termohon_perkara']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="tgl_putus_perkara">Tanggal Putusan</label>
                                                        <input type="date" class="form-control form-control-sm" name="tgl_putus_perkara" value="<?= $hasil['tgl_putus_perkara']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group row">
                                                    <div class="form-group col-md-6">
                                                        <label for="kondisi_ac" class="col-sm-5 col-form-label">Kondisi Akta Cerai</label>
                                                        <input type="text" class="form-control" name="kondisi_ac" value="<?= $hasil['kondisi_ac']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="alasan_kondisi">Alasan</label>
                                                        <input type="text" name="alasan_kondisi" class="form-control form-control-sm" value="<?= $hasil['alasan_kondisi']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="alamat_kondisi">Alamat Kejadian</label>
                                                        <textarea name="alamat_kondisi" class="form-control form-control-sm" required><?= $hasil['alamat_kondisi']; ?></textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <hr/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="surat_polisi">Surat Laporan Kehilangan Dari</label>
                                                        <input type="text" name="surat_polisi" class="form-control form-control-sm" value="<?= $hasil['surat_polisi']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="no_polisi">Nomor Surat</label>
                                                        <input type="text" name="no_polisi" class="form-control form-control-sm" value="<?= $hasil['no_polisi']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="tgl_polisi">Tanggal Surat</label>
                                                        <input type="date" name="tgl_polisi" class="form-control form-control-sm" value="<?= $hasil['tgl_polisi']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <hr/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="belum_kua">Surat Keterangan Belum Menikah Lagi Dari</label>
                                                        <input type="text" name="belum_kua" class="form-control form-control-sm" value="<?= $hasil['belum_kua']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="no_belum_kua">Nomor Surat</label>
                                                        <input type="text" class="form-control form-control-sm" name="no_belum_kua" value="<?= $hasil['no_belum_kua']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="tgl_belum_kua">Tanggal Surat</label>
                                                        <input type="date" class="form-control form-control-sm" name="tgl_belum_kua" value="<?= $hasil['tgl_belum_kua']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <hr/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="kua">Mengetahui KUA</label>
                                                        <input type="text" class="form-control form-control-sm" name="kua" value="<?= $hasil['kua']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="alasan_dup">Alasan Permohonan Duplikat</label>
                                                        <textarea class="form-control form-control-sm" name="alasan_dup" required><?= $hasil['alasan_dup']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- batas bawah -->
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->