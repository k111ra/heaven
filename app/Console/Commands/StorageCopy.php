<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class StorageCopy extends Command
{
    protected $signature = 'storage:copy';
    protected $description = 'Copie le contenu de storage/app/public vers public/storage';

    public function handle()
    {
        $from = storage_path('app/public');
        $to = public_path('storage');

        if (!File::exists($to)) {
            File::makeDirectory($to, 0755, true);
        }

        File::copyDirectory($from, $to);

        $this->info('Les fichiers ont été copiés avec succès.');
    }
}
