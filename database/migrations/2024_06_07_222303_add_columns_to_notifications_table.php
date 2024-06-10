<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the columns don't exist before adding them
        if (!Schema::hasColumn('notifications', 'notifiable_type')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->string('notifiable_type');
            });
        }

        if (!Schema::hasColumn('notifications', 'notifiable_id')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->unsignedBigInteger('notifiable_id');
            });
        }

        if (!Schema::hasColumn('notifications', 'user_id')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->foreignId('user_id')->constrained('users');
            });
        }

        if (!Schema::hasColumn('notifications', 'read_at')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->timestamp('read_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the columns if they exist
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn(['notifiable_type', 'notifiable_id', 'user_id', 'read_at']);
        });
    }
}
