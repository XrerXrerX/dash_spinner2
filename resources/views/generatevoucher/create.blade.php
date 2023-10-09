<style>
    input {
        padding: 10px 10px 10px 20px;
    }
</style>
<div class="sec_box hgi-100">
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        <div class="sec_form">
            <div class="sec_head_form">
                <h3>{{ $title }}</h3>
                <span>Tambah {{ $title }}</span>
            </div>
            <div class="list_form">
                <span class="sec_label">Website</span>
                <input type="hidden" id="isdemo" name="isdemo" value={{ $isdemo }}>
                <select id="bo" name="bo">
                    @foreach ($website as $web)
                        <option value="{{ $web }}">{{ $web }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list_form">
                <span class="sec_label">Target Website</span>
                <select id="target_bo" name="target_bo">
                    @foreach ($website as $web)
                        <option value="{{ $web }}">{{ $web }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list_form">
                <span class="sec_label">Tipe Generate</span>
                <select id="tipe_generate" name="tipe_generate">
                    <option value="0">No Random</option>
                    <option value="1">Random</option>
                </select>
            </div>
            <div class="list_form" id="tbudget" style="display: none">
                <span class="sec_label">Budget</span>
                <input type="text" id="total_budget" name="total_budget" placeholder="0" onkeyup="formatAngka(this);"
                    value="0" required>
            </div>
            <div class="list_form">
                <span class="sec_label">Jumlah</span>
                <input type="number" id="jumlah" name="jumlah" min="1" placeholder="0" required>
            </div>

            <div class="list_form" id="norandom">
                <span class="sec_label">Jenis Voucher</span>
                <select id="jenis_voucher" name="jenis_voucher">
                    @foreach ($jenis_voucher as $jenvoucher)
                        <option value="{{ $jenvoucher->index }}">{{ $jenvoucher->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100" id="random" style="display: none">
                <div class="w-100 pb-10">
                    <span>Jenis Voucher :</span>
                </div>
                <div class="row">
                    @foreach ($jenis_voucher as $jenvoucher)
                        <div class="col-4">
                            <div class="row">
                                <div class="col-4">
                                    <input type="checkbox" id="jenis_voucher" name="jenis_voucher[]"
                                        value="{{ $jenvoucher->index }}" data-saldo="{{ $jenvoucher->saldo_point }}">
                                    <span>{{ $jenvoucher->nama }}</span>
                                </div>
                                <div class="col-6">
                                    <input type="number" id="presentase" name="presentase[]" min="1"
                                        max="100" placeholder="0 %">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h3 class="total_budget text-primary" style="display: none; margin-top: 20px;">

                </h3>
                <p class="error_presentase text-danger" style="display: none; margin-top: 20px; font-size: 12px">
                    * Total presentase yang Anda masukkan tidak boleh melebihi 100%
                </p>

            </div>
            <div class="list_form">
                <span class="sec_label">Tanggal</span>
                <input type="date" id="tgl_exp" name="tgl_exp" value="{{ $datenow }}">
            </div>

            <div class="list_form">
                <span class="sec_label">Keterangan</span>
                <textarea name="keterangan" id="keterangan" cols="30" rows="3" placeholder="Keterangan"></textarea>
            </div>
        </div>
        <div class="sec_button_form">
            <button class="sec_botton btn_submit" type="submit" id="Contactsubmit">Submit</button>
            <a href="#" id="cancel"><button type="button" class="sec_botton btn_cancel">Cancel</button></a>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('input[name="presentase[]"]').on('input', function() {
            // var totalJumlah = 0;

            // $('input[name="presentase[]"]').each(function() {
            //     var presentaseValue = parseFloat($(this).val());

            //     if (!isNaN(presentaseValue)) {
            //         totalJumlah += presentaseValue;
            //     }
            // });
            // if (totalJumlah > 100) {

            //     $('.error_presentase').show();
            // } else {
            //     $('.error_presentase').hide();
            // }
            setJumlah();
        });

        $('input[name="jenis_voucher[]"]').on('change', function() {

            // var isChecked = $('input[name="jenis_voucher[]"]:checked').length > 0;

            // if (isChecked) {
            //     $('.total_budget').text('Budget: 5.000').show();
            // } else {

            // }

            setJumlah();
        });


        function setJumlah() {
            var jenisVoucherValue = $('input[name="jenis_voucher[]"]:checked').val();
            var totalBudgetValue = $('#total_budget').val();
            totalBudgetValue = totalBudgetValue.replace(/,/g, '');
            var JumlahVoucher = $('#jumlah').val();
            // var presentase = $('input[name="presentase[]"]').val();

            var Jenis_voucher = [];
            var voucher_saldo = [];
            var selectedIndexes = [];
            var total_presentase = [];
            var jumlah_budget = 0;



            $("input[name='jenis_voucher[]']:checked").each(function() {
                selectedIndexes.push($('input[name="jenis_voucher[]"]').index(this));
                Jenis_voucher.push($(this).val());
                voucher_saldo.push($(this).data('saldo'));
            });

            if (selectedIndexes.length != 0) {

                $.each(selectedIndexes, function(index, selectedIndex) {
                    var nilaiInput = $('input[name="presentase[]"]').eq(selectedIndex).val();
                    total_presentase.push(nilaiInput);
                });

            }

            Jenis_voucher.forEach(function(item, index) {
                // console.log(total_presentase[index] / 100);
                jumlah_budget += ((total_presentase[index] / 100) * JumlahVoucher) * voucher_saldo[
                    index];

            });

            var BudgetTotal = $(".total_budget");
            BudgetTotal.text("Total Budget: " + jumlah_budget.toLocaleString()).show();


            if (jumlah_budget > totalBudgetValue) {
                BudgetTotal.css("color", "var(--danger-color)");
                Swal.fire({
                    icon: 'error',
                    title: 'Cek kembali ...',
                    text: 'Nominal melebihi budget ' + (totalBudgetValue - jumlah_budget)
                        .toLocaleString() + ' !'
                });

            } else {
                BudgetTotal.css("color", "");
            }

            const jumlah_persen = total_presentase.reduce((total, value) => {
                if (value === null) {
                    return total;
                }
                return total + parseInt(value);
            }, 0);

            if (jumlah_persen > 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Cek kembali ...',
                    text: 'Presentase yang dimasukkan melebihi 100%'
                });
            }




            // $('.total_budget').text('Buget : ' +).show();

            // $('input[name="jenis_voucher[]"]').each(function() {
            //     var jenis_voucher = $(this).val();
            //     // Lakukan manipulasi atau tindakan lain dengan nilai presentaseValue
            //     console.log(jenis_voucher);
            // });




        }

        $('input[name="total_budget"]').on('input', function() {
            setJumlah();
        });

        $('input[name="jumlah"]').on('input', function() {
            setJumlah();
        });


        $('.js-example-basic-multiple').select2();

        $('#form').submit(function(event) {
            event.preventDefault();

            $('#Contactsubmit').prop('disabled', true);
            // Menggunakan variabel FormData untuk mengumpulkan data formulir


            setTimeout(function() {
                $('#Contactsubmit').prop('disabled', false);
            }, 1000);

            var formData = new FormData(this);

            // Mengambil token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Menambahkan token CSRF dalam data formData
            formData.append('_token', csrfToken);

            $.ajax({
                url: "/generatevoucher/store",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(result) {

                    if (result.errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.errors
                        });
                    } else {
                        $('.alert-danger').hide();

                        // Tampilkan SweetAlert untuk sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Contactikasi berhasil dikirim!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            var isDemo = <?= $isdemo ?>;
                            if (isDemo == '1') {
                                $('.aplay_code').load('/generatevoucherdemo/1',
                                    function() {
                                        adjustElementSize();
                                        localStorage.setItem('lastPage',
                                            '/generatevoucherdemo/1');
                                    });
                            } else {
                                $('.aplay_code').load('/generatevoucher',
                                    function() {
                                        adjustElementSize();
                                        localStorage.setItem('lastPage',
                                            '/generatevoucher');
                                    });
                            }

                        });
                    }
                },
                error: function(xhr) {
                    // Tampilkan SweetAlert untuk kesalahan
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
            var isdemo = '{{ $isdemo }}';
            var search_data = '{{ $search_data }}';
            $('.aplay_code').load('/generatevoucher/' + isdemo + '/' + search_data, function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/generatevoucher/' + isdemo + '/' +
                    search_data);
            });
        });

        $('#tipe_generate').on('change', function() {
            var tipe_generate = $(this).val();

            if (tipe_generate == '0') {
                $('#norandom').show();
                $('#random').hide();
                $('#tbudget').hide();
            } else if (tipe_generate == '1') {
                $('#norandom').hide();
                $('#random').show();
                $('#tbudget').show();
            }
        });

    });

    function formatAngka(input) {
        var angka = input.value.replace(/\D/g, '');

        angka = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        input.value = angka;
    }
</script>
