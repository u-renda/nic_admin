<div class="col-md-10" id="page_member_chart">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Member Chart - Tahun <?php echo date('Y'); ?></h2>
            <p class="panel-subtitle">Menunjukkan banyaknya member yang mendaftar tiap bulannya.</p>
        </header>
        <div class="panel-body">
            <!-- Flot: Bars -->
            <div class="chart chart-md" id="flotBars"></div>
            
            <script type="text/javascript">
                var flotBarsData = [
                    <?php foreach ($member_chart as $key => $val) { ?>
                        ["<?php echo $key; ?>", <?php echo $val; ?>],
                    <?php } ?>
                ];
            </script>
        </div>
    </section>
</div>