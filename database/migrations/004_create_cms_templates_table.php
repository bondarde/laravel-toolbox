<?php

use BondarDe\Lox\Models\CmsPage;
use BondarDe\Lox\Models\CmsTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cms_templates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string(CmsTemplate::FIELD_LABEL)->nullable(false)->unique();
            $table->text(CmsPage::FIELD_CONTENT)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_templates');
    }
};
