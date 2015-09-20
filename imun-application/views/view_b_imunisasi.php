<body>
<?php $this->load->view('navbar'); ?>

<div class="container">
    <div class="row">
        <?php $this->load->view('notice-alert');
        $this->load->view('just_nav');
        $bunda=$bunda->row_array();
        ?>
        <div class="col-xs-12 bunda"><h4>Hallo Bunda Ibu <?=$bunda['nama']?></h4></div>
        <div class="col-xs-12 hati"><h4>Reminder Imunisasi</h4></div>
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-xs-12" style="margin: 15px 0;">
                <?php
                foreach($bulan->result_array() as $bln){
                    echo
                    '<div class="col-xs-2" style="margin-bottom: 15px;">
                        ';
                    $disable = $this->buahhati_model->dis_bulan(array($bln['id_bulan'], $id_buahhati))->row_array();
                    if((count($disable))>0)
                        echo '
                        <button class="btn btn-block btn-success" disabled data-target="#'.$bln['nama_bulan'].'" data-toggle="modal">
                            <span class="glyphicon glyphicon-check"></span> Bulan ke - '.$bln['nama_bulan'].'
                        </button>';
                    else
                        echo '
                        <button class="btn btn-block btn-danger" data-target="#'.$bln['nama_bulan'].'" data-toggle="modal">
                            <span class="glyphicon glyphicon-th"></span> Bulan ke - '.$bln['nama_bulan'].'
                        </button>';
                    echo '
                    </div>';
//Modal Bulan
echo '

<div class="modal fade" id="'.$bln['nama_bulan'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="'.$bln['nama_bulan'].'">Imunisasi </h4>
                </div>
                <div class="modal-body">
                        ';
                    $attribut = array('class'=>'form-horizontal');
                    echo form_open($post, $attribut);
                        $vaksin = $this->buahhati_model->getalljenisvaksin();
                        foreach($vaksin->result_array() as $v){

                            echo '
                                <div class="col-sm-6"> <div class="form-group">
                                    <input name="jenis_vaksin[]" type="checkbox" value="'.$v['id_vaksin'].'">
                                    <label class="control-label">'.$v['nama_vaksin'].'</label>
                                </div></div>';
                        }
                    echo form_hidden('bulan', $bln['id_bulan']);
                    echo '
                    <div class="form-group">
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>';
                    $attribut = array('class'=>'btn btn-success', 'value'=>'Save', 'name'=>'btn_simpan');
                    echo form_submit($attribut);
                    echo form_close();
                    echo '
                </div>
        </div>
    </div>
</div>
';
                }
                ?>
            </div>
            <div class="col-xs-12 hati" style="margin: 15px 0"><h4>Laporan</h4></div>
            <div class="col-xs-12">
                <table class="table table-bordered">
                    <thead>
                        <th>Bulan Ke -</th>
                        <?php
                        foreach($bulan->result_array() as $bln){
                            echo '<th>'.$bln['nama_bulan'].'</th>';
                        }
                        ?>
                    </thead>
                    <tbody>
                    <?php
                    $jvaksin = $this->buahhati_model->getalljenisvaksin();
                    foreach($jvaksin->result_array() as $jv){
                        echo '
                        <tr>
                            <td>'.$jv['nama_vaksin'].'</td>';
                        foreach($bulan->result_array() as $b){
                            echo '<td style="width: 40px; height: 40px">';
                            $cek = $this->buahhati_model->cek_imun(array($jv['id_vaksin'], $b['id_bulan'], $id_buahhati));
                            $cek = $cek->row_array();
                            if(count($cek) > 0){
                                echo '<button class="btn-success" data-target="#'.$cek['id_vaksin'].$cek['id_bulan'].$cek['id_buah_hati'].'" data-toggle="modal"><span class="glyphicon glyphicon-check"></span> </button>';
                                //Modal Laporan
                                echo '
<div class="modal fade" id="'.$cek['id_vaksin'].$cek['id_bulan'].$cek['id_buah_hati'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="'.$cek['id_vaksin'].$cek['id_bulan'].$cek['id_buah_hati'].'">Laporan Imunisasi Bulan Ke - '.$cek['id_bulan'].' </h4>
            </div>
            <div class="modal-body">
                <p>'.$cek['keterangan'].'</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
                                ';
                            }
                            echo '</td>';
                        }
                        echo '
                        </tr>
                        ';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>