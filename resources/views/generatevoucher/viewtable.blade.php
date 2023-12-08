@foreach ($data as $index => $d)
    <tr>
        <td class="check_box" id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}">
            <input type="checkbox" id="myCheckbox-{{ $index }}" name="myCheckbox-{{ $index }}"
                data-id=" {{ $d->id }}">
        </td>
        <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}"><span
                class="name">{{ $d->bo }}</span></td>
        <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}"><span
                class="name">{{ $d->target_bo }}</span></td>
        <td style="overflow:unset;" id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}">
            @if (isAdmin())
                <div class="tooltip">
                    <span class="name">{{ $d->tipe_generate == '1' ? '{ Random }' : $d->nama }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle"
                        width="10" height="10" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M12 9h.01"></path>
                        <path d="M11 12h1v4h1"></path>
                    </svg>
                    <span class="tooltiptext">{{ $d->jen_voucher }}</span>
                </div>
            @else
                <span class="name">{{ $d->tipe_generate == '1' ? '{ Random }' : $d->nama }}</span>
            @endif
        </td>
        <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}">
            <span class="name">{{ $d->keterangan }}</span>
        </td>
        <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}"><span
                class="name">{{ date('d-m-Y', strtotime($d->tgl_create)) }}</span>

        <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}"><span
                style="{{ $d->tgl_exp < date('Y-m-d') ? 'color: rgba(var(--rgba-danger));' : 'color: green;' }}"
                class="name">{{ $d->tgl_exp < date('Y-m-d') ? date('d-m-Y', strtotime($d->tgl_exp)) . ' ( Expire )' : date('d-m-Y', strtotime($d->tgl_exp)) . ' ( Valid )' }}</span>
        </td>
        <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}">
            <span class="name"
                style="{{ $d->isexp == 1 ? 'color: rgba(var(--rgba-danger));' : ($d->total_klaim >= 1 ? 'color: green;' : '') }}">
                {{ $d->total_klaim }}
            </span>
        </td>
        <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}"><span class="name"
                style="{{ $d->ishabis == 1 ? 'color: orange;' : '' }}">{{ $d->jumlah . ($d->ishabis == '1' ? ' (Habis)' : '') }}</span>
        </td>
        @if (isAdmin())
            <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}"><span
                    class="name">{{ number_format($d->total_budget, 0, ',', '.') }}</span></td>
            <td id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}"><span
                    class="name">{{ number_format($d->total, 0, ',', '.') }}</span></td>
            {{-- <td><span class="name">{{ date('d-m-Y H:i:s', strtotime($d->tgl_berita)) }}</span></td> --}}
        @endif
        <td class="kolom_action">
            <div class="dot_action">
                <span>•</span>
                <span>•</span>
                <span>•</span>
            </div>
            <div class="action_crud" id="1" style="display: none;">
                <a href="#" id="view" data-id="{{ $d->id }}" data-ishabis="{{ $d->ishabis }}">
                    <div class="list_action">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                            </path>
                        </svg>
                        <span>View</span>
                    </div>
                </a>
                <a href="#" id="proses" data-id="{{ $d->id }}"
                    data-totalklaim="{{ $d->total_klaim }}">
                    <div class="list_action">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-right"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 12l-10 0" />
                            <path d="M14 12l-4 4" />
                            <path d="M14 12l-4 -4" />
                            <path d="M20 4l0 16" />
                        </svg>
                        <span>Proses</span>
                    </div>
                </a>
                @if (isAdmin())
                    <a href="#" id="print" data-id="{{ $d->id }}"
                        onclick="confirmDownload({{ $d->id }}, '{{ $d->keterangan }}')">
                        <div class="list_action">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                </path>
                                <path d="M8 11h8v7h-8z"></path>
                                <path d="M8 15h8"></path>
                                <path d="M11 11v7"></path>
                            </svg>
                            <span>Print</span>
                        </div>
                    </a>
                @endif
                {{-- <a href="#" id="edit" data-id="{{ $d->id }}">
                    <div class="list_action">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-edit-circle" viewBox="0 0 24 24"
                            stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z">
                            </path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                        </svg>
                        <span>Edit</span>
                    </div>
                </a> --}}
                @if (isAdmin())
                    <a href="#" id="delete" data-id="{{ $d->id }}">
                        <div class="list_action">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0"></path>
                                <path d="M10 11l0 6"></path>
                                <path d="M14 11l0 6"></path>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                            <span>Delete</span>
                        </div>
                    </a>
                @endif
            </div>
        </td>
    </tr>
    @php
        $total_kalimvoucher += $d->total_kalimvoucher;
        $total_voucher += $d->total_voucher;
        $total_pengeluaran += $d->total;
    @endphp
@endforeach
<tr style="background: var(--black-color);">
    <td></td>
    <td colspan="5"><span class="name" style=" float: right;">Total</span></td>
    <td><span class="name">{{ $total_kalimvoucher . '/' . $total_voucher }}</span></td>
    @if (isAdmin())
        <td><span class="totalakhir1" colspan="2">{{ number_format($total_pengeluaran, 0, ',', '.') }}</span>
    @endif
    </td>
    <td></td>
</tr>
<script>
    function confirmDownload(dataId, Keterangan) {
        event.preventDefault();

        Swal.fire({
            title: 'Apakah Anda yakin ingin mendownload?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                exportArrayToExcel(dataId, Keterangan);
            }
        });
    }

    function exportArrayToExcel(dataId, Keterangan) {
        var title = "{{ $title }}";
        var url = "/voucher_print/" + dataId; // Ganti dengan URL rute yang sesuai
        console.log(url);
        fetch(url)
            .then(response => response.json())
            .then(data => {
                var worksheet = XLSX.utils.aoa_to_sheet(data);
                var columnWidths = [{
                        wch: 5
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                ];

                // Mengatur lebar kolom pada sheet
                worksheet["!cols"] = columnWidths;

                var workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet 1");

                var excelBuffer = XLSX.write(workbook, {
                    bookType: "xlsx",
                    type: "array",
                });

                var blob = new Blob([excelBuffer], {
                    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                });

                var downloadLink = document.createElement("a");
                document.body.appendChild(downloadLink);
                downloadLink.href = window.URL.createObjectURL(blob);
                downloadLink.download = Keterangan + " .xlsx"; // Ganti dengan nama file yang diinginkan
                downloadLink.click();
            })
            .catch(error => {
                // // Tangani kesalahan jika terjadi
                console.log(error);
            });
    }
    $(document).ready(function() {
        // Event handler untuk checkbox dengan ID myCheckbox
        $('#myCheckbox').change(function() {
            // Mendapatkan status ceklis checkbox myCheckbox
            var isChecked = $(this).is(':checked');

            $('tbody tr:not([style="display: none;"]) [id^="myCheckbox-"]').prop('checked', isChecked);
        });
    });
    $(document).ready(function() {
        // Sembunyikan elemen dengan ID update saat halaman dimuat
        // $('#update').hide();

        // Event handler untuk checkbox myCheckbox
        $('#myCheckbox, [id^="myCheckbox-"]').change(function() {
            // Periksa apakah setidaknya satu checkbox tercentang
            var isChecked = $('#myCheckbox:checked, [id^="myCheckbox-"]:checked').length > 0;

            // Tampilkan atau sembunyikan elemen update berdasarkan status checkbox tercentang
            if (isChecked) {
                // $('#update').show();
            } else {
                // $('#update').hide();
            }
        });

        $('#update-generatevoucher').off('click').click(function(event) {
            event.preventDefault();

            var checkedValues = [];
            $('input[id^="myCheckbox-"]:checked').each(function() {
                var value = $(this).data('id');
                checkedValues.push(value);
            });
            if (checkedValues == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Silahkan pilih Data!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }


            var parameterString = $.param({
                'values[]': checkedValues
            }, true);
            console.log(parameterString);
            $('.aplay_code').load('/generatevoucher/edit/' + parameterString, function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/generatevoucher/edit/' +
                    parameterString);
            });
        });

        $(document).off('click', '#add-generatevoucher').on('click', '#add-generatevoucher', function(event) {
            event.preventDefault();
            var search_data = document.getElementsByName("search_data")[0]
                .value;
            var url = `/generatevoucheradd/{{ $isdemo }}/${search_data}`;

            $('.aplay_code').load(url, function() {
                adjustElementSize();
                localStorage.setItem('lastPage', url);
            });
        });

        // $(document).off('click', '#add-generatevoucher').on('click', '#add-generatevoucher', function(event) {
        //     event.preventDefault();
        //     $('.aplay_code').load('/generatevoucheradd/{{ $isdemo }}', function() {
        //         adjustElementSize();
        //         localStorage.setItem('lastPage', '/generatevoucheradd/{{ $isdemo }}');
        //     });
        // });
        // $(document).on('click', '#delete', function(event) {
        //     event.preventDefault();
        //     $('.aplay_code').load('/generatevoucher/delete', function() {
        //         adjustElementSize();
        //         localStorage.setItem('lastPage', '/generatevoucher/delete');
        //     });
        // })



        $(document).on('click', '#delete-generatevoucher', function(event) {
            event.preventDefault();

            var checkedValues = [];
            $('input[id^="myCheckbox-"]:checked').each(function() {
                var value = $(this).data('id');
                checkedValues.push(value);
            });

            if (checkedValues.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Silahkan pilih Data!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return; // Menghentikan eksekusi jika tidak ada item yang dipilih
            }

            var parameterString = $.param({
                'values[]': checkedValues
            }, true);
            var url =
                "/generatevoucher/delete/"; // Ubah URL sesuai dengan endpoint delete yang sesuai

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            values: checkedValues
                        },
                        success: function(result) {
                            // Tampilkan SweetAlert untuk sukses
                            Swal.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                // Lakukan perubahan halaman atau tindakan lainnya setelah data berhasil dihapus
                                $('.aplay_code').load(
                                    '/generatevoucher',
                                    function() {
                                        adjustElementSize();
                                        localStorage.setItem('lastPage',
                                            '/generatevoucher');
                                    });
                            });
                        },
                        error: function(xhr) {
                            // Tampilkan SweetAlert untuk kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan saat menghapus data.'
                            });

                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
        $(document).off('click', '#view').on('click', '#view', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var ishabis = $(this).data('ishabis');
            var isdemo = "{{ $isdemo }}";
            var search_data = document.getElementsByName("search_data")[0].value;

            if (ishabis == '1') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Seluruh voucher telah digunakan, Silahkan gunakan kode voucher lainnya.'
                });
                return;
            }
            $('.aplay_code').empty();
            $('.aplay_code').load('/voucher/' + id + '/' + isdemo + '/' + encodeURIComponent(
                search_data), function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/voucher/' + id + '/' + isdemo + '/' +
                    encodeURIComponent(search_data));
            });
        });

        $(document).off('click', '#proses').on('click', '#proses', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var totalklaim = $(this).data('totalklaim');
            var isdemo = "{{ $isdemo }}";
            var search_data = document.getElementsByName("search_data")[0].value;
            if (totalklaim == 0) {
                // Swal.fire({
                //     icon: 'warning',
                //     title: 'Oops...',
                //     text: 'Belum ada user yang klaim, Silahkan pilih voucher yang lain.'
                // });
                // return;
            }
            $('.aplay_code').empty();
            $('.aplay_code').load('/voucherproses/' + id + '/' + isdemo + '/' + search_data,
                function() {
                    adjustElementSize();
                    localStorage.setItem('lastPage', '/voucherproses/' + id + '/' + isdemo + '/' +
                        search_data);
                });
        });


        $(document).off('click', '#edit').on('click', '#edit', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $('.aplay_code').empty();
            $('.aplay_code').load('/generatevoucher/edit/' + id, function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/generatevoucher/edit/' + id);
            });
        });

        $(document).on('click', '#delete', function(event) {
            event.preventDefault();

            var id = $(this).data('id');
            var url =
                "/generatevoucher/delete/"; // Ubah URL sesuai dengan endpoint delete yang sesuai

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            values: id
                        },
                        success: function(result) {
                            // Tampilkan SweetAlert untuk sukses
                            Swal.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                // Lakukan perubahan halaman atau tindakan lainnya setelah data berhasil dihapus
                                $('.aplay_code').load(
                                    '/generatevoucher',
                                    function() {
                                        adjustElementSize();
                                        localStorage.setItem('lastPage',
                                            '/generatevoucher');
                                    });
                            });
                        },
                        error: function(xhr) {
                            // Tampilkan SweetAlert untuk kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan saat menghapus data.'
                            });

                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });

        const isAdmin = "<?php echo isAdmin(); ?>";

        if (isAdmin) {
            const totalakhir1 = document.querySelector('.totalakhir1');
            const totalakhir2 = document.querySelector('.totalakhir2');
            const isi_totalakhir1 = totalakhir1.innerText;
            totalakhir2.innerText = 'Rp ' + isi_totalakhir1;
        }



        function clickRefreshButton() {
            var refreshButton = document.getElementById('refresh');
            if (refreshButton) {
                refreshButton.click();
            }
        }

        // clickRefreshButton();
    });
</script>
