<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css">

<div class="group_view_code">
    <div class="sec_box">
        <h2>Simple Table</h2>
        <p class="desk_code">
        </p>
        <div class="bar_code">
            <div class="preview_code">
                <h3>Preview</h3>
                <div class="sec_table">
                    <h2>Nama Table</h2>
                    <a href="">
                        <div class="sec_addnew">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-plus" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                <path d="M9 12l6 0" />
                                <path d="M12 9l0 6" />
                            </svg>
                            <span>Add New</span>
                        </div>
                    </a>
                    <table>
                        <tbody>
                            <tr class="head_table">
                                <th class="check_box">
                                    <input type="checkbox" id="myCheckbox" name="myCheckbox" value="1">
                                </th>
                                <th>name</th>
                                <th>website</th>
                                <th>Image</th>
                                <th>link</th>
                                <th>tanggal</th>
                                <th>action</th>
                            </tr>
                            <tr class="filter_row">
                                <td></td>
                                <td>
                                    <div class="grubsearchtable">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                        <input type="text" placeholder="Cari data..." id="searchData-name">
                                    </div>
                                </td>
                                <td>
                                    <div class="grubsearchtable">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                        <input type="text" placeholder="Cari data..." id="searchData-website">
                                    </div>
                                </td>
                                <td>
                                    <div class="grubsearchtable">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                        <input type="text" placeholder="Cari data..." id="searchData-gambar">
                                    </div>
                                </td>
                                <td>
                                    <div class="grubsearchtable">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                        <input type="text" placeholder="Cari data..." id="searchData-link">
                                    </div>
                                </td>
                                <td>
                                    <div class="grubsearchtable">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                        <input type="text" placeholder="Cari data..." id="searchData-tanggal">
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="check_box">
                                    <input type="checkbox" id="myCheckbox" name="myCheckbox" value="1">
                                </td>
                                <td><span class="name">poorgas</span></td>
                                <td><span class="website">arwanatoto</span></td>
                                <td class="show_img_tbl">
                                    <span class="td_img_show gambar">car-l21.png</span>
                                    <img class="table_img" src="../assets/img/utama/car-l21.png" alt="">
                                </td>
                                <td><span class="link">https://www.lotto21group.com/index.php</span></td>
                                <td><span class="tanggal">2023/04/27</span></td>
                                <td class="kolom_action">
                                    <div class="dot_action">
                                        <span>•</span>
                                        <span>•</span>
                                        <span>•</span>
                                    </div>
                                    <div class="action_crud" id="1">
                                        <a href=""><div class="list_action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                            <span>View</span>
                                        </div></a>
                                        <a href=""><div class="list_action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                                <path d="M16 5l3 3" />
                                                <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                                            </svg>
                                            <span>Edit</span>
                                        </div></a>
                                        <a href=""><div class="list_action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            <span>Delete</span>
                                        </div></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="check_box">
                                    <input type="checkbox" id="myCheckbox" name="myCheckbox" value="1">
                                </td>
                                <td><span class="name">cocok</span></td>
                                <td><span class="website">jeeptoto</span></td>
                                <td class="show_img_tbl">
                                    <span class="td_img_show">car-l21.png</span>
                                    <img class="table_img" src="../assets/img/utama/car-l21.png" alt="">
                                </td>
                                <td><span class="link">https://www.lotto21group.com/index.php</span></td>
                                <td><span class="tanggal">2023/04/27</span></td>
                                <td class="kolom_action">
                                    <div class="dot_action">
                                        <span>•</span>
                                        <span>•</span>
                                        <span>•</span>
                                    </div>
                                    <div class="action_crud" id="2">
                                        <a href=""><div class="list_action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                            <span>View</span>
                                        </div></a>
                                        <a href="#" class="triggermodal" data-target="show1"><div class="list_action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                                <path d="M16 5l3 3" />
                                                <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                                            </svg>
                                            <span>Edit</span>
                                        </div></a>
                                        <a href=""><div class="list_action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            <span>Delete</span>
                                        </div></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="show1" class="sec_modal">
                    <div class="componen_modal">
                        <span class="closemodal" onclick="closeModal()">X</span>
                        <div class="body_modal">
                            <h3>Edit Data Tabel</h3>
                            <div class="conten_body_modal">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="list_form">
                                        <span class="sec_label">Name</span>
                                        <input type="text" id="" name="" value="poorgas">
                                    </div>
                                    <div class="list_form">
                                        <span class="sec_label">Website</span>
                                        <select id="" name="">
                                            <option class="sec_selected" value="arwanatoto" selected place>arwanatoto</option>
                                            <option value="arwanatoto">arwanatoto</option>
                                            <option value="duogaming">duogaming</option>
                                            <option value="jeeptoto">jeeptoto</option>
                                            <option value="tstoto">tstoto</option>
                                            <option value="doyantoto">doyantoto</option>
                                            <option value="arta4d">arta4d</option>
                                            <option value="neon4d">neon4d</option>
                                            <option value="zara4d">zara4d</option>
                                            <option value="roma4d">roma4d</option>
                                            <option value="nero4d">nero4d</option>
                                            <option value="toke4d">toke4d</option>
                                        </select>
                                    </div>
                                    <div class="list_form">
                                        <span class="sec_label">Gambar</span>
                                        <div class="pilihan_gambar">
                                            <input type="file" id="" name="" value="poorgas">
                                            <button type="button" class="img_gallery">Pilih Gallery</button>
                                        </div>
                                    </div>
                                    <div class="list_form">
                                        <span class="sec_label">Link</span>
                                        <textarea name="" id="" cols="30" rows="1">https://www.lotto21group.com/index.php</textarea>
                                    </div>
                                    <div class="list_form">
                                        <span class="sec_label">Tanggal</span>
                                        <input type="date" id="" name="" value="2023-04-27">
                                    </div>
                                    <div class="list_form">
                                        <span class="sec_label">Toggle</span>
                                        <div class="sec_togle">
                                            <input type="checkbox" id="switch-1" value="on">
                                            <label for="switch-1" class="sec_switch"></label>
                                        </div>
                                    </div>
                                    <div class="sec_button_form">
                                        <button class="sec_botton btn_submit" type="submit" id="" name="">Submit</button>
                                        <a href=""><button class="sec_botton btn_cancel">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="copy_code">
                <h3>Code Element</h3>
                <pre><code class="language-html" id="tabel-simple">
                    &lt;div class="sec_table"&gt;
                    &lt;h2&gt;Nama Table&lt;/h2&gt;
                    &lt;a href=""&gt;
                        &lt;div class="sec_addnew"&gt;
                            &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-plus" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"/&gt;
                                &lt;path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /&gt;
                                &lt;path d="M9 12l6 0" /&gt;
                                &lt;path d="M12 9l0 6" /&gt;
                            &lt;/svg&gt;
                            &lt;span&gt;Add New&lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/a&gt;
                    &lt;table&gt;
                        &lt;tbody&gt;
                            &lt;tr class="head_table"&gt;
                                &lt;th class="check_box"&gt;
                                    &lt;input type="checkbox" id="myCheckbox" name="myCheckbox" value="1"&gt;
                                &lt;/th&gt;
                                &lt;th&gt;name&lt;/th&gt;
                                &lt;th&gt;website&lt;/th&gt;
                                &lt;th&gt;Image&lt;/th&gt;
                                &lt;th&gt;link&lt;/th&gt;
                                &lt;th&gt;tanggal&lt;/th&gt;
                                &lt;th&gt;action&lt;/th&gt;
                            &lt;/tr&gt;
                            &lt;tr class="filter_row"&gt;
                                &lt;td&gt;&lt;/td&gt;
                                &lt;td&gt;
                                    &lt;div class="grubsearchtable"&gt;
                                        &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                            &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"&gt;&lt;/path&gt;
                                            &lt;path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"&gt;&lt;/path&gt;
                                            &lt;path d="M21 21l-6 -6"&gt;&lt;/path&gt;
                                        &lt;/svg&gt;
                                        &lt;input type="text" placeholder="Cari data..." id="searchData-name"&gt;
                                    &lt;/div&gt;
                                &lt;/td&gt;
                                &lt;td&gt;
                                    &lt;div class="grubsearchtable"&gt;
                                        &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                            &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"&gt;&lt;/path&gt;
                                            &lt;path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"&gt;&lt;/path&gt;
                                            &lt;path d="M21 21l-6 -6"&gt;&lt;/path&gt;
                                        &lt;/svg&gt;
                                        &lt;input type="text" placeholder="Cari data..." id="searchData-website"&gt;
                                    &lt;/div&gt;
                                &lt;/td&gt;
                                &lt;td&gt;
                                    &lt;div class="grubsearchtable"&gt;
                                        &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                            &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"&gt;&lt;/path&gt;
                                            &lt;path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"&gt;&lt;/path&gt;
                                            &lt;path d="M21 21l-6 -6"&gt;&lt;/path&gt;
                                        &lt;/svg&gt;
                                        &lt;input type="text" placeholder="Cari data..." id="searchData-gambar"&gt;
                                    &lt;/div&gt;
                                &lt;/td&gt;
                                &lt;td&gt;
                                    &lt;div class="grubsearchtable"&gt;
                                        &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                            &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"&gt;&lt;/path&gt;
                                            &lt;path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"&gt;&lt;/path&gt;
                                            &lt;path d="M21 21l-6 -6"&gt;&lt;/path&gt;
                                        &lt;/svg&gt;
                                        &lt;input type="text" placeholder="Cari data..." id="searchData-link"&gt;
                                    &lt;/div&gt;
                                &lt;/td&gt;
                                &lt;td&gt;
                                    &lt;div class="grubsearchtable"&gt;
                                        &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                            &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"&gt;&lt;/path&gt;
                                            &lt;path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"&gt;&lt;/path&gt;
                                            &lt;path d="M21 21l-6 -6"&gt;&lt;/path&gt;
                                        &lt;/svg&gt;
                                        &lt;input type="text" placeholder="Cari data..." id="searchData-tanggal"&gt;
                                    &lt;/div&gt;
                                &lt;/td&gt;
                                &lt;td&gt;&lt;/td&gt;
                            &lt;/tr&gt;
                            &lt;tr&gt;
                                &lt;td class="check_box"&gt;
                                    &lt;input type="checkbox" id="myCheckbox" name="myCheckbox" value="1"&gt;
                                &lt;/td&gt;
                                &lt;td&gt;&lt;span class="name"&gt;poorgas&lt;/span&gt;&lt;/td&gt;
                                &lt;td&gt;&lt;span class="website"&gt;arwanatoto&lt;/span&gt;&lt;/td&gt;
                                &lt;td class="show_img_tbl"&gt;
                                    &lt;span class="td_img_show gambar"&gt;car-l21.png&lt;/span&gt;
                                    &lt;img class="table_img" src="../assets/img/utama/car-l21.png" alt=""&gt;
                                &lt;/td&gt;
                                &lt;td&gt;&lt;span class="link"&gt;https://www.lotto21group.com/index.php&lt;/span&gt;&lt;/td&gt;
                                &lt;td&gt;&lt;span class="tanggal"&gt;2023/04/27&lt;/span&gt;&lt;/td&gt;
                                &lt;td class="kolom_action"&gt;
                                    &lt;div class="dot_action"&gt;
                                        &lt;span&gt;•&lt;/span&gt;
                                        &lt;span&gt;•&lt;/span&gt;
                                        &lt;span&gt;•&lt;/span&gt;
                                    &lt;/div&gt;
                                    &lt;div class="action_crud" id="1"&gt;
                                        &lt;a href=""&gt;&lt;div class="list_action"&gt;
                                            &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                                &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"/&gt;
                                                &lt;path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /&gt;
                                                &lt;path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /&gt;
                                            &lt;/svg&gt;
                                            &lt;span&gt;View&lt;/span&gt;
                                        &lt;/div&gt;&lt;/a&gt;
                                        &lt;a href=""&gt;&lt;div class="list_action"&gt;
                                            &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                                &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"/&gt;
                                                &lt;path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" /&gt;
                                                &lt;path d="M16 5l3 3" /&gt;
                                                &lt;path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" /&gt;
                                            &lt;/svg&gt;
                                            &lt;span&gt;Edit&lt;/span&gt;
                                        &lt;/div&gt;&lt;/a&gt;
                                        &lt;a href=""&gt;&lt;div class="list_action"&gt;
                                            &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                                &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"/&gt;
                                                &lt;path d="M4 7l16 0" /&gt;
                                                &lt;path d="M10 11l0 6" /&gt;
                                                &lt;path d="M14 11l0 6" /&gt;
                                                &lt;path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /&gt;
                                                &lt;path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /&gt;
                                            &lt;/svg&gt;
                                            &lt;span&gt;Delete&lt;/span&gt;
                                        &lt;/div&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                &lt;/td&gt;
                            &lt;/tr&gt;
                            &lt;tr&gt;
                                &lt;td class="check_box"&gt;
                                    &lt;input type="checkbox" id="myCheckbox" name="myCheckbox" value="1"&gt;
                                &lt;/td&gt;
                                &lt;td&gt;&lt;span class="name"&gt;cocok&lt;/span&gt;&lt;/td&gt;
                                &lt;td&gt;&lt;span class="website"&gt;jeeptoto&lt;/span&gt;&lt;/td&gt;
                                &lt;td class="show_img_tbl"&gt;
                                    &lt;span class="td_img_show"&gt;car-l21.png&lt;/span&gt;
                                    &lt;img class="table_img" src="../assets/img/utama/car-l21.png" alt=""&gt;
                                &lt;/td&gt;
                                &lt;td&gt;&lt;span class="link"&gt;https://www.lotto21group.com/index.php&lt;/span&gt;&lt;/td&gt;
                                &lt;td&gt;&lt;span class="tanggal"&gt;2023/04/27&lt;/span&gt;&lt;/td&gt;
                                &lt;td class="kolom_action"&gt;
                                    &lt;div class="dot_action"&gt;
                                        &lt;span&gt;•&lt;/span&gt;
                                        &lt;span&gt;•&lt;/span&gt;
                                        &lt;span&gt;•&lt;/span&gt;
                                    &lt;/div&gt;
                                    &lt;div class="action_crud" id="2"&gt;
                                        &lt;a href=""&gt;&lt;div class="list_action"&gt;
                                            &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                                &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"/&gt;
                                                &lt;path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /&gt;
                                                &lt;path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /&gt;
                                            &lt;/svg&gt;
                                            &lt;span&gt;View&lt;/span&gt;
                                        &lt;/div&gt;&lt;/a&gt;
                                        &lt;a href="#" class="triggermodal" data-target="show1"&gt;&lt;div class="list_action"&gt;
                                            &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                                &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"/&gt;
                                                &lt;path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" /&gt;
                                                &lt;path d="M16 5l3 3" /&gt;
                                                &lt;path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" /&gt;
                                            &lt;/svg&gt;
                                            &lt;span&gt;Edit&lt;/span&gt;
                                        &lt;/div&gt;&lt;/a&gt;
                                        &lt;a href=""&gt;&lt;div class="list_action"&gt;
                                            &lt;svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"&gt;
                                                &lt;path stroke="none" d="M0 0h24v24H0z" fill="none"/&gt;
                                                &lt;path d="M4 7l16 0" /&gt;
                                                &lt;path d="M10 11l0 6" /&gt;
                                                &lt;path d="M14 11l0 6" /&gt;
                                                &lt;path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /&gt;
                                                &lt;path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /&gt;
                                            &lt;/svg&gt;
                                            &lt;span&gt;Delete&lt;/span&gt;
                                        &lt;/div&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                &lt;/td&gt;
                            &lt;/tr&gt;
                        &lt;/tbody&gt;
                    &lt;/table&gt;
                &lt;/div&gt;

                &lt;div id="show1" class="sec_modal"&gt;
                    &lt;div class="componen_modal"&gt;
                        &lt;span class="closemodal" onclick="closeModal()"&gt;X&lt;/span&gt;
                        &lt;div class="body_modal"&gt;
                            &lt;h3&gt;Edit Data Tabel&lt;/h3&gt;
                            &lt;div class="conten_body_modal"&gt;
                                &lt;form action="" method="POST" enctype="multipart/form-data"&gt;
                                    &lt;div class="list_form"&gt;
                                        &lt;span class="sec_label"&gt;Name&lt;/span&gt;
                                        &lt;input type="text" id="" name="" value="poorgas"&gt;
                                    &lt;/div&gt;
                                    &lt;div class="list_form"&gt;
                                        &lt;span class="sec_label"&gt;Website&lt;/span&gt;
                                        &lt;select id="" name=""&gt;
                                            &lt;option class="sec_selected" value="arwanatoto" selected place&gt;arwanatoto&lt;/option&gt;
                                            &lt;option value="arwanatoto"&gt;arwanatoto&lt;/option&gt;
                                            &lt;option value="duogaming"&gt;duogaming&lt;/option&gt;
                                            &lt;option value="jeeptoto"&gt;jeeptoto&lt;/option&gt;
                                            &lt;option value="tstoto"&gt;tstoto&lt;/option&gt;
                                            &lt;option value="doyantoto"&gt;doyantoto&lt;/option&gt;
                                            &lt;option value="arta4d"&gt;arta4d&lt;/option&gt;
                                            &lt;option value="neon4d"&gt;neon4d&lt;/option&gt;
                                            &lt;option value="zara4d"&gt;zara4d&lt;/option&gt;
                                            &lt;option value="roma4d"&gt;roma4d&lt;/option&gt;
                                            &lt;option value="nero4d"&gt;nero4d&lt;/option&gt;
                                            &lt;option value="toke4d"&gt;toke4d&lt;/option&gt;
                                        &lt;/select&gt;
                                    &lt;/div&gt;
                                    &lt;div class="list_form"&gt;
                                        &lt;span class="sec_label"&gt;Gambar&lt;/span&gt;
                                        &lt;div class="pilihan_gambar"&gt;
                                            &lt;input type="file" id="" name="" value="poorgas"&gt;
                                            &lt;button type="button" class="img_gallery"&gt;Pilih Gallery&lt;/button&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class="list_form"&gt;
                                        &lt;span class="sec_label"&gt;Link&lt;/span&gt;
                                        &lt;textarea name="" id="" cols="30" rows="1"&gt;https://www.lotto21group.com/index.php&lt;/textarea&gt;
                                    &lt;/div&gt;
                                    &lt;div class="list_form"&gt;
                                        &lt;span class="sec_label"&gt;Tanggal&lt;/span&gt;
                                        &lt;input type="date" id="" name="" value="2023-04-27"&gt;
                                    &lt;/div&gt;
                                    &lt;div class="list_form"&gt;
                                        &lt;span class="sec_label"&gt;Toggle&lt;/span&gt;
                                        &lt;div class="sec_togle"&gt;
                                            &lt;input type="checkbox" id="switch-1" value="on"&gt;
                                            &lt;label for="switch-1" class="sec_switch"&gt;&lt;/label&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class="sec_button_form"&gt;
                                        &lt;button class="sec_botton btn_submit" type="submit" id="" name=""&gt;Submit&lt;/button&gt;
                                        &lt;a href=""&gt;&lt;button class="sec_botton btn_cancel"&gt;Cancel&lt;/button&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                &lt;/form&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                </code></pre>                                
                <button class="copy_element" onclick="copyElement('tabel-simple')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                        <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                    </svg>
                    Copy
                </button>
            </div>
        </div>
    </div>
    
</div>
