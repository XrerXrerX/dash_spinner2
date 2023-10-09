<div class="sec_box hgi-100">
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        @foreach ($data as $index => $items)
            @php
                $item = (object) $items;
            @endphp
            <div class="sec_form">
                <div class="sec_head_form">
                    <h3>{{ $title }}</h3>
                    <span>Edit {{ $title }}</span>
                    <input type="hidden" name="id[]" value="{{ $item->id }}" {{ $disabled }}>
                </div>
                <div class="list_form">
                    <span class="sec_label">Website</span>
                    <input type="text" name="website[]" value="{{ $item->website }}" readonly {{ $disabled }}>
                </div>
                <div class="list_form">
                    <span class="sec_label">Link</span>
                    <input type="text" id="linkalternatif1" name="linkalternatif1[]" placeholder="Masukkan Link"
                        required {{ $disabled }} value="{{ $item->linkalternatif1 }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Livechat</span>
                    <input type="text" id="livechat" name="livechat[]" placeholder="Masukkan Link Livechat" required
                        {{ $disabled }} value="{{ $item->livechat }}">
                </div>

            </div>
        @endforeach
        <div class="sec_button_form">
            <button class="sec_botton btn_submit" type="submit" id="Contactsubmit" {{ $disabled }}>Submit</button>
            <a href="#" id="cancel"><button type="button" class="sec_botton btn_cancel">Cancel</button></a>
        </div>
    </form>
</div>

<script>
    function formatCurrency(input) {
        // Hapus semua karakter selain angka
        var number = input.value.replace(/[^0-9]/g, '');

        // Ubah nilai menjadi format uang dengan pemisah ribuan (tanpa simbol mata uang)
        var formatted = new Intl.NumberFormat('id-ID').format(number);

        // Periksa apakah input adalah kosong atau hanya berisi nol
        if (number === '' || parseInt(number) === 0) {
            input.value = '';
        } else {
            // Update nilai input dengan format uang tanpa simbol mata uang
            input.value = formatted;
        }
    }
    $(document).ready(function() {

        $('#form').submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            $('input[type="checkbox"]', this).each(function() {
                var isChecked = $(this).is(':checked') ? 1 : 0;
                formData.append($(this).attr('name'), isChecked);
            });

            $.ajax({
                url: "/linksettings/update",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(result) {
                    if (result.errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.errors
                        });
                    } else {
                        $('.alert-danger').hide();

                        Swal.fire({
                            icon: 'success',
                            title: 'Contactikasi berhasil dikirim!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            $('.aplay_code').load('/linksettings',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/linksettings');
                                });
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat mengirim contact.'
                    });

                    console.log(xhr.responseText);
                }
            });
        });

        $(document).off('click', '#cancel').on('click', '#cancel', function(event) {
            event.preventDefault();
            var namabo = $(this).data('namabo');
            $('.aplay_code').load('/linksettings', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/linksettings');
            });
        });


    });
</script>
