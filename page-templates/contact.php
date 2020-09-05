<div id="err-msg" class="alert alert-danger d-none"></div>
<div id="suc-msg" class="alert alert-success d-none"></div>

<form action="" id="pesan" class="mt-3 say-hi" method="">
    <input class="mb-3" type="text" name="name" placeholder="Nama" id="" required>                               
    <input type="email" name="email" placeholder="Email" id="" required>
    <textarea name="content" id="" placeholder="Pesan" cols="30" rows="5" required></textarea>
    <button type="submit" name="submit" class="btn btn-success">Send</button>
</form>
<script>
    (function($){
        $('#pesan').submit( (e) => {
            e.preventDefault();
            const endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
            const form = $('#pesan').serialize();
            let formData = new FormData;

            formData.append('action', 'pesan');
            formData.append('nonces', '<?php echo wp_create_nonce('ajax-nonce'); ?>');
            formData.append('pesan', form);

            $.ajax(endpoint, {
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: (res) => {
                    console.log(res.data);
                    $('#suc-msg').text('Terima kasih atas saran anda, tunggu balasan kami!').addClass('d-block').fadeOut(1000);
                    $('#pesan').trigger('reset');
                },
                error:  (err) => {
                    console.log(err.responseJSON.data);
                    $('#err-msg').text('Maaf pesan anda gagal dikirim! Mohon hubungi kami secara manual melalui kontak yang disediakan di bawah, terima kasih.').addClass('d-block').fadeOut(1000);
                    $('#pesan').trigger('reset');
                }
            });
        });
    })(jQuery);
</script>