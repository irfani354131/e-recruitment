<?php   $this->load->view('layout3/header2') ?>

<?php   $this->load->view('layout3/navbar') ?>



<div class="col-sm-12 main">



	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3>Soal Latihan</h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time"></span> detik</h4>

		</div>

	</div><!--/.row-->

<!-- 

	<iframe style="margin-top: -60px;" id="frame" src="<?php echo base_url('Pelamar/Ujian/frame_latihan_cfit/') ?>" width="100%" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';"  frameborder="0">Browser Anda Tidak Mendukung Iframe, Silahkan Perbaharui Browser Anda.</iframe>

-->



<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">

	<h4 style="color: #fff;"><b>Petunjuk Pengerjaan Subtes 1</b></h4>

	<p style="color: #fff;">Disetiap soal terdapat 4 buah kotak, dimana 3 kotak diantaranya sudah terisi dengan gambar dengan pola tertentu yang berurutan. Tugas anda, carilah 1 gambar untuk mengisi kotak kosong terakhir berdasarkan 5 pilihan jawaban yang tersedia sehingga menjadi berurutan satu sama lain.</p><br>

	<p style="color: #fff;">Contoh soal:</p>

	<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/contoh1.jpg') ?>" class="img-responsive" alt="" style="width: 300px; margin: 10px; border-radius: 5px;">

	<div class="form-check col-sm-1 text-center" style="margin: 5px;">

		<p style="color: #fff;">a</p>

		<center>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

		</center>

	</div>

	<div class="form-check col-sm-1 text-center" style="margin: 5px;">

		<p style="color: #fff;">b</p>

		<center>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

		</center>

	</div>

	<div class="form-check col-sm-1 text-center" style="margin: 5px;">

		<p style="color: #fff;">c</p>

		<center>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

		</center>

	</div>

	<div class="form-check col-sm-1 text-center" style="margin: 5px;">

		<p style="color: #fff;">d</p>

		<center>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

		</center>

	</div>

	<div class="form-check col-sm-1 text-center" style="margin: 5px;">

		<p style="color: #fff;">e</p>

		<center>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

		</center>

	</div>

	<div class="form-check col-sm-1 text-center" style="margin: 5px;">

		<p style="color: #fff;">f</p>

		<center>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1f.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

		</center>

	</div>

	<p class="col-sm-12" style="color: #fff; margin: 10px;">Jawaban: (c) karena ranting pohon perlahan bergerak ke kanan.</p>

</div>



<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">

	<p>Soal dibawah ini merupakan soal latihan sebelum mengerjakan subtes 1. Cobalah untuk mengerjakan contoh soal di bawah ini! Apapun jawaban anda pada tahap latihan ini tidak akan dihitung poinnya.</p>

	<div class="col-sm-12">



		<?php $idUjian = $this->session->userdata('ses_ujian'); 

		$id_pelamar = $this->session->userdata('ses_id');



		$ujian = $this->db->query("SELECT * FROM tb_ujian WHERE id_ujian = $idUjian");

		foreach ($ujian->result() as $key ) {

			$end_lat1 = $key->end_lat_sub1;

		}

		?>

		<form method="post" action="<?php  echo base_url('Pelamar/Pelamar/jawabancontoh/'.$idUjian . '/' . $id_pelamar) ?>">

			

			<p>1.</p>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/contoh2.jpg') ?>" class="img-responsive" alt="" style="width: 300px; margin: 10px; border-radius: 5px;">

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit11">a</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="a">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit11">b</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="b">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit11">c</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="c">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit11">d</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="d">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit11">e</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="e">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit11">f</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="f">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2f.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

		</div>

		<div class="col-sm-12" style="margin-top: 10px;">

			<p>2.</p>

			<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/contoh3.jpg') ?>" class="img-responsive" alt="" style="width: 300px; margin: 10px; border-radius: 5px;">

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit12">a</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="a">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit12">b</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="b">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit12">c</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="c">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit12">d</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="d">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit12">e</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="e">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>

			<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">

				<label class="form-check-label" for="latcfit12">f</label>

				<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="f">

				<center>

					<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3f.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">

				</center>

			</div>





		</div>

	</div>



</div>

<div class="col-sm-12">

</div>

</div><!--/.row-->

</div>	<!--/.main-->



<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">

	<button type="submit" class="btn btn-primary mr-2 mb-2">Selanjutnya</button>

</form>

</div>



<script type="text/javascript">

  var countDownDate = new Date("<?php echo $end_lat1 ?>").getTime();



// Update the count down every 1 second

var x = setInterval(function() {



  // Get today's date and time

  var now = new Date().getTime();



  // Find the distance between now and the count down date

  var distance = countDownDate - now;



  // Time calculations for days, hours, minutes and seconds

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));

  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

  var seconds = Math.floor((distance % (1000 * 60)) / 1000);



  // Display the result in the element with id="demo"

  document.getElementById("time").innerHTML = minutes + " : " + seconds + " ";



  // If the count down is finished, write some text

  if (distance < 0) {

    clearInterval(x);

    // document.getElementById("time").innerHTML = "EXPIRED";

    alert('Waktu latian subtes 1 sudah berakhir, selamat mengerjakan subtes 1');

    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian/'.$idUjian.'/1'); ?>';



    // document.getElementById('hentikan').click();

  }

}, 1000);



</script>

<?php   $this->load->view('layout3/footer') ?>