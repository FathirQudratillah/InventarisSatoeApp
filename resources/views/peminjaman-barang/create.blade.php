<x-layout>
    <x-slot:title>Peminjaman Barang</x-slot:title>

    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563EB;
            --primary-light: #EFF6FF;
            --primary-dark: #1D4ED8;
            --success: #16A34A;
            --danger: #DC2626;
            --danger-light: #FEF2F2;
            --surface: #F8FAFC;
            --border: #E2E8F0;
            --text: #0F172A;
            --muted: #64748B;
        }

        body {
            background: var(--surface);
            color: var(--text);
        }

        /* ── Page Layout ── */
        .page-wrapper {
            max-width: 1300px;
            margin: 0 auto;
            padding: 32px 20px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -0.5px;
        }

        .page-header p {
            color: var(--muted);
            margin-top: 4px;
            font-size: 14px;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 24px;
            align-items: start;
        }

        @media (max-width: 900px) {
            .main-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ── Search Bar ── */
        .search-bar {
            position: relative;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            font-size: 14px;
            background: white;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
            color: var(--text);
        }

        .search-bar input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        .search-bar .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 15px;
        }

        /* ── Items Grid ── */
        .items-section h2 {
            font-size: 16px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 14px;
        }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 14px;
        }

        .item-card {
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 18px;
            cursor: pointer;
            transition: all .25s cubic-bezier(.4, 0, .2, 1);
            position: relative;
            overflow: hidden;
        }

        .item-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--primary-light), transparent);
            opacity: 0;
            transition: opacity .25s;
        }

        .item-card:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 24px rgba(37, 99, 235, .12);
            transform: translateY(-2px);
        }

        .item-card:hover::before {
            opacity: 1;
        }

        .item-card.in-cart {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .item-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 12px;
            position: relative;
        }

        .item-card.in-cart .item-icon {
            background: var(--primary);
        }

        .item-card.in-cart .item-icon i {
            color: white !important;
        }

        .item-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .item-code {
            font-size: 11px;
            color: var(--muted);
            font-weight: 500;
            letter-spacing: .3px;
            margin-bottom: 14px;
        }

        .qty-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .qty-btn.minus {
            background: #FEE2E2;
            color: var(--danger);
        }

        .qty-btn.minus:hover {
            background: var(--danger);
            color: white;
        }

        .qty-btn.plus {
            background: var(--primary);
            color: white;
        }

        .qty-btn.plus:hover {
            background: var(--primary-dark);
        }

        .qty-value {
            font-size: 15px;
            font-weight: 700;
            min-width: 24px;
            text-align: center;
            color: var(--text);
        }

        .add-to-cart-btn {
            width: 100%;
            padding: 9px;
            border: 1.5px dashed var(--border);
            border-radius: 10px;
            background: transparent;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            position: relative;
            z-index: 1;
        }

        .add-to-cart-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-light);
        }

        .badge-in-cart {
            position: absolute;
            top: 12px;
            right: 12px;
            background: var(--primary);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            z-index: 1;
        }

        /* ── Cart Panel ── */
        .cart-panel {
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 24px;
            position: sticky;
            top: 24px;
        }

        .cart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1.5px solid var(--border);
        }

        .cart-header h3 {
            font-size: 17px;
            font-weight: 800;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-count-badge {
            background: var(--primary);
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 20px;
        }

        .clear-all-btn {
            background: none;
            border: none;
            color: var(--danger);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 6px;
            transition: background .2s;
        }

        .clear-all-btn:hover {
            background: var(--danger-light);
        }

        /* ── Cart Empty State ── */
        .cart-empty {
            text-align: center;
            padding: 40px 20px;
            color: var(--muted);
        }

        .cart-empty .empty-icon {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: .3;
        }

        .cart-empty p {
            font-size: 13px;
            font-weight: 500;
        }

        /* ── Cart Items ── */
        .cart-items-list {
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
            animation: slideIn .3s cubic-bezier(.4, 0, .2, 1);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(16px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .cart-item-info {
            flex: 1;
            min-width: 0;
        }

        .cart-item-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cart-item-code {
            font-size: 11px;
            color: var(--muted);
            margin-top: 2px;
        }

        .cart-item-qty {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .cart-qty-btn {
            width: 26px;
            height: 26px;
            border: 1.5px solid var(--border);
            border-radius: 7px;
            background: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all .15s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-qty-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .cart-item-qty-val {
            font-size: 14px;
            font-weight: 700;
            min-width: 20px;
            text-align: center;
        }

        .cart-remove-btn {
            width: 28px;
            height: 28px;
            border: none;
            border-radius: 8px;
            background: var(--danger-light);
            color: var(--danger);
            cursor: pointer;
            transition: all .15s;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-remove-btn:hover {
            background: var(--danger);
            color: white;
        }

        /* ── Cart Summary ── */
        .cart-summary {
            background: var(--surface);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .summary-row.total {
            font-size: 15px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 0;
            padding-top: 10px;
            border-top: 1px solid var(--border);
            margin-top: 4px;
        }

        /* ── Tanggal Inputs ── */
        .date-fields {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 16px;
        }

        .date-field label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 6px;
        }

        .date-field input {
            width: 100%;
            padding: 9px 12px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text);
            background: white;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }

        .date-field input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        /* ── Notes ── */
        .notes-field {
            margin-bottom: 16px;
        }

        .notes-field label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 6px;
        }

        .notes-field textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text);
            resize: none;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .notes-field textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        /* ── Confirm Button ── */
        .confirm-btn {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: all .2s cubic-bezier(.4, 0, .2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: .2px;
        }

        .confirm-btn:hover:not(:disabled) {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, .3);
        }

        .confirm-btn:active {
            transform: translateY(0);
        }

        .confirm-btn:disabled {
            background: var(--border);
            color: var(--muted);
            cursor: not-allowed;
            box-shadow: none;
        }

        /* ── Toast Notification ── */
        .toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: var(--text);
            color: white;
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .2);
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 8px;
            transform: translateY(80px);
            opacity: 0;
            transition: all .35s cubic-bezier(.4, 0, .2, 1);
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .toast.success {
            background: var(--success);
        }

        .toast.remove {
            background: var(--danger);
        }

        /* No items state */
        .no-items {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }

        /* ── Hidden forms (for server submission) ── */
        .hidden-forms {
            display: none;
        }
    </style>

    <div class="page-wrapper">
        {{-- Header --}}
        <div class="page-header">
            <h1>📦 Peminjaman Barang</h1>
            <p>Pilih barang yang ingin dipinjam, lalu konfirmasi pengajuan ke admin.</p>
        </div>

        <div class="main-grid">
            {{-- Left: Items Catalog --}}
            <div class="items-section">
                <div class="search-bar">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" id="searchInput" placeholder="Cari nama atau kode barang...">
                </div>

                <h2>Daftar Barang Tersedia <span style="color:var(--muted);font-weight:500;font-size:14px;"
                        id="itemCount"></span></h2>

                @if ($kode_barangs->isEmpty())
                    <div class="no-items">
                        <p>Tidak ada barang tersedia saat ini.</p>
                    </div>
                @else
                    <div class="items-grid" id="itemsGrid">
                        @foreach ($kode_barangs as $kode_barang)
                            <div class="item-card" data-kode="{{ $kode_barang->kode_barang }}"
                                data-nama="{{ $kode_barang->dataBarang->nama_barang }}"
                                data-search="{{ strtolower($kode_barang->dataBarang->nama_barang . ' ' . $kode_barang->kode_barang) }}">

                                <div class="item-icon">
                                    <i class="fa fa-box" style="color:var(--primary);"></i>
                                </div>

                                <div class="item-name">{{ $kode_barang->dataBarang->nama_barang }}</div>
                                <div class="item-code">{{ $kode_barang->kode_barang }}</div>

                                {{-- Before in cart: Add button --}}
                                <button class="add-to-cart-btn"
                                    onclick="addToCart('{{ $kode_barang->kode_barang }}', '{{ $kode_barang->dataBarang->nama_barang }}')">
                                    <i class="fa fa-plus" style="margin-right:5px;"></i> Tambah ke Keranjang
                                </button>

                                {{-- After in cart: Qty controls --}}
                                <div class="qty-controls" style="display:none;"
                                    id="ctrl-{{ $kode_barang->kode_barang }}">
                                    <button class="qty-btn minus"
                                        onclick="changeQty('{{ $kode_barang->kode_barang }}', -1)">−</button>
                                    <span class="qty-value" id="qty-{{ $kode_barang->kode_barang }}">1</span>
                                    <button class="qty-btn plus"
                                        onclick="changeQty('{{ $kode_barang->kode_barang }}', 1)">+</button>
                                </div>

                                <div class="badge-in-cart" style="display:none;"
                                    id="badge-{{ $kode_barang->kode_barang }}">✓ Dipilih</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Right: Cart Panel --}}
            <div class="cart-panel">
                <div class="cart-header">
                    <h3>
                        <i class="fa fa-shopping-cart" style="color:var(--primary);"></i>
                        Keranjang
                        <span class="cart-count-badge" id="cartBadge">0</span>
                    </h3>
                    <button class="clear-all-btn" onclick="clearAll()" id="clearBtn" style="display:none;">
                        <i class="fa fa-trash-alt"></i> Hapus Semua
                    </button>
                </div>

                {{-- Empty state --}}
                <div class="cart-empty" id="cartEmpty">
                    <div class="empty-icon">🛒</div>
                    <p>Belum ada barang dipilih.</p>
                    <p style="margin-top:4px;font-size:12px;">Klik barang di sebelah kiri untuk menambahkan.</p>
                </div>

                {{-- Cart Items List --}}
                <div class="cart-items-list" id="cartList" style="display:none;"></div>

                {{-- Summary & Form --}}
                <div id="cartForm" style="display:none;">
                    <div class="cart-summary">
                        <div class="summary-row">
                            <span>Jenis Barang</span>
                            <span id="summaryTypes">0 jenis</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total Item</span>
                            <span id="summaryTotal">0 item</span>
                        </div>
                    </div>

                    {{-- Date Fields --}}
                    <div class="date-fields">
                        <div class="date-field">
                            <label>Tanggal Pinjam</label>
                            <input type="date" id="tglPinjam" name="tgl_pinjam" required min="{{ date('Y-m-d') }}"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="date-field">
                            <label>Tanggal Kembali</label>
                            <input type="date" id="tglKembali" name="tgl_kembali" required
                                min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div class="notes-field">
                        <label>Catatan (Opsional)</label>
                        <textarea id="catatan" rows="2" placeholder="Keperluan, tujuan peminjaman, dll..."></textarea>
                    </div>

                    {{-- Submit --}}
                    <button class="confirm-btn" id="confirmBtn" onclick="submitPeminjaman()">
                        <i class="fa fa-paper-plane"></i>
                        Ajukan Peminjaman
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div class="toast" id="toast">
        <i class="fa fa-check-circle"></i>
        <span id="toastMsg">Barang ditambahkan!</span>
    </div>

    {{-- Hidden real forms for server-side operations --}}
    <div class="hidden-forms">
        @foreach ($kode_barangs as $kode_barang)
            <form id="form-add-{{ $kode_barang->kode_barang }}"
                action="{{ url('/cart/add/' . $kode_barang->kode_barang) }}" method="POST">
                @csrf
            </form>
            <form id="form-remove-{{ $kode_barang->kode_barang }}"
                action="{{ url('/cart/remove/' . $kode_barang->kode_barang) }}" method="POST">
                @csrf
            </form>
        @endforeach

        {{-- Final submission form --}}
        <form id="form-peminjaman" action="{{ url('/peminjaman/submit') }}" method="POST">
            @csrf
            <input type="hidden" id="input-cart" name="cart">
            <input type="hidden" id="input-tgl-pinjam" name="tgl_pinjam">
            <input type="hidden" id="input-tgl-kembali" name="tgl_kembali">
            <input type="hidden" id="input-catatan" name="catatan">
        </form>
    </div>

    <script>
        // ── State ──
        let cart = {};

        // ── Pre-populate from session (server-side) ──
        @php $sessionCart = session('cart', []); @endphp
        @if (!empty($sessionCart))
            cart = {!! json_encode(
                collect($sessionCart)->mapWithKeys(fn($v, $k) => [$k => ['nama' => $v['nama'], 'qty' => $v['qty']]]),
            ) !!};
        @endif

        // ── Init ──
        document.addEventListener('DOMContentLoaded', () => {
            renderCart();
            renderCardStates();
            updateItemCount();

            // Search
            document.getElementById('searchInput').addEventListener('input', e => {
                const q = e.target.value.toLowerCase();
                document.querySelectorAll('.item-card').forEach(card => {
                    card.style.display = card.dataset.search.includes(q) ? '' : 'none';
                });
                updateItemCount();
            });

            // Date min
            document.getElementById('tglPinjam').addEventListener('change', function() {
                const next = new Date(this.value);
                next.setDate(next.getDate() + 1);
                document.getElementById('tglKembali').min = next.toISOString().split('T')[0];
            });
        });

        // ── Add to Cart ──
        function addToCart(kode, nama) {
            if (cart[kode]) {
                cart[kode].qty++;
            } else {
                cart[kode] = {
                    nama,
                    qty: 1
                };
            }
            renderCart();
            renderCardStates();
            showToast('✅ ' + nama + ' ditambahkan!', 'success');

            // Sync with server
            document.getElementById('form-add-' + kode)?.submit();
        }

        // ── Change Qty ──
        function changeQty(kode, delta) {
            if (!cart[kode]) return;
            cart[kode].qty += delta;
            if (cart[kode].qty <= 0) {
                removeFromCart(kode, true);
                return;
            }
            // Update card qty display
            const el = document.getElementById('qty-' + kode);
            if (el) el.textContent = cart[kode].qty;
            renderCart();
        }

        // ── Remove ──
        function removeFromCart(kode, fromCard = false) {
            const nama = cart[kode]?.nama || kode;
            delete cart[kode];
            renderCart();
            renderCardStates();
            showToast('🗑️ ' + nama + ' dihapus', 'remove');

            // Sync with server
            document.getElementById('form-remove-' + kode)?.submit();
        }

        // ── Clear All ──
        function clearAll() {
            if (!confirm('Hapus semua barang dari keranjang?')) return;
            cart = {};
            renderCart();
            renderCardStates();
            showToast('🗑️ Keranjang dikosongkan', 'remove');
        }

        // ── Render Cart Panel ──
        function renderCart() {
            const keys = Object.keys(cart);
            const totalQty = keys.reduce((s, k) => s + cart[k].qty, 0);

            // Badge
            document.getElementById('cartBadge').textContent = totalQty;
            document.getElementById('clearBtn').style.display = keys.length ? '' : 'none';

            if (keys.length === 0) {
                document.getElementById('cartEmpty').style.display = '';
                document.getElementById('cartList').style.display = 'none';
                document.getElementById('cartForm').style.display = 'none';
                document.getElementById('confirmBtn').disabled = true;
                return;
            }

            document.getElementById('cartEmpty').style.display = 'none';
            document.getElementById('cartList').style.display = '';
            document.getElementById('cartForm').style.display = '';

            // Render list
            const list = document.getElementById('cartList');
            list.innerHTML = keys.map(kode => `
                <div class="cart-item" id="cart-item-${kode}">
                    <div class="cart-item-icon">📦</div>
                    <div class="cart-item-info">
                        <div class="cart-item-name">${cart[kode].nama}</div>
                        <div class="cart-item-code">${kode}</div>
                    </div>
                    <div class="cart-item-qty">
                        <button class="cart-qty-btn" onclick="changeCartQty('${kode}', -1)">−</button>
                        <span class="cart-item-qty-val" id="cqty-${kode}">${cart[kode].qty}</span>
                        <button class="cart-qty-btn" onclick="changeCartQty('${kode}', 1)">+</button>
                    </div>
                    <button class="cart-remove-btn" onclick="removeFromCart('${kode}')" title="Hapus">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            `).join('');

            // Summary
            document.getElementById('summaryTypes').textContent = keys.length + ' jenis';
            document.getElementById('summaryTotal').textContent = totalQty + ' item';
            document.getElementById('confirmBtn').disabled = false;
        }

        // ── Change qty from cart panel ──
        function changeCartQty(kode, delta) {
            if (!cart[kode]) return;
            cart[kode].qty += delta;
            if (cart[kode].qty <= 0) {
                removeFromCart(kode);
                return;
            }
            const el = document.getElementById('cqty-' + kode);
            if (el) el.textContent = cart[kode].qty;
            // Update card qty too
            const cardEl = document.getElementById('qty-' + kode);
            if (cardEl) cardEl.textContent = cart[kode].qty;
            // Update summary
            const totalQty = Object.keys(cart).reduce((s, k) => s + cart[k].qty, 0);
            document.getElementById('summaryTotal').textContent = totalQty + ' item';
            document.getElementById('cartBadge').textContent = totalQty;
        }

        // ── Render Card States ──
        function renderCardStates() {
            document.querySelectorAll('.item-card').forEach(card => {
                const kode = card.dataset.kode;
                const inCart = !!cart[kode];

                card.classList.toggle('in-cart', inCart);
                card.querySelector('.add-to-cart-btn').style.display = inCart ? 'none' : '';
                card.querySelector('.qty-controls').style.display = inCart ? 'flex' : 'none';
                card.querySelector('.badge-in-cart').style.display = inCart ? '' : 'none';

                if (inCart) {
                    const el = document.getElementById('qty-' + kode);
                    if (el) el.textContent = cart[kode].qty;
                }
            });
        }

        // ── Update visible item count ──
        function updateItemCount() {
            const visible = document.querySelectorAll('.item-card:not([style*="display: none"])').length;
            document.getElementById('itemCount').textContent = '(' + visible + ' barang)';
        }

        // ── Submit ──
        function submitPeminjaman() {
            const tglPinjam = document.getElementById('tglPinjam').value;
            const tglKembali = document.getElementById('tglKembali').value;

            if (!tglPinjam || !tglKembali) {
                alert('Mohon isi tanggal pinjam dan tanggal kembali.');
                return;
            }

            if (new Date(tglKembali) <= new Date(tglPinjam)) {
                alert('Tanggal kembali harus setelah tanggal pinjam.');
                return;
            }

            if (Object.keys(cart).length === 0) {
                alert('Keranjang masih kosong.');
                return;
            }

            document.getElementById('input-cart').value = JSON.stringify(cart);
            document.getElementById('input-tgl-pinjam').value = tglPinjam;
            document.getElementById('input-tgl-kembali').value = tglKembali;
            document.getElementById('input-catatan').value = document.getElementById('catatan').value;

            document.getElementById('form-peminjaman').submit();
        }

        // ── Toast ──
        let toastTimer;

        function showToast(msg, type = 'success') {
            const t = document.getElementById('toast');
            const m = document.getElementById('toastMsg');
            clearTimeout(toastTimer);
            t.className = 'toast ' + type;
            m.textContent = msg;
            t.classList.add('show');
            toastTimer = setTimeout(() => t.classList.remove('show'), 2800);
        }
    </script>
</x-layout>
