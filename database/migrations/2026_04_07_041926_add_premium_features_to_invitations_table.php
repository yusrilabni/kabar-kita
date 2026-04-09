<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            // Profil Mempelai & Kutipan
            $table->text('quote')->nullable()->after('slug');
            $table->string('bride_parent_name')->nullable()->after('bride_nickname');
            $table->string('bride_ig')->nullable()->after('bride_parent_name');
            $table->string('groom_parent_name')->nullable()->after('groom_nickname');
            $table->string('groom_ig')->nullable()->after('groom_parent_name');

            // Acara Akad
            $table->date('akad_date')->nullable()->after('groom_ig');
            $table->string('akad_time')->nullable()->after('akad_date');
            $table->string('akad_location')->nullable()->after('akad_time');
            $table->text('akad_address')->nullable()->after('akad_location');
            $table->text('akad_maps_embed')->nullable()->after('akad_address');

            // Acara Resepsi (Opsional)
            $table->date('reception_date')->nullable()->after('akad_maps_embed');
            $table->string('reception_time')->nullable()->after('reception_date');
            $table->string('reception_location')->nullable()->after('reception_time');
            $table->text('reception_address')->nullable()->after('reception_location');
            $table->text('reception_maps_embed')->nullable()->after('reception_address');

            // Live Streaming
            $table->string('streaming_link')->nullable()->after('reception_maps_embed');

            // Data Kompleks (JSON)
            $table->json('gallery')->nullable()->after('love_story'); // Kumpulan Foto
            $table->json('digital_gifts')->nullable()->after('gallery'); // Rekening / E-Wallet / Alamat Fisik
        });
    }

    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn([
                'quote', 'bride_parent_name', 'bride_ig', 'groom_parent_name', 'groom_ig',
                'akad_date', 'akad_time', 'akad_location', 'akad_address', 'akad_maps_embed',
                'reception_date', 'reception_time', 'reception_location', 'reception_address', 'reception_maps_embed',
                'streaming_link', 'gallery', 'digital_gifts'
            ]);
        });
    }
};
