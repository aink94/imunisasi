<body>
<?php $this->load->view('navbar'); ?>

<div class="container">
    <div class="row">
        <?php $this->load->view('notice-alert');
        $this->load->view('just_nav');
        $bunda=$bunda->row_array();
        ?>
        <div class="col-xs-12 bunda"><h4>Hallo Bunda Ibu <?=$bunda['nama']?></h4></div>
        <div class="col-xs-12 hati" style="margin-bottom: 15px"><h4>Edit Buah Hati</h4></div>
        <div class="row">
            <?php
            $attribute = array('class'=>'form-horizontal', 'role'=>'form');
            echo form_open_multipart($post, $attribute);
            ?>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'nama_buah_hati', 'class'=>'form-control', 'value'=>set_value('nama_buah_hati', $bh['nama']), 'placeholder'=>'Nama Buah Hati');
                    echo form_input($attribute);
                    echo form_error('nama_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tempat Lahir Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'tempat_lahir_buah_hati', 'class'=>'form-control', 'value'=>set_value('tempat_lahir_buah_hati', $bh['tempat_lahir']));
                    echo form_input($attribute);
                    echo form_error('tempat_lahir_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Lahir Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'tgl_lahir_buah_hati', 'class'=>'form-control', 'type'=>'date', 'value'=>set_value('tgl_lahir_buah_hati', $bh['tanggal_lahir']));
                    echo form_input($attribute);
                    echo form_error('tgl_lahir_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama RS Tempat Lahir Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'nama_rs', 'class'=>'form-control', 'value'=>set_value('nama_rs', $bh['nama_rumah_sakit']));
                    echo form_input($attribute);
                    echo form_error('nama_rs');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Agama Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $options = array(''=>'-- Pilih Agama --','Islam'=>'Islam', 'Kristen Khatolik'=>'Kristen Khatolik', 'Kristen Protestan'=>'Kristen Protestan', 'Hindu'=>'Hindu', 'Budha'=>'Budha', 'DLL'=>'DLL');
                    $attribute = 'class="form-control" ';
                    echo form_dropdown('agama_buah_hati', $options, set_value('agama_buah_hati', $bh['agama']), $attribute);
                    echo form_error('agama_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Golongan Darah Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $options = array(''=>'-- Pilih Golongan Darah --', 'A'=>'A', 'B'=>'B', 'AB'=>'AB', 'O'=>'O');
                    $attribute = 'class="form-control" ';
                    echo form_dropdown('golongan_darah_buah_hati', $options, set_value('golongan_darah_buah_hati', $bh['golongan_darah']), $attribute);
                    echo form_error('golongan_darah_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Resus Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $options = array(''=>'-- Pilih Resus --', 'Positif'=>'Positif(+)', 'Negatif'=>'Negatif(-)');
                    $attribute = 'class="form-control" ';
                    echo form_dropdown('resus_buah_hati', $options, set_value('resus_buah_hati', $bh['resus']), $attribute);
                    echo form_error('resus_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Persalinan Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $options = array(''=>'-- Pilih Persalinan --', 'Normal'=>'Normal', 'Prematur'=>'Prematur');
                    $attribute = 'class="form-control" ';
                    echo form_dropdown('persalinan_buah_hati', $options, set_value('persalinan_buah_hati', $bh['persalinan']), $attribute);
                    echo form_error('persalinan_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Berat Badan Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'berat_badan_buah_hati', 'class'=>'form-control', 'value'=>set_value('berat_badan_buah_hati', $bh['berat_badan']));
                    echo form_input($attribute);
                    echo form_error('berat_badan_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tinggi Badan Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'tinggi_badan_buah_hati', 'class'=>'form-control', 'value'=>set_value('tinggi_badan_buah_hati', $bh['tinggi_badan']));
                    echo form_input($attribute);
                    echo form_error('tinggi_badan_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Foto Buah Hati</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'foto_buah_hati', 'class'=>'form-control', 'value'=>set_value('foto_buah_hati', $bh['foto']));
                    echo form_upload($attribute);
                    echo form_error('foto_buah_hati');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Catatan</label>
                <div class="col-sm-9">
                    <?php
                    $attribute = array('name'=>'catatan', 'class'=>'form-control', 'value'=>set_value('catatan', $bh['catatan']));
                    echo form_textarea($attribute);
                    echo form_error('catatan');
                    ?>
                </div>
            </div>
            <div class="col-xs-4 pull-right">
                <?php
                $attribute = array('class'=>'btn btn-large btn-danger btn-block', 'value'=>'Simpan');
                echo form_submit($attribute);
                ?>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>