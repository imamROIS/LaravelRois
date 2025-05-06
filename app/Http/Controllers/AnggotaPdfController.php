<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class AnggotaPdfController extends Controller
{
    public function exportPdf(Anggota $anggota)
    {
        // Urutkan dokumen sesuai kebutuhan
        $documents = $this->prepareDocuments($anggota);
        
        // Pastikan urutan dokumen tetap
        $orderedDocuments = [
            'KTP' => null,
            'NIB' => null,
            'Tempat Usaha' => null,
            'Produk' => null,
            'Sertifikat Halal' => null
        ];

        foreach ($documents as $doc) {
            $orderedDocuments[$doc['label']] = $doc;
        }

        $pdf = Pdf::loadView('exports.anggota-pdf', [
            'anggota' => $anggota,
            'documents' => array_values(array_filter($orderedDocuments))
        ]);

        return $pdf->download("Data_{$anggota->Nama_Anggota}_{$anggota->Nama_Anggota}.pdf");
    }

    protected function prepareDocuments(Anggota $anggota)
    {
        $documentMap = [
            'Dokumen_KTP' => 'KTP',
            'Dokumen_NIB' => 'NIB',
            'Foto_Tempat_Usaha' => 'Tempat Usaha',
            'Foto_Produk' => 'Produk',
            'Dokumen_Sertifikat_Halal' => 'Sertifikat Halal'
        ];

        $documents = [];

        foreach ($documentMap as $field => $label) {
            if ($anggota->$field) {
                $filePath = $this->getDocumentPath($anggota->$field, $field);
                
                if ($filePath && file_exists($filePath)) {
                    $documents[] = [
                        'label' => $label,
                        'path' => $filePath,
                        'original_name' => $anggota->$field,
                        'type' => mime_content_type($filePath),
                        'is_image' => str_starts_with(mime_content_type($filePath), 'image'),
                        'is_pdf' => mime_content_type($filePath) === 'application/pdf'
                    ];
                }
            }
        }

        return $documents;
    }

    protected function getDocumentPath($filename, $fieldType)
    {
        $pathsToCheck = [
            storage_path("app/public/".strtolower($fieldType)."/{$filename}"),
            storage_path("app/public/{$filename}"),
            public_path("storage/".strtolower($fieldType)."/{$filename}"),
            public_path("storage/{$filename}")
        ];

        foreach ($pathsToCheck as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        return null;
    }
}