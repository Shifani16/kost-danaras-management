<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER gene_occup_ids BEFORE INSERT ON occupants FOR EACH ROW
            BEGIN
                INSERT INTO sequence_occups VALUES (NULL);
                SET NEW.occ_id = CONCAT("OCC-", LPAD(LAST_INSERT_ID(), 5, "0"));
            END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DROP TRIGGER "gene_occup_ids"');
    }
};
