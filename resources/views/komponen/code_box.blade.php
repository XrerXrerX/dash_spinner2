<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css">

<div class="group_view_code">
    <div class="sec_box">
        <h2>Simple Box</h2>
        <p class="desk_code">Element Box memiliki Default width 100%. Pada element berikut menambahkan properties height 100% menggunakan class hgi-100.
            Untuk properties size sebagai berikut:
            - wdi-100 =  width dalam % 
            - wdi-px-100 =  width dalam pixel
            - hgi-100 =  height dalam % 
            - hgi-px-100 =  height dalam pixel
        </p>
        <div class="bar_code">
            <div class="preview_code">
                <h3>Preview</h3>
                <div class="sec_box hgi-100">
                    isi konten box
                </div>
            </div>
            <div class="copy_code">
                <h3>Code Element</h3>
                <pre><code class="language-html" id="simple-box">
                    &lt;div class="sec_box hgi-100"&gt;
                        isi konten box
                    &lt;/div&gt;</code>
                </pre>
                <button class="copy_element" onclick="copyElement('simple-box')">
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

    <div class="sec_box">
        <h2>Box-flex</h2>
        <p class="desk_code">
        </p>
        <div class="bar_code">
            <div class="preview_code">
                <h3>Preview</h3>
                <div class="sec_box hgi-100 dx-flex">
                    isi konten box
                </div>
            </div>
            <div class="copy_code">
                <h3>Code Element</h3>
                <pre><code class="language-html" id="box-flex">
                    &lt;div class="sec_box hgi-100 dx-flex"&gt;
                        isi konten box
                    &lt;/div&gt;</code>
                </pre>
                <button class="copy_element" onclick="copyElement('box-flex')">
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

    <div class="sec_box">
        <h2>Box-grid</h2>
        <p class="desk_code">Sesuikan class gd-2 menjadi jumlah grid yang di inginkan.
        </p>
        <div class="bar_code">
            <div class="preview_code">
                <h3>Preview</h3>
                <div class="sec_box hgi-100 dx-grid gd-2">
                    <div class="sec_box">
                        isi konten box
                    </div>
                    <div class="sec_box">
                        isi konten box
                    </div>
                </div>
            </div>
            <div class="copy_code">
                <h3>Code Element</h3>
                <pre><code class="language-html" id="box-grid">
                    &lt;div class="sec_box hgi-100 dx-grid gd-2"&gt;
                        &lt;div class="sec_box"&gt;
                            isi konten box
                        &lt;/div&gt;
                        &lt;div class="sec_box"&gt;
                            isi konten box
                        &lt;/div&gt;
                    &lt;/div&gt;
                </code></pre>                
                <button class="copy_element" onclick="copyElement('box-grid')">
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
