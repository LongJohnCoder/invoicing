        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.2.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{{url('/')}}/public/bootstrap/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{url('/')}}/public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{url('/')}}/public/bootstrap/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="{{url('/')}}/public/bootstrap/js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="{{url('/')}}/public/bootstrap/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="{{url('/')}}/public/bootstrap/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="{{url('/')}}/public/bootstrap/js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="{{url('/')}}/public/bootstrap/js/Director/dashboard.js" type="text/javascript"></script>
        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#submit_passChange').click(function(){
                    var pass = $('#new_pass').val();
                    var conf_pass = $('#conf_new_pass').val();
                    // console.log(pass+conf_pass);
                    // return false;
                    if (pass == conf_pass) 
                    {
                        return true;
                    }
                    else
                    {
                        $('#confPassMismatch').show();
                        return false;
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#stripe_super').click(function(){
                    $('#payment_div').hide();
                    $('#show_stripe').show();
                });
                $('#auth_super').click(function(){
                    $('#payment_div').hide();
                    $('#show_auth').show();
                });
            });
        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
        </script>
        <script type="text/javascript">
            $(function() {
                        "use strict";
                        //BAR CHART
                        var data = {
                            labels: ["January", "February", "March", "April", "May", "June", "July"],
                            datasets: [
                                {
                                    label: "My First dataset",
                                    fillColor: "rgba(220,220,220,0.2)",
                                    strokeColor: "rgba(220,220,220,1)",
                                    pointColor: "rgba(220,220,220,1)",
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "rgba(220,220,220,1)",
                                    data: [65, 59, 80, 81, 56, 55, 40]
                                },
                                {
                                    label: "My Second dataset",
                                    fillColor: "rgba(151,187,205,0.2)",
                                    strokeColor: "rgba(151,187,205,1)",
                                    pointColor: "rgba(151,187,205,1)",
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "rgba(151,187,205,1)",
                                    data: [28, 48, 40, 19, 86, 27, 90]
                                }
                            ]
                        };
                    new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                        responsive : true,
                        maintainAspectRatio: false,
                    });

                    });
                    // Chart.defaults.global.responsive = true;
        </script>