<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseBackup extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup-full';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $db   = env('DB_DATABASE');
        // $user = env('DB_USERNAME');
        // $pass = env('DB_PASSWORD');
        // $host = env('DB_HOST', '127.0.0.1');
        
        // // simpan file backup di storage/app
        // $backupPath = storage_path('app/' . $db . '_backup_' . date('Y-m-d_H-i-s') . '.sql');

        // // perintah mysqldump
        // $command = "mysqldump -h {$host} -u {$user} {$db} > \"{$backupPath}\"";

        // system($command, $output);

        // if ($output === 0) {
        //     $this->info("✅ Backup selesai: {$backupPath}");
        // } else {
        //     $this->error("❌ Backup gagal, cek konfigurasi database atau hak akses MySQL.");
        // }
    }
}
