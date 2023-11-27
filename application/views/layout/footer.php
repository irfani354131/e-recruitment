<!-- Essential javascripts for application to work-->
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datetimepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable();
  $('#sampleTable2').DataTable();
  $('#sampleTable3').DataTable();
  $('#sampleTable4').DataTable();
  $('#sampleTable5').DataTable();
  $('#sampleTable6').DataTable();
  $('#sampleTable7').DataTable();
</script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo base_url('assets/js/plugins/pace.min.js') ?>"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/chart.js') ?>"></script>

<script type="text/javascript">
  var data = {
    labels: ["January", "February", "March", "April", "May"],
    datasets: [{
        label: "My First dataset",
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "rgba(220,220,220,1)",
        pointColor: "rgba(220,220,220,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56]
      },
      {
        label: "My Second dataset",
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: [28, 48, 40, 19, 86]
      }
    ]
  };
  var pdata = [{
      value: 300,
      color: "#46BFBD",
      highlight: "#5AD3D1",
      label: "Complete"
    },
    {
      value: 50,
      color: "#F7464A",
      highlight: "#FF5A5E",
      label: "In-Progress"
    }
  ]

  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);

  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var pieChart = new Chart(ctxp).Pie(pdata);
</script>
<!-- Google analytics script-->
<script type="text/javascript">
  if (document.location.hostname == 'pratikborsadiya.in') {
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-72504830-1', 'auto');
    ga('send', 'pageview');
  }
</script>
<script type="text/javascript">
  $('#notifikasi').delay(5000).slideUp('slow');
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.time').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      todayBtn: true,
      autoclose: true,
      pickerPosition: "top-left"
    });
  });
</script>

<script>
  $("#id_lowongan").change(function() {
    //alert($(this).find(':selected').data('perusahaan'));
    var perusahaan = $(this).find('option:selected').attr('data-idperusahaan');
    $('#idperusahaan').val(perusahaan);
  });
</script>

<script type="text/javascript">
  var list = {
    '2': '#answer-2',
  };

  $('select[name=subtes]').change(function() {

    $('.hide').hide();

    var value = $(this).val();

    if (value in list) {
      $(list[value]).show();
    }
  });
</script>


</body>

</html>