<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\CodeIgniter;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {

        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Daftar Komik',
            // 'komik' => $komik
            'komik' => $this->komikModel->getKomik()

        ];




        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        //method kalau data tidak ada di tabel
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik ' . $slug . ' tidak ditemukan. ');
        }


        return view('komik/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Komik',
            'validation' => \Config\Services::validation()

        ];
        return view('komik/create', $data);
    }
    public function save()
    {
        // validasi input agar tidak sembarang input atau wajib diisi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ],
            'penulis' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada',
                ]
            ],
            'sampul' => [
                //gak boleh ada spasi
                'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar harus diisi',
                    'max_size' => 'ukuran gambar max 1024 mb',
                    'is_image' => 'file harus berupa gambar',
                    'mime-in' => 'format gambar harus berekstensi jpg,jpeg, atau png',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }
        // dd('berhasil');
        // untuk cek yg diats

        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');

        // pindahkan file ke folder img 
        $fileSampul->move('img');

        // ambil nama file sampul

        $namaSampul = $fileSampul->getName();


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sampul' => $namaSampul,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
        ]);

        // kalimat notifikasi berhasil save 
        session()->setFlashdata('pesan', 'Data berhasil di save .');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus .');
        return redirect()->to('/komik');
    }



    // cara konek tanpa model
    // $db = \Config\Database::connect();
    // $komik = $db->query("SELECT * FROM komik");
    // foreach ($komik->getResultArray() as $row) {
    //     d($row);
    // }

    public function edit($slug)
    {
        $data = [
            'title' => 'form Edit Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/edit', $data);
    }

    public function update($id)
    {  //cek judul
        $komiklama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komiklama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ],
            'penulis' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sampul' => $this->request->getVar('sampul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
        ]);

        // kalimat notifikasi berhasil save 
        session()->setFlashdata('pesan', 'Data berhasil di ubah .');

        return redirect()->to('/komik');
    }
}
