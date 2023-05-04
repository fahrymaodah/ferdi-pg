				</div>
	            <!-- END: Content -->
	        </div>
	    </div>

	    <!-- BEGIN: JS Assets-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
	    <script src="<?php echo base_url('assets/js/app.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.4.min.js') ?>"></script>

		<script type="text/javascript">
			var pesan = '<?php echo $this->session->flashdata('pesan') ?>';
			if (pesan != '') { notif(pesan); }

	        // $('#pay-button').click(function(event) {
	        //     event.preventDefault();
	        //     $(this).attr('disabled', 'disabled');

	        //     var nama		= $('#nama').val();
	        //     var email		= $('#email').val();
	        //     var no_hp		= $('#no_hp').val();
	        //     var provinsi	= $('#provinsi').val();
	        //     var kota		= $('#kota').val();
	        //     var id_user		= $('#id_user').val();
	        //     var alamat		= $('#alamat').val();
	        //     var ekspedisi	= $('#ekspedisi').val();
	        //     var kode_pos	= $('#kode_pos').val();
	        //     var total		= $('#total').val();

	        //     $.ajax({
	        //         type: 'post',
	        //         url: '<?= site_url() ?>/snap/token',
	        //         data: {
	        //             nama: nama,
	        //             email: email,
	        //             no_hp: no_hp,
	        //             provinsi: provinsi,
	        //             kota: kota,
	        //             alamat: alamat,
	        //             ekspedisi: ekspedisi,
	        //             kode_pos: kode_pos,
	        //             id_user: id_user,
	        //             total: total
	        //         },
	        //         cache: false,
	        //         success: function(data) {
	        //             var resultType = document.getElementById('result-type');
	        //             var resultData = document.getElementById('result-data');

	        //             function changeResult(type, data) {
	        //                 $("#result-type").val(type);
	        //                 $("#result-data").val(JSON.stringify(data));
	        //             }

	        //             snap.pay(data, {
	        //                 onSuccess: function(result) {
	        //                     changeResult('success', result);
	        //                     console.log(result.status_message);
	        //                     console.log(result);
	        //                     $("#payment-form").submit();
	        //                 },
	        //                 onPending: function(result) {
	        //                     changeResult('pending', result);
	        //                     console.log(result.status_message);
	        //                     $("#payment-form").submit();
	        //                 },
	        //                 onError: function(result) {
	        //                     changeResult('error', result);
	        //                     console.log(result.status_message);
	        //                     $("#payment-form").submit();
	        //                 }
	        //             });
	        //         }
	        //     });
	        // });
		</script>
	</body>
</html>