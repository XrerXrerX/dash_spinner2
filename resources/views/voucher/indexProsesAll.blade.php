<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css">
<style>
    .d-none {
        display: none;
    }

    .d-opacity {
        opacity: 0;
    }

    .btn-back {
        width: 10%;
    }

    .form-kode {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 5px;
        padding-bottom: unset;
    }

    .form-kode svg {
        stroke: rgba(var(--rgba-white));
    }

    .form-kode button svg {
        position: relative;
        right: 8px;
        stroke: rgba(var(--rgba-white));
    }

    .form-kode input {
        padding: 10px;
        text-align: center;
    }

    .name {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .name form {
        padding-bottom: unset;
    }

    .name.d-opacity {
        font-size: 0px;
    }
</style>
<div class="sec_table">
    <h2>{{ $title }}</h2>
    {{-- <button class="sec_botton btn_success" onclick="confirmDownloads({{ $id }})">
                Export </button> --}}

    <a href="#" id="refresh">
        <div class="sec_delete">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
            </svg>
            <span>Refresh</span>
        </div>
    </a>
    <table id="tabel-data">
        <tbody>
            <tr class="head_table">
                {{-- <th class="check_box">
                    <input type="checkbox" id="myCheckbox" name="myCheckbox">
                </th> --}}
                <th>Jumlah Hadiah</th>
                <th>Keterangan</th>
                <th>Kode Voucher</th>
                <th></th>
                <th>User Kode</th>

                <th style="width: 100%;">No Rekening</th>
                <th>Tanggal Klaim</th>
                <th>Status Bayar</th>
                <th>Tanggal Exp</th>
                <th>Log</th>
            </tr>
            <tr class="filter_row">
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td>
                    <div class="grubsearchtable">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..." id="searchData-name">
                    </div>
                </td>
                <td></td>

            </tr>
            {{-- isi data --}}


        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        // var inputElem = document.getElementById("search_data");
        // var isiInputElem = inputElem.value;

        // inputElem.addEventListener("input", function() {
        //     var searchValue = this.value.toLowerCase().trim();
        //     loadData(searchValue);
        // });

        function loadData(searchValue = '') {
            var loadingRow = '<tr id="loading-row"><td colspan="3">Loading...</td></tr>';

            $.ajax({
                url: '/vouchertable/' + searchValue,
                type: 'GET',
                beforeSend: function() {
                    $('.filter_row').nextAll('tr').remove();
                    $(loadingRow).insertBefore('.filter_row + tbody');
                },
                success: function(data) {
                    $('#loading-row').remove();
                    $(data).insertAfter('.filter_row');
                },
                error: function() {
                    $('#loading-row').remove();
                }
            });
        }
        loadData();

        // REFRESH BUTTON
        var refreshButton = document.getElementById('refresh');
        var canClick = true;

        function handleClick() {
            if (!canClick) {
                return;
            }

            canClick = false;
            refreshButton.setAttribute('disabled', 'disabled');

            loadData();

            setTimeout(function() {
                canClick = true;
                refreshButton.removeAttribute('disabled');
            }, 1000);
        }

        refreshButton.addEventListener('click', handleClick);

    });
</script>
