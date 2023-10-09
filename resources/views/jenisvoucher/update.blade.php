<div class="sec_box hgi-100">
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        @foreach ($data as $index => $item)
            <div class="sec_form">
                <div class="sec_head_form">
                    <h3>{{ $title }}</h3>
                    <span>Edit {{ $title }}</span>
                    <input type="hidden" name="id[]" value="{{ $item->id }}" {{ $disabled }}>
                </div>
                <div class="list_form">
                    <span class="sec_label">Index</span>
                    <select id="index" name="index[]" {{ $disabled }}>
                        <option value="0" {{ $item->index == '0' ? 'selected' : '' }}>0</option>
                        <option value="1" {{ $item->index == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $item->index == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $item->index == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $item->index == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $item->index == '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $item->index == '6' ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $item->index == '7' ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $item->index == '8' ? 'selected' : '' }}>8</option>
                        <option value="9" {{ $item->index == '9' ? 'selected' : '' }}>9</option>
                        <option value="10" {{ $item->index == '10' ? 'selected' : '' }}>10</option>
                        <option value="11" {{ $item->index == '11' ? 'selected' : '' }}>11</option>
                        <option value="12" {{ $item->index == '12' ? 'selected' : '' }}>12</option>
                        <option value="13" {{ $item->index == '13' ? 'selected' : '' }}>13</option>
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Nama</span>
                    <input type="text" id="nama" name="nama[]" placeholder="Masukkan Nama" required
                        {{ $disabled }} value="{{ $item->nama }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Saldo Point</span>
                    <input type="text" id="saldo_point" name="saldo_point[]" placeholder="Masukkan Saldo Point"
                        {{ $disabled }} value="{{ $item->saldo_point }}" oninput="formatCurrency(this)" required>

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
                url: "/jenisvoucher/update",
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
                            $('.aplay_code').load('/jenisvoucher',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/jenisvoucher');
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
            $('.aplay_code').load('/jenisvoucher', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/jenisvoucher');
            });
        });


    });
</script>
