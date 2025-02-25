<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BackupDatabase extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Realiza un volcado de la base de datos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPassword = env('DB_PASSWORD');
        $dbPort = env('DB_PORT', 5432);
        $backupPath = storage_path('app/backups/');

        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0777, true);
        }

        $fileName = 'backup_' . now()->format('Y-m-d_H-i-s') . '.sql';
        $filePath = $backupPath . $fileName;

        $command = "PGPASSWORD={$dbPassword} pg_dump -U {$dbUser} -h 127.0.0.1 -p {$dbPort} {$dbName} > {$filePath}";

        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            $this->info('Respaldo realizado correctamente: ' . $filePath);
        } else {
            $this->error('Hubo un error al realizar el respaldo');
        }
    }
}
