<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patient_id');

            $table->string('referralName')->nullable();
            $table->string('reason')->nullable();

            $table->string('previous_doctor')->nullable();
            $table->date('last_visit')->nullable();

            $table->string('physician');
            $table->string('pSpecialty')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_number')->nullable();

            $table->integer('good_health')->nullable();
            $table->integer('under_treatment')->nullable();
            $table->string('current_treatment')->nullable();
            $table->integer('serious_illness')->nullable();
            $table->string('serious_illness_cause')->nullable();
            $table->integer('hospitalized')->nullable();
            $table->string('hospitalized_cause')->nullable();
            $table->integer('prescription')->nullable();
            $table->string('prescription_name')->nullable();
            $table->integer('tobacco')->nullable();
            $table->integer('bisyo')->nullable();
            $table->integer('local_anesthetic')->nullable();
            $table->integer('sulfa_drugs')->nullable();
            $table->integer('aspirin')->nullable();
            $table->integer('penicilin')->nullable();
            $table->integer('latex')->nullable();
            $table->string('others')->nullable();

            $table->date('bleeding_time')->nullable();
            $table->integer('pregnant')->nullable();
            $table->integer('nursing')->nullable();
            $table->integer('birth_control')->nullable();


            $table->string('blood_type')->nullable();
            $table->string('blood_pressure')->nullable();



            $table->integer('high_blood')->nullable();
            $table->integer('low_blood')->nullable();
            $table->integer('epilepsy')->nullable();
            $table->integer('aids')->nullable();
            $table->integer('std')->nullable();
            $table->integer('ulcers')->nullable();
            $table->integer('fainting')->nullable();
            $table->integer('rapid_weight_loss')->nullable();
            $table->integer('radiation_therapy')->nullable();
            $table->integer('joint_replacement')->nullable();
            $table->integer('heart_surgery')->nullable();
            $table->integer('heart_attack')->nullable();
            $table->integer('thyroid_problem')->nullable();
            $table->integer('heart_disease')->nullable();
            $table->integer('heart_murmur')->nullable();
            $table->integer('hepa')->nullable();
            $table->integer('rheumatic_fever')->nullable();
            $table->integer('hay_fever')->nullable();
            $table->integer('respiratory_problems')->nullable();
            $table->integer('jaundice')->nullable();
            $table->integer('tb')->nullable();
            $table->integer('swollen_ankles')->nullable();
            $table->integer('kidney_disease')->nullable();
            $table->integer('diabetes')->nullable();
            $table->integer('chest_pain')->nullable();
            $table->integer('stroke')->nullable();
            $table->integer('cancer')->nullable();
            $table->integer('anemia')->nullable();
            $table->integer('angina')->nullable();
            $table->integer('asthma')->nullable();
            $table->integer('emphysema')->nullable();
            $table->integer('bleeding_problems')->nullable();
            $table->integer('blood_diseases')->nullable();
            $table->integer('head_injuries')->nullable();
            $table->integer('arthritis')->nullable();
            $table->string('other_disease')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicals');
    }
}
