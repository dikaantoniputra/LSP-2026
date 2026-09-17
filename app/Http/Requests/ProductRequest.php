<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product') ? $this->route('product')->id : null;

        return [
            'kode_produk' => [
                'required',
                'string',
                'max:50',
                Rule::unique('products', 'kode_produk')->ignore($productId),
            ],
            'nama_produk' => ['required', 'string', 'max:150'],
            'category_id' => ['required', 'exists:categories,id'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['required', 'in:Tersedia,Habis,Preorder'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'kode_produk.required' => 'Kode produk wajib diisi.',
            'kode_produk.unique' => 'Kode produk sudah terdaftar di sistem.',
            'kode_produk.max' => 'Kode produk maksimal 50 karakter.',
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.max' => 'Nama produk maksimal 150 karakter.',
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid atau belum terdaftar.',
            'harga.required' => 'Harga produk wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka valid.',
            'harga.min' => 'Harga tidak boleh bernilai negatif.',
            'stok.required' => 'Stok produk wajib diisi.',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'stok.min' => 'Stok tidak boleh bernilai negatif.',
            'status.required' => 'Status produk wajib dipilih.',
            'status.in' => 'Status yang dipilih tidak valid (Tersedia, Habis, atau Preorder).',
        ];
    }
}
