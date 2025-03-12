<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{
    // FORM UPLOAD
    public function upload()
    {
        return view('upload');
    }

    // PROSES UPLOAD BIASA TANPA RESIZE
    public function proses_upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        $tujuan_upload = public_path('data_file');

        // Buat folder jika belum ada
        if (!File::isDirectory($tujuan_upload)) {
            File::makeDirectory($tujuan_upload, 0777, true);
        }

        // Simpan file asli
        $file->move($tujuan_upload, $file->getClientOriginalName());

        return redirect()->back()->with('success', 'File berhasil diupload!');
    }

    // PROSES UPLOAD DENGAN RESIZE (PAKAI IMAGE MANAGER V3)
    public function resize_upload(Request $request, ImageManager $imageManager)
    {
        $request->validate([
            'file' => 'required|image', // hanya gambar
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        $path = public_path('images'); // Lokasi simpan

        // Buat folder jika belum ada
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // Nama unik file
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Proses resize, crop agar 200x200, menjaga rasio
        $image = $imageManager->read($file)->cover(200, 200); // COVER akan resize + crop tengah otomatis

        // Simpan gambar
        $image->save($path . '/' . $fileName);

        return redirect()->back()->with('success', 'Gambar berhasil diupload dan diresize!');
    }

    // FORM UPLOAD DROPZONE
    public function dropzone()
    {
        return view('dropzone');
    }

    // PROSES UPLOAD DROPZONE
    public function dropzoneStore(Request $request)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();

        $path = public_path('img/dropzone');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $image->move($path, $imageName);

        return response()->json(['success' => $imageName]);
    }
}
