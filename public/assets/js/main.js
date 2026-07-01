// ===========================
// DATA KERANJANG
// ===========================
let cart = JSON.parse(localStorage.getItem('ombrew_cart') || '[]');

// Simpan qty per produk (untuk counter di card)
const qtys = {};

// Init qty display
document.querySelectorAll('.qty-val').forEach(el => {
    const id = el.id.replace('qty-', '');
    qtys[id] = 1;
});

// ===========================
// TOMBOL MINUS & PLUS (di card)
// ===========================
document.addEventListener('click', function(e) {
    // PLUS
    if (e.target.closest('.qty-btn.plus')) {
        const id = e.target.closest('.qty-btn.plus').dataset.id;
        qtys[id] = (qtys[id] || 1) + 1;
        document.getElementById('qty-' + id).textContent = qtys[id];
    }
    // MINUS
    if (e.target.closest('.qty-btn.minus')) {
        const id = e.target.closest('.qty-btn.minus').dataset.id;
        qtys[id] = Math.max(1, (qtys[id] || 1) - 1);
        document.getElementById('qty-' + id).textContent = qtys[id];
    }
});

// ===========================
// ADD TO CART
// ===========================
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.add-to-cart');
    if (!btn) return;

    const id    = btn.dataset.id;
    const name  = btn.dataset.name;
    const price = parseFloat(btn.dataset.price);
    const qty   = qtys[id] || 1;

    const existing = cart.find(i => i.id === id);
    if (existing) {
        existing.qty += qty;
    } else {
        cart.push({ id, name, price, qty });
    }

    saveCart();
    updateCartUI();

    // Feedback tombol
    btn.textContent = '✓ Ditambahkan!';
    btn.classList.add('added');
    setTimeout(() => {
        btn.textContent = 'Add To Cart';
        btn.classList.remove('added');
    }, 1200);
});

// ===========================
// FILTER KATEGORI
// ===========================
document.querySelectorAll('.cat-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const cat   = this.dataset.cat;
        const items = document.querySelectorAll('.product-item');
        items.forEach(item => {
            item.style.display = (cat === 'all' || item.dataset.cat === cat) ? '' : 'none';
        });
    });
});

// ===========================
// UPDATE CART UI (modal)
// ===========================
function updateCartUI() {
    const cartItems  = document.getElementById('cartItems');
    const cartCount  = document.getElementById('cartCount');
    const subtotalEl = document.getElementById('subtotalDisplay');
    const totalEl    = document.getElementById('totalDisplay');
    const hiddenEl   = document.getElementById('hiddenItems');

    const totalQty = cart.reduce((s, i) => s + i.qty, 0);
    if (cartCount) cartCount.textContent = totalQty;

    if (!cartItems) return;

    if (cart.length === 0) {
        cartItems.innerHTML = '<p class="text-muted text-center py-3 small">Keranjang masih kosong</p>';
        if (subtotalEl) subtotalEl.textContent = 'Rp 0';
        if (totalEl)    totalEl.textContent    = 'Rp 0';
        if (hiddenEl)   hiddenEl.value         = '[]';
        return;
    }

    let html = '';
    let subtotal = 0;

    cart.forEach((item, idx) => {
        const line = item.price * item.qty;
        subtotal  += line;
        html += `
        <div class="d-flex align-items-center gap-2 mb-2 p-2 bg-light rounded">
            <div class="flex-grow-1">
                <div class="fw-semibold small">${item.name}</div>
                <div class="text-muted" style="font-size:.72rem;">Rp ${fmt(item.price)} × ${item.qty}</div>
            </div>
            <div class="d-flex align-items-center gap-1">
                <button class="btn btn-sm btn-outline-secondary py-0 px-1 modal-qty" data-idx="${idx}" data-act="minus" style="font-size:.8rem;">−</button>
                <span class="px-1 fw-bold small">${item.qty}</span>
                <button class="btn btn-sm btn-outline-secondary py-0 px-1 modal-qty" data-idx="${idx}" data-act="plus" style="font-size:.8rem;">+</button>
                <button class="btn btn-sm btn-outline-danger py-0 px-1 modal-qty" data-idx="${idx}" data-act="del" style="font-size:.8rem;">×</button>
            </div>
            <span class="fw-bold small text-success">Rp ${fmt(line)}</span>
        </div>`;
    });

    cartItems.innerHTML = html;
    if (subtotalEl) subtotalEl.textContent = 'Rp ' + fmt(subtotal);
    if (totalEl)    totalEl.textContent    = 'Rp ' + fmt(subtotal);
    if (hiddenEl)   hiddenEl.value         = JSON.stringify(cart);
}

// Tombol qty di modal
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.modal-qty');
    if (!btn) return;
    const idx = parseInt(btn.dataset.idx);
    const act = btn.dataset.act;
    if (act === 'plus')  cart[idx].qty++;
    if (act === 'minus') { cart[idx].qty--; if (cart[idx].qty <= 0) cart.splice(idx, 1); }
    if (act === 'del')   cart.splice(idx, 1);
    saveCart();
    updateCartUI();
});

function saveCart() {
    localStorage.setItem('ombrew_cart', JSON.stringify(cart));
}

function fmt(num) {
    return parseInt(num).toLocaleString('id-ID');
}

// Init on load
updateCartUI();