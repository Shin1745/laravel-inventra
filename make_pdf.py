import os
import subprocess

# Folder output sementara
os.makedirs("output_pdf", exist_ok=True)

# Path gambar screenshot (pastikan file screenshot.png ada di folder utama proyek)
screenshot_path = os.path.abspath("screenshot.png").replace("\\", "/")

# Path Microsoft Edge bawaan Windows
edge_path = r"C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe"
if not os.path.exists(edge_path):
    edge_path = r"C:\Program Files\Microsoft\Edge\Application\msedge.exe"

docs = {
    "1_Project_Laravel_Terbaik.pdf": f"""
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        @page {{ size: A4; margin: 15mm 15mm; }}
        body {{ font-family: Arial, sans-serif; color: #333; line-height: 1.5; }}
        h1 {{ color: #1a365d; font-size: 18pt; border-bottom: 2px solid #3182ce; padding-bottom: 6px; margin-top: 0; }}
        h2 {{ color: #2b6cb0; font-size: 13pt; margin-top: 15px; border-left: 4px solid #3182ce; padding-left: 8px; }}
        p, li {{ font-size: 10pt; }}
        .meta-box {{ background: #edf2f7; border-left: 4px solid #4a5568; padding: 10px; margin: 10px 0; font-size: 9.5pt; }}
        .img-container {{ text-align: center; margin-top: 10px; }}
        .img-container img {{ width: 100%; max-width: 580px; border: 1px solid #cbd5e0; border-radius: 6px; }}
    </style>
</head>
<body>
    <h1>Laporan Project Laravel Terbaik: Inventra</h1>
    <p>Dokumen portofolio pengembangan web full-stack menggunakan Laravel 12 dengan arsitektur bersih.</p>
    <div class="meta-box">
        <strong>Informasi Proyek:</strong><br>
        • <strong>Nama Aplikasi:</strong> Inventra (Smart Inventory & Asset Management)<br>
        • <strong>GitHub Repository:</strong> https://github.com/shin1745/laravel-inventra<br>
        • <strong>Tech Stack:</strong> Laravel 12, PHP 8.2, SQLite, Bootstrap 5
    </div>
    <h2>1. Arsitektur & Desain Sistem</h2>
    <ul>
        <li><strong>Form Request Validation:</strong> Memisahkan logika validasi input dari controller.</li>
        <li><strong>Service Layer:</strong> Mengisolasi logika transaksi bisnis dalam kelas layanan khusus.</li>
        <li><strong>Eager Loading:</strong> Mengatasi N+1 Query Problem via Eloquent <code>with('category')</code>.</li>
    </ul>
    <h2>2. Fitur Utama</h2>
    <ul>
        <li>Manajemen pencatatan data barang secara real-time.</li>
        <li>Dasbor interaktif berbasis Bootstrap 5.</li>
        <li>Endpoint RESTful API yang aman dan konsisten.</li>
    </ul>
    <h2>3. Bukti Implementasi & Tampilan UI</h2>
    <p>Berikut adalah tampilan antarmuka dasbor interaktif aplikasi Inventra:</p>
    <div class="img-container">
        <img src="file:///{screenshot_path}" alt="Inventra Dashboard Screenshot">
    </div>
</body>
</html>
""",
    "2_Troubleshooting_Bug.pdf": """
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        @page { size: A4; margin: 20mm 15mm; }
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        h1 { color: #1a365d; font-size: 20pt; border-bottom: 2px solid #e53e3e; padding-bottom: 8px; margin-top: 0; }
        h2 { color: #c53030; font-size: 14pt; margin-top: 20px; border-left: 4px solid #e53e3e; padding-left: 8px; }
        p, li { font-size: 10.5pt; }
        .error-box { background: #fff5f5; border: 1px solid #feb2b2; border-left: 4px solid #e53e3e; padding: 10px; margin: 10px 0; font-family: monospace; font-size: 9pt; color: #9b2c2c; }
    </style>
</head>
<body>
    <h1>Dokumentasi Troubleshooting Bug Kritis</h1>
    <p>Studi kasus penyelesaian masalah teknis selama pengembangan aplikasi Inventra.</p>
    <h2>1. Kasus Bug Teridentifikasi</h2>
    <div class="error-box">
        MassAssignmentException & MissingAppKeyException
    </div>
    <h2>2. Cara Menemukan & Memperbaiki</h2>
    <ul>
        <li><strong>Analisis:</strong> Menelusuri log stack trace error pada Ignition/Whoops Laravel.</li>
        <li><strong>Solusi Model:</strong> Menambahkan properti <code>protected $guarded = [];</code> pada model Category.</li>
        <li><strong>Solusi Konfigurasi:</strong> Menjalankan perintah <code>php artisan key:generate</code> untuk membuat kunci enkripsi.</li>
    </ul>
    <h2>3. Hasil Akhir</h2>
    <p>Aplikasi kembali berjalan normal, aman dari mass assignment vulnerability, dan stabil di lingkungan lokal.</p>
</body>
</html>
""",
    "3_Contoh_Kode_Laravel_Rapi.pdf": """
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        @page { size: A4; margin: 20mm 15mm; }
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        h1 { color: #1a365d; font-size: 20pt; border-bottom: 2px solid #38a169; padding-bottom: 8px; margin-top: 0; }
        h2 { color: #2f855a; font-size: 14pt; margin-top: 20px; border-left: 4px solid #38a169; padding-left: 8px; }
        p, li { font-size: 10.5pt; }
        pre { background: #1a202c; color: #68d391; padding: 12px; font-family: monospace; font-size: 9pt; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Contoh Kode Laravel Rapi</h1>
    <p>Implementasi ItemController yang menerapkan prinsip Clean Code dan Service Pattern.</p>
    <h2>ItemController.php</h2>
    <pre>
namespace App\\Http\\Controllers;

use App\\Http\\Requests\\StoreItemRequest;
use App\\Models\\Item;
use App\\Models\\Category;
use App\\Services\\InventoryService;
use Illuminate\\Http\\RedirectResponse;
use Illuminate\\View\\View;

class ItemController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index(): View
    {
        Category::firstOrCreate(['name' => 'General Electronics']);
        $items = Item::with('category')->latest()->get();
        return view('inventory', compact('items'));
    }

    public function store(StoreItemRequest $request): RedirectResponse
    {
        $this->inventoryService->createItem($request->validated());
        return redirect('/')-&gt;with('success', 'Barang berhasil ditambahkan.');
    }
}
    </pre>
</body>
</html>
"""
}

for pdf_name, html_content in docs.items():
    html_file = os.path.abspath(f"output_pdf/{pdf_name}.html")
    pdf_file = os.path.abspath(pdf_name)
    
    with open(html_file, "w", encoding="utf-8") as f:
        f.write(html_content)
        
    cmd = [edge_path, "--headless", "--disable-gpu", f"--print-to-pdf={pdf_file}", html_file]
    subprocess.run(cmd, check=True)
    print(f"Berhasil membuat: {pdf_name}")

print("Selesai! 3 file PDF sudah diperbarui di folder proyek Anda.")