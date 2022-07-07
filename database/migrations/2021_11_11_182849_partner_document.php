<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class PartnerDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(Schema::hasTable('partner_documents')) return; 
        Schema::create('partner_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('farmer')->nullable()->default(NULL);
            $table->longText('aggregator')->nullable()->default(NULL);
            $table->longText('logistics')->nullable()->default(NULL);
            $table->longText('warehouse')->nullable()->default(NULL);
            $table->longText('vehicle')->nullable()->default(NULL);
            $table->timestamps();
        });

        $partner_documents = array(
            array('id' => '1','farmer' => '{"document":[{"exp":"No","doc":"Farmer voter\'s card or Farmer NIN or Farmer passport "},{"exp":"No","doc":"Guarantor voter\'s card or Guarantor NIN or Guarantor passport "},{"exp":"Yes","doc":"Farmer associate certificate"},{"exp":"Yes","doc":"Farmer certificate"},{"exp":"No","doc":"NAFDAC"}]}','aggregator' => '{"document":[{"exp":"No","doc":"Voter\'s card or driver\'s licence or national id card or nepa bill "},{"exp":"No","doc":"Guarantor\'s voter card or driver\'s licence or national id card or nepa bill "}]}','logistics' => '{"document":[{"exp":"Yes","doc":"Insurance Certificate"},{"exp":"Yes","doc":"NAFDAC certificate"},{"exp":"No","doc":"Driver\'s licence front view"},{"exp":"No","doc":"Driver\'s licence back view"},{"exp":"No","doc":"National Id card or Voter\'s Card or International passport "}]}','warehouse' => '{"document":[{"exp":"Yes","doc":"Insurance Certificate"},{"exp":"No","doc":"NAFDAC cetificate"},{"exp":"No","doc":"Memerandum of articulation"},{"exp":"Yes","doc":"Custome agent Licence"}]}','vehicle' => '{"document":[{"exp":"No","doc":"vehicle image"},{"exp":"Yes","doc":"vehicle license"},{"exp":"Yes","doc":"Road worthiness"},{"exp":"No","doc":"Proove of ownership"},{"exp":"Yes","doc":"Insurance certificate"}]}','created_at' => NULL,'updated_at' => NULL)
          );
          DB::table('partner_documents')->insert($partner_documents);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_documents');
    }
}
