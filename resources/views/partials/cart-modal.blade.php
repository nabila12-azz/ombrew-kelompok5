<!-- MODAL KERANJANG -->
<div class="modal fade" id="cartModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-darkgreen text-white">
                <h5 class="modal-title"><i class="bi bi-cart3"></i> Keranjang Pesanan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('order.store') }}" method="POST" id="orderForm">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Kiri: Info Pelanggan -->
                        <div class="col-md-5">
                            <h6 class="fw-bold mb-3">Informasi Pelanggan</h6>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Nama Pelanggan</label>
                                <input type="text" name="customer_name" class="form-control" required placeholder="Masukkan nama kamu">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Metode Pembayaran</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="QRIS">QRIS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Catatan (opsional)</label>
                                <textarea name="note" class="form-control" rows="3" placeholder="Contoh: tanpa cabai..."></textarea>
                            </div>
                        </div>
                        <!-- Kanan: Daftar Item -->
                        <div class="col-md-7">
                            <h6 class="fw-bold mb-3">Daftar Menu</h6>
                            <div id="cartItems">
                                <p class="text-muted text-center py-3">Keranjang masih kosong</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between small"><span>Subtotal</span><span id="subtotalDisplay">Rp 0</span></div>
                            <div class="d-flex justify-content-between small text-success"><span>Diskon</span><span>Rp 0</span></div>
                            <div class="d-flex justify-content-between fw-bold mt-1"><span>Total</span><span id="totalDisplay" class="text-darkgreen">Rp 0</span></div>
                        </div>
                    </div>
                </div>
                <!-- Hidden input untuk items -->
                <input type="hidden" name="items" id="hiddenItems">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-darkgreen px-4 fw-bold">
                        <i class="bi bi-check-circle"></i> Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>