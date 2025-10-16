// database/migrations/2025_10_14_000000_create_layanan_pt_details_table.php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan_pt_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_pt_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->text('deskripsi'); // Description column
            $table->json('benefit'); // Column for storing list of benefits
            $table->timestamps(); // Creates `created_at` and `updated_at`
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan_pt_details');
    }
};