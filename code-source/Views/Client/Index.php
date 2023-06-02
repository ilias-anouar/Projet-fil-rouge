<!DOCTYPE html>
<html lang="en">

<?php
// include "../Layout/root.php";
include_once(__ROOT__ . "/Views/Layout/head.php");
?>
<style>
    <?php
    include_once(__ROOT__ . "/Views/Assets/css/Admin.css");
    ?>
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/preloader.php");
        ?>
        <!-- Navbar -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/navbare.php");
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/sidebare.php");
        ?>
        <!-- /.sidebar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Welcome "name"</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="result">
                        <?php
                        // include_once(__ROOT__ . "/Views/Client/Cards.php");
                        // include_once(__ROOT__ . "/Views/Client/form.php");
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Weigth Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="lineChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 654px;"
                                        width="735" height="281" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card text-center">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    jQuery Knob
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="display: block;">
                                <div class="row">
                                    <div class="col-6 col-md-3 text-center">
                                        <div style="display:inline;width:90px;height:90px;"><canvas width="101"
                                                height="101" style="width: 90px; height: 90px;"></canvas><input
                                                type="text" class="knob" value="0" data-width="90" data-height="90"
                                                data-fgcolor="#3c8dbc"
                                                style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
                                        </div>
                                        <div class="knob-label">New Visitors</div>
                                    </div>
                                    <div class="col-6 col-md-3 text-center">
                                        <div style="display:inline;width:90px;height:90px;"><canvas width="101"
                                                height="101" style="width: 90px; height: 90px;"></canvas><input
                                                type="text" class="knob" value="0" data-width="90" data-height="90"
                                                data-fgcolor="#3c8dbc"
                                                style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
                                        </div>
                                        <div class="knob-label">New Visitors</div>
                                    </div>
                                    <div class="col-6 col-md-3 text-center">
                                        <div style="display:inline;width:90px;height:90px;"><canvas width="101"
                                                height="101" style="width: 90px; height: 90px;"></canvas><input
                                                type="text" class="knob" value="0" data-width="90" data-height="90"
                                                data-fgcolor="#3c8dbc"
                                                style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
                                        </div>
                                        <div class="knob-label">New Visitors</div>
                                    </div>
                                    <div class="col-6 col-md-3 text-center">
                                        <div style="display:inline;width:90px;height:90px;"><canvas width="101"
                                                height="101" style="width: 90px; height: 90px;"></canvas><input
                                                type="text" class="knob" value="89" data-width="90" data-height="90"
                                                data-fgcolor="green" disabled
                                                style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; appearance: none;">
                                        </div>
                                        <div class="knob-label">New Visitors</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/.content -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/footer.php");
        ?>
        <!-- ./wrapper -->
        <!-- links script -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/links.php");
        ?>
        <script src="/Projet-fil-rouge/code-source/Views/Assets/script/client.js"></script>
        <script>

        </script>
        <script>
            $(function () {
                /* jQueryKnob */

                $('.knob').knob({
                    // change: function (value) {
                    //     console.log("change : " + value);
                    // },
                    // release: function (value) {
                    //     console.log("release : " + value);
                    // },
                    // cancel: function () {
                    //     console.log("cancel : " + this.value);
                    // },
                    draw: function () {

                        // "tron" case
                        if (this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                                ,
                                sa = this.startAngle          // Previous start angle
                                ,
                                sat = this.startAngle         // Start angle
                                ,
                                ea                            // Previous end angle
                                ,
                                eat = sat + a                 // End angle
                                ,
                                r = true

                            this.g.lineWidth = this.lineWidth

                            this.o.cursor
                                && (sat = eat - 0.3)
                                && (eat = eat + 0.3)

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.value)
                                this.o.cursor
                                    && (sa = ea - 0.3)
                                    && (ea = ea + 0.3)
                                this.g.beginPath()
                                this.g.strokeStyle = this.previousColor
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                                this.g.stroke()
                            }

                            this.g.beginPath()
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                            this.g.stroke()

                            this.g.lineWidth = 2
                            this.g.beginPath()
                            this.g.strokeStyle = this.o.fgColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
                            this.g.stroke()

                            return false
                        }
                    }
                })
                /* END JQUERY KNOB */

                //INITIALIZE SPARKLINE CHARTS
                // var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
                // var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
                // var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })

                // sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
                // sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
                // sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])
            })

        </script>
</body>

</html>