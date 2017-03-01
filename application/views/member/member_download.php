<div class="row" id="member_download_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Download</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <form class="form-horizontal" action="<?php echo $this->config->item('link_member_download'); ?>" method="post">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-sm-3 marginbottom15">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">-- All Status --</option>
                                        <?php
                                        foreach ($code_member_status as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 marginbottom15">
                                    <label>Dimulai dari urutan nomor</label>
                                    <input type="text" class="form-control" name="offset" value="<?php echo set_value('offset', 1); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 marginbottom15">
                                    <input type="submit" class="btn btn-primary" value="Get Data" name="submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="fontred"><em>* Lihat di member lists dengan status yang sama</em></div>
                    <div class="fontred"><em>* Download hanya 100 baris</em></div>
                </div>
                <?php
                if ($btn_download != '')
                {
                    echo $btn_download;
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>