<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;

class Keranjang extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        $data['cart'] = $cart;
        return view('pelanggan/keranjang', $data);
    }

    public function tambah()
{
    $session = session();
    $cart = $session->get('cart') ?? [];

    $produk_id    = $this->request->getPost('produk_id');
    $nama_produk  = $this->request->getPost('nama_produk');
    $harga        = $this->request->getPost('harga');
    $quantity     = (int) $this->request->getPost('quantity');

    if ($quantity < 1) {
        $quantity = 1;
    }

    if (isset($cart[$produk_id])) {
        $cart[$produk_id]['qty'] += $quantity;
        $cart[$produk_id]['subtotal'] = $cart[$produk_id]['harga'] * $cart[$produk_id]['qty'];
    } else {
        $cart[$produk_id] = [
            'nama_produk' => $nama_produk,
            'harga'       => $harga,
            'qty'         => $quantity,
            'subtotal'    => $harga * $quantity
        ];
    }

    $session->set('cart', $cart);

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
}



    public function hapus($produk_id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$produk_id])) {
            unset($cart[$produk_id]);
            $session->set('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function kosongkan()
    {
        session()->remove('cart');
        return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
