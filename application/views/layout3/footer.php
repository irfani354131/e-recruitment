	<script src="<?php echo base_url('assets3/js/jquery-1.11.1.min.js') ?>"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="<?php echo base_url('assets3/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets3/js/chart.min.js') ?>"></script>
	<script src="<?php echo base_url('assets3/js/chart-data.js') ?>"></script>
	<script src="<?php echo base_url('assets3/js/easypiechart.js') ?>"></script>
	<script src="<?php echo base_url('assets3/js/easypiechart-data.js') ?>"></script>
	<!-- <script src="<?php echo base_url('assets3/js/bootstrap-datepicker.js') ?>"></script> -->

	<script type="text/javascript">
	  var maxBirthdayDate = new Date();
	  maxBirthdayDate.setFullYear(maxBirthdayDate.getFullYear() - 18);

	  $("#datepicker").datepicker({
	    dateFormat: 'yy-mm-dd',
	    changeMonth: true,
	    changeYear: true,
	    maxDate: maxBirthdayDate
	  });
	</script>

	<script src="<?php echo base_url('assets3/js/custom.js') ?>"></script>

	<script>
	  $(document).on('keydown', 'input[pattern]', function(e) {
	    var input = $(this);
	    var oldVal = input.val();
	    var regex = new RegExp(input.attr('pattern'), 'g');

	    setTimeout(function() {
	      var newVal = input.val();
	      if (!regex.test(newVal)) {
	        input.val(oldVal);
	      }
	    }, 0);
	  });
	</script>



	<!-- <script>
    window.onload = function () {
     var chart1 = document.getElementById("line-chart").getContext("2d");
     window.myLine = new Chart(chart1).Line(lineChartData, {
      responsive: true,
      scaleLineColor: "rgba(0,0,0,.2)",
      scaleGridLineColor: "rgba(0,0,0,.05)",
      scaleFontColor: "#c5c7cc"
    });
   };
 </script> -->

	<script type="text/javascript">
	  $('#notifikasi').delay(3000).slideUp('slow');
	</script>

	<script type="text/javascript">
	  $(document).ready(function() {
	    $('#save').click(function() {

	      var id_pelamar = [];
	      var id_soal = [];
	      var jawaban_soal = [];

	      $('#id_pelamar').each(function() {
	        id_pelamar.push($(this).text());
	      });

	      $('#id_soal').each(function() {
	        id_soal.push($(this).text());
	      });

	      $('#jawaban_soal').each(function() {
	        jawaban_soal.push($(this).text());
	      });

	      $.ajax({
	        url: "localhost/choise/Pelamar/Lamaran/apply",
	        method: "POST",
	        data: {
	          id_pelamar: id_pelamar,
	          id_soal: id_soal,
	          jawaban_soal: jawaban_soal
	        },
	        success: function(data) {
	          fetch_item_data();
	        }
	      });

	    });
	  });

	  function fetch_item_data() {
	    $.ajax({
	      url: "<?php echo base_url("Pelamar/Lamaran/lowongantersedia") ?>",
	      method: "POST",
	    })
	  }
	</script>

	<script type="text/javascript">
	  var btnUpload = $("#upload_file"),
	    btnOuter = $(".button_outer");
	  btnUpload.on("change", function(e) {
	    var ext = btnUpload.val().split('.').pop().toLowerCase();
	    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
	      $(".error_msg").text("Format file bukan gambar ...");
	    } else {
	      $(".error_msg").text("");
	      btnOuter.addClass("file_uploading");
	      setTimeout(function() {
	        btnOuter.addClass("file_uploaded");
	      }, 3000);
	      var uploadedFile = URL.createObjectURL(e.target.files[0]);
	      setTimeout(function() {
	        $("#uploaded_view").append('<img src="' + uploadedFile + '" />').addClass("show");
	      }, 3500);
	    }
	  });
	  $(".file_remove").on("click", function(e) {
	    $("#uploaded_view").removeClass("show");
	    $("#uploaded_view").find("img").remove();
	    btnOuter.removeClass("file_uploading");
	    btnOuter.removeClass("file_uploaded");
	  });
	</script>

	<script type="text/javascript">
	  var password = document.getElementById("password"),
	    confirm_password = document.getElementById("confirm_password");

	  function validatePassword() {
	    if (password.value != confirm_password.value) {
	      confirm_password.setCustomValidity("Passwords Tidak Sama");
	    } else {
	      confirm_password.setCustomValidity('');
	    }
	  }

	  password.onchange = validatePassword;
	  confirm_password.onkeyup = validatePassword;
	</script>


	<script type="text/javascript">
	  var message = "Function right click is Disabled!";

	  function clickIE4() {
	    if (event.button == 2) {
	      alert(message);
	      return false;
	    }
	  }

	  function clickNS4(e) {
	    if (document.layers || document.getElementById && !document.all) {
	      if (e.which == 2 || e.which == 3) {
	        alert(message);
	        return false;
	      }
	    }
	  }
	  if (document.layers) {
	    document.captureEvents(Event.MOUSEDOWN);
	    document.onmousedown = clickNS4;
	  } else if (document.all && !document.getElementById) {
	    document.onmousedown = clickIE4;
	  }
	  document.oncontextmenu = new Function("return false");
	</script>
	<!--IE=internet explorer 4+ dan NS=netscape 4+0-->
	<script type="text/javascript">
	  var message = "Function right click is Disabled!";

	  function clickIE4() {
	    if (event.button == 2) {
	      alert(message);
	      return false;
	    }
	  }

	  function clickNS4(e) {
	    if (document.layers || document.getElementById && !document.all) {
	      if (e.which == 2 || e.which == 3) {
	        alert(message);
	        return false;
	      }
	    }
	  }
	  //   if(document.layers){
	  //     document.captureEvents(Event.MOUSEDOWN);
	  //     document.onmousedown=clickNS4;
	  //   }else if(document.all&&!document.getElementById){
	  //     document.onmousedown=clickIE4;
	  //   }
	  //   document.oncontextmenu=new Function("return false");

	  //   function copyToClipboard() {

	  //   var aux = document.createElement("input");
	  //   aux.setAttribute("value", "print screen disabled!");      
	  //   document.body.appendChild(aux);
	  //   aux.select();
	  //   document.execCommand("copy");
	  //   // Remove it from the body
	  //   document.body.removeChild(aux);
	  //   alert("Print screen disabled!");
	  // }

	  // $(window).keyup(function(e){
	  //   if(e.keyCode == 44){
	  //     copyToClipboard();
	  //   }
	  // });
	</script>
	<!--IE=internet explorer 4+ dan NS=netscape 4+0-->
	</body>

	</html>