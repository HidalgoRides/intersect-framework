<?php

use App\Models\SampleModel;
use Intersect\Database\Schema\Blueprint;
use Intersect\Database\Migrations\AbstractMigration;

class CreateSampleTable1584146254 extends AbstractMigration {

    /**
     * Run the migration
     */
    public function up()
    {
        $this->schema->createTableIfNotExists('sample', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('data', 100);
        });

        SampleModel::bulkCreate([
            ['data' => 'Intersect Framework']
        ]);
    }

    /**
     * Reverse the migration
     */
    public function down()
    {
        $this->schema->dropTableIfExists('sample');
    }

}