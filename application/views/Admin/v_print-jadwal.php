<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Print Jadwal Sidang</title>
</head>

<body>
    <div class="container-fluid">
        <div class="content mt-3">
            <h4 class="text-center">Daftar Sidang Ruang : <?= $ruang; ?></h4>
            <div class="mt-3">
                <table class="table table-borderless table-sm">
                    <tbody>
                        <tr>
                            <td style="width:20%" rowspan="2">Hari, Tanggal</td>
                            <td style="width:5%" rowspan="2">:</td>
                            <td style="width:25%"><?= tanggal_indonesia_lengkap($tanggal); ?></td>
                            <td style="width:15%" rowspan="2">Hakim</td>
                            <td style="width:5%" rowspan="2">:</td>
                            <td style="width:30%" rowspan="2"><?= $hakim_nama; ?></td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td>Ruang</td>
                            <td>:</td>
                            <td><?= $ruang; ?></td>
                            <td>Panitera Pengganti</td>
                            <td>:</td>
                            <td><?= $panitera; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" style="text-align:center;">No Perkara</th>
                            <th rowspan="2" class="text-center">Penggugat/Pemohon</th>
                            <th rowspan="2" class="text-center">Tergugat/Termohon</th>
                            <th rowspan="2" class="text-center">Sidang Ke</th>
                            <th colspan="2" class="text-center">Tanggal Sidang</th>
                            <th rowspan="2" class="text-center">Agenda</th>
                            <th rowspan="2" class="text-center">Alasan Tunda</th>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Sebelumnya</th>
                            <th style="text-align:center;">Berikutnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal_sidang as $hasil) :
                        ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $no++; ?></td>
                                <td style="text-align:center;"><?php echo $hasil['nomor_perkara']; ?></td>
                                <td style="text-align:center;"><?php echo $hasil['Penggugat']; ?></td>
                                <td style="text-align:center;"><?php echo $hasil['Tergugat']; ?></td>
                                <td style="text-align:center;"><?php echo $hasil['urutan']; ?></td>
                                <?php if ($hasil['urutan'] != 1) : ?>
                                    <td style="text-align:center;"><?php echo tanggal_indonesia_medium($hasil['tgl_sebelum']); ?></td>
                                <?php else : ?>
                                    <td style="text-align:center;"><span>Sidang Pertama</span></td>
                                <?php endif; ?>

                                <?php if ($hasil['tanggal_putusan'] == null && $hasil['tgl_sesudah'] == null) : ?>
                                    <td style="text-align:center;"><span>-</span></td>
                                <?php elseif ($hasil['tanggal_putusan'] != null && $hasil['tgl_sesudah'] == null) : ?>
                                    <td style="text-align:center;"><span>Perkara Putus</span></td>
                                <?php else : ?>
                                    <td style="text-align:center;"><?php echo tanggal_indonesia_medium($hasil['tgl_sesudah']); ?></td>
                                <?php endif; ?>
                                <td style="text-align:center;"><?php echo $hasil['agenda']; ?></td>
                                <?php if ($hasil['tanggal_putusan'] == null && $hasil['tgl_sesudah'] == null) : ?>
                                    <td style="text-align:center;"><span>-</span></td>
                                <?php elseif ($hasil['tanggal_putusan'] != null && $hasil['tgl_sesudah'] == null) : ?>
                                    <td style="text-align:center;"><span>Perkara Putus</span></td>
                                <?php else : ?>
                                    <td style="text-align:center;"><?php echo $hasil['alasan_ditunda']; ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var css = '@page { size: landscape; }',
                head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);

            window.print();
            setTimeout("closePrintView()", 3000);
        });

        function closePrintView() {
            history.back(1);
        }
    </script>
</body>

</html>