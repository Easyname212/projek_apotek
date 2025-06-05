<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        color: white;
        padding: 40px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .page-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
    }
    
    .action-bar {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .btn-add {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-add:hover {
        background: linear-gradient(135deg, #764ba2, #667eea);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .table-container {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
        border: none;
        padding: 18px 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
        position: sticky;
        top: 0;
        z-index: 10;
    }
    
    .table tbody td {
        padding: 15px;
        border: none;
        vertical-align: middle;
        transition: all 0.3s ease;
    }
    
    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .table tbody tr:hover {
        background: linear-gradient(135deg, #f8f9ff 0%, #fff5f5 100%);
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    
    .drug-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 3px solid #f0f0f0;
    }
    
    .drug-image:hover {
            transform: scale(1.15);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border-color: #667eea;
        }

        .no-image-placeholder {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 24px;
            margin: 0 auto;
        }

        /* Drug information styling */
        .drug-name {
            font-weight: 600;
            color: #2d3748;
            font-size: 1rem;
            margin-bottom: 2px;
        }

        .drug-category {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
        }

        .drug-price {
            font-weight: 700;
            color: #38a169;
            font-size: 1.1rem;
        }

        .drug-stock {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
        }

        .stock-high {
            background: #c6f6d5;
            color: #22543d;
        }

        .stock-medium {
            background: #fef5e7;
            color: #c05621;
        }

        .stock-low {
            background: #fed7d7;
            color: #c53030;
        }

        .drug-description {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #4a5568;
            font-size: 0.9rem;
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: center;
        }

        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            min-width: 80px;
            justify-content: center;
        }

        .btn-edit {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            color: white;
            box-shadow: 0 3px 10px rgba(251, 191, 36, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(251, 191, 36, 0.4);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 3px 10px rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
            color: white;
        }
    
    .drug-name {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1.1rem;
    }
    
    .drug-category {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
    }
    
    .drug-price {
        font-weight: 700;
        color: #27ae60;
        font-size: 1.1rem;
    }
    
    .drug-stock {
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.9rem;
    }
    
    .stock-high {
        background: #d4edda;
        color: #155724;
    }
    
    .stock-medium {
        background: #fff3cd;
        color: #856404;
    }
    
    .stock-low {
        background: #f8d7da;
        color: #721c24;
    }
    
    .drug-description {
        max-width: 250px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #6c757d;
        line-height: 1.5;
    }
    
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 8px;
        min-width: 120px;
    }
    
    .btn-action {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.85rem;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #ffc107, #ff8f00);
        color: white;
    }
    
    .btn-edit:hover {
        background: linear-gradient(135deg, #ff8f00, #ffc107);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        color: white;
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
    }
    
    .btn-delete:hover {
        background: linear-gradient(135deg, #c82333, #dc3545);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        color: white;
    }
    
    .btn-barcode {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
        box-shadow: 0 3px 10px rgba(23, 162, 184, 0.3);
    }
    
    .btn-barcode:hover {
        background: linear-gradient(135deg, #138496, #17a2b8);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(23, 162, 184, 0.4);
        color: white;
    }
    
    .alert-custom {
        border: none;
        border-radius: 15px;
        padding: 20px;
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border-left: 5px solid #28a745;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
    }
    
    .no-image-placeholder {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        font-size: 0.8rem;
        text-align: center;
        border: 2px dashed #dee2e6;
    }
    
    @media (max-width: 768px) {
        .page-header {
            padding: 30px 20px;
        }
        
        .page-title {
            font-size: 2rem;
        }
        
        .action-bar {
            padding: 20px;
        }
        
        .table-responsive {
            border-radius: 15px;
        }
        
        .action-buttons {
            flex-direction: row;
            flex-wrap: wrap;
        }
        
        /* Additional responsive styles */
        .page-header h1 {
            font-size: 1.8rem;
        }

        .table-container {
            margin: 15px;
            border-radius: 8px;
        }

        .table thead th {
            padding: 12px 8px;
            font-size: 0.75rem;
        }

        .table tbody td {
            padding: 12px 8px;
        }

        .drug-image {
            width: 60px;
            height: 60px;
        }

        .no-image-placeholder {
            width: 60px;
            height: 60px;
            font-size: 18px;
        }

        .drug-name {
            font-size: 0.9rem;
        }

        .drug-price {
            font-size: 1rem;
        }

        .drug-description {
            max-width: 150px;
            font-size: 0.8rem;
        }

        .btn-action {
            padding: 6px 12px;
            font-size: 0.75rem;
            min-width: 60px;
        }
    }
    
    @media (max-width: 576px) {
        .container {
            padding: 10px;
        }

        .page-header {
            padding: 30px 15px;
        }

        .page-header h1 {
            font-size: 1.5rem;
        }

        .table-responsive {
            font-size: 0.8rem;
        }

        .drug-description {
            max-width: 100px;
        }
    }
</style>

<div class="container-fluid px-4" style="margin-bottom: 80px;">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title"><?= $title; ?></h1>
        <p class="page-subtitle">Kelola data obat dengan mudah dan efisien</p>
    </div>

    <!-- Alert -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-custom mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- Action Bar -->
    <div class="action-bar">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1">Daftar Obat</h5>
                <p class="text-muted mb-0">Total: <?= count($obat); ?> obat</p>
            </div>
            <a href="/obat/create" class="btn-add">
                <i class="bi bi-plus-circle"></i>
                Tambah Obat
            </a>
        </div>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Gambar</th>
                        <th>Nama Obat</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Satuan</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($obat as $o) : ?>
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-secondary"><?= $i++; ?></span>
                            </td>
                            <td class="text-center">
                                <?php if ($o['gambar']) : ?>
                                    <img src="<?= base_url('uploads/' . $o['gambar']); ?>" class="drug-image" alt="<?= $o['nama_obat']; ?>">
                                <?php else : ?>
                                    <div class="no-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="drug-name"><?= $o['nama_obat']; ?></div>
                            </td>
                            <td class="text-center">
                                <span class="drug-category"><?= $o['nama_kategori']; ?></span>
                            </td>
                            <td class="text-center">
                                <div class="drug-price">Rp <?= number_format($o['harga'], 0, ',', '.'); ?></div>
                            </td>
                            <td class="text-center">
                                <?php 
                                $stockClass = 'stock-high';
                                if ($o['stok'] <= 10) $stockClass = 'stock-low';
                                elseif ($o['stok'] <= 50) $stockClass = 'stock-medium';
                                ?>
                                <span class="drug-stock <?= $stockClass; ?>"><?= $o['stok']; ?></span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark"><?= $o['satuan']; ?></span>
                            </td>
                            <td>
                                <div class="drug-description" title="<?= $o['deskripsi']; ?>"><?= $o['deskripsi']; ?></div>
                            </td>
                            <td class="text-center">
                                <div class="action-buttons">
                                    <a href="/obat/edit/<?= $o['id_obat']; ?>" class="btn-action btn-edit">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                    <button type="button" class="btn-action btn-barcode" data-bs-toggle="modal" data-bs-target="#barcodeModal<?= $o['id_obat']; ?>">
                                        <i class="bi bi-upc-scan me-1"></i>Barcode
                                    </button>
                                    <a href="/obat/delete/<?= $o['id_obat']; ?>" 
                                        class="btn-action btn-delete" 
                                        data-nama="<?= $o['nama_obat']; ?>">
                                         <i class="bi bi-trash me-1"></i>Hapus
                                     </a>
                                 </div>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>

     <!-- Barcode Modals -->
     <?php foreach ($obat as $o) : ?>
         <div class="modal fade" id="barcodeModal<?= $o['id_obat']; ?>" tabindex="-1" aria-labelledby="barcodeModalLabel<?= $o['id_obat']; ?>" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="barcodeModalLabel<?= $o['id_obat']; ?>">
                             <i class="bi bi-upc-scan me-2"></i>Barcode - <?= $o['nama_obat']; ?>
                         </h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body text-center">
                         <?php if (file_exists(FCPATH . 'barcodes/' . $o['barcode'] . '.png')) : ?>
                             <img src="<?= base_url('barcodes/' . $o['barcode'] . '.png'); ?>" 
                                  alt="Barcode <?= $o['nama_obat']; ?>" 
                                  class="img-fluid mb-3" 
                                  style="max-width: 300px;">
                             <p class="text-muted">Kode: <?= $o['barcode']; ?></p>
                         <?php else : ?>
                             <div class="alert alert-warning">
                                 <i class="bi bi-exclamation-triangle me-2"></i>
                                 Barcode belum tersedia untuk obat ini.
                             </div>
                         <?php endif; ?>
                     </div>
                     <div class="modal-footer">
                         <?php if (file_exists(FCPATH . 'barcodes/' . $o['barcode'] . '.png')) : ?>
                             <a href="<?= base_url('barcodes/' . $o['barcode'] . '.png'); ?>" 
                                download="barcode-<?= $o['nama_obat']; ?>.png" 
                                class="btn btn-primary">
                                 <i class="bi bi-download me-1"></i>Download
                             </a>
                         <?php endif; ?>
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                     </div>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        const namaObat = this.getAttribute('data-nama');
        const href = this.getAttribute('href');

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: `Obat "${namaObat}" akan dihapus dari data.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });
});
</script>

</div>

<?= $this->endSection(); ?>
