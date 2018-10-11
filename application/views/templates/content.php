<?php
$this->load->view('templates/header');
$this->load->view('templates/left_sidebar');
$this->load->view('templates/top_bar');
?>

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Account Overview</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Total Wallet Balance</h4>
                    <div id="donut-chart">
                        <div id="donut-chart-container" class="flot-chart mt-5" style="height: 340px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
<?php
$this->load->view('templates/footer');
