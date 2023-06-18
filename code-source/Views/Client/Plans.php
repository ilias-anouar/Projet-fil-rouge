<!DOCTYPE html>
<html lang="en">

<?php
// include "../Layout/root.php";
include_once(__ROOT__ . "/Views/Layout/head.php");
?>
<style>
    <?php
    include_once(__ROOT__ . "/Views/Assets/css/Client.css");
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
                            <h1>Welcome
                                <?= $_SESSION['user']['First_name'] ?>
                            </h1>
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
                    <h2 class="text-center">Select you Plan or goal</h2>
                    <p class="text-center">To build a custom fitness plan tailored to your needs, please select one of
                        the following plans:
                    </p>
                    <div class="row justify-content-end">
                        <div class="col-sm-12 col-md-6 flex-end">
                            <div id="search" class="dataTables_filter"><input type="search" id="search_plan"
                                    class="form-control" placeholder="Plan name" aria-controls="search_plan">
                            </div>
                        </div>
                    </div>
                    <div class="result">
                        <?php
                        include_once(__ROOT__ . "/Views/Client/Cards.php");
                        // include_once(__ROOT__ . "/Views/Client/form.php");
                        ?>
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