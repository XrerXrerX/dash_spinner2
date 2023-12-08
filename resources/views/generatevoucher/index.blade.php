<style>
    .group_act_butt {
        display: flex;
        align-items: flex-end;
        justify-content: flex-start;
        gap: 10px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css">
<div class="sec_table">
    <h2>{{ $title }}</h2>

    <div class="centered-div">
        <div class="group_act_butt">
            @if (isAdmin())
                <a href="#" id="add-generatevoucher">
                    <div class="sec_addnew">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-plus"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z">
                            </path>
                            <path d="M9 12l6 0"></path>
                            <path d="M12 9l0 6"></path>
                        </svg>
                        <span>Generate</span>
                    </div>
                </a>
            @endif
            {{-- <div class="all_act_butt">
                <a href="#" id="update-generatevoucher">
                    <div class="sec_edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                            <path d="M16 5l3 3"></path>
                        </svg>
                        <span>Edit</span>
                    </div>
                </a> --}}
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

            @if (isAdmin())
                <a href="#" id="delete-generatevoucher">
                    <div class="sec_delete">
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
            {{-- <div class="list_form" style="margin-left: auto;
            width: max-content;">
                <input type="text" id="search_data" name="search_data" min="1" placeholder="Search ..."
                    required="" style="border: var(--border-primary);" value={{ $search_data }}>
            </div> --}}
        </div>
        @if (isAdmin())
            <span class="badge badge-danger bg-gradient-success"
                style="
        border: 3px solid #ffffff75;
        padding: 5px;
        width: 20%;
        border-radius: 6px;
        background-image: linear-gradient(310deg, #17ad37 0%, #98ec2d 100%);
        ">
                <p
                    style="
        margin: 0;
        color: #000000c9;
        font-weight: 700;
        border-bottom: 1px solid #0000004f;
        font-size: 12px;
        ">
                    TOTAL PENGELUARAN</p>
                <h5
                    style="
        margin: 5px 0 0 0;
        letter-spacing: 1px;
        color: white;
        text-shadow: 0.5px 1px 1px #0000005e;
        font-size: 15px;
        ">
                    <span class="totalakhir2">Rp 0</span>

                </h5>

            </span>
        @endif
    </div>
    <div class="div-search">
        <table>
            <tbody>
                <tr class="head_table">
                    <th class="check_box">
                        <input type="checkbox" id="myCheckbox" name="myCheckbox">
                    </th>
                    <th>Website</th>
                    <th>Target Website</th>
                    <th>Jenis Voucher</th>
                    <th>Keterangan</th>
                    <th>Tanggal Buat</th>
                    <th>Tanggal Exp</th>
                    <th>User Klaim</th>
                    <th>Jumlah</th>
                    @if (isAdmin())
                        <th>Budget</th>
                        <th>Pengeluaran</th>
                    @endif
                    <th>Action</th>
                </tr>
                <tr class="filter_row">
                    <td></td>
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
                    {{-- <td>
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
                    </td> --}}
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

                            <input type="text" placeholder="Cari data..." id="searchData-name" name="search_data"
                                value="{{ $search_data }}">
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
            </tbody>
        </table>
        <div id="loading-spinner" class="loading-spinner" style="display: none;">
            <!-- Tambahkan elemen loading spinner di sini (contoh: animasi putar) -->
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

</div>

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
    $(document).ready(function() {
        var inputElem = document.getElementsByName("search_data")[0];
        var isiInputElem = inputElem.value;

        inputElem.addEventListener("input", function() {
            var searchValue = this.value.toLowerCase().trim();
            loadData(searchValue);
        });

        function loadData(searchValue = '') {
            var isdemo = "{{ $isdemo }}";
            var loadingRow = '<tr id="loading-row"><td colspan="3">Loading...</td></tr>';

            $.ajax({
                url: '/viewtablegenerate/' + isdemo + '/' + searchValue,
                type: 'GET',
                beforeSend: function() {
                    $('.filter_row').nextAll('tr').remove();
                    $(loadingRow).insertBefore('.filter_row + tbody');
                },
                success: function(data) {
                    $('#loading-row').remove();
                    $('.filter_row').nextAll('tr').remove();
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

            var searchValue = document.getElementsByName('search_data')[0].value;

            loadData(searchValue);

            setTimeout(function() {
                canClick = true;
                refreshButton.removeAttribute('disabled');
            }, 1000);
        }

        refreshButton.addEventListener('click', handleClick);

    });
</script>
