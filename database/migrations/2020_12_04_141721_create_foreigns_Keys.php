<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::table('centers', function(Blueprint $table) {
  			$table->foreign('university_id')->references('id')->on('universitys')
  						->onDelete('cascade')
  						->onUpdate('cascade');
  		});
  		Schema::table('areas', function(Blueprint $table) {
  			$table->foreign('center_id')->references('id')->on('centers')
  						->onDelete('cascade')
  						->onUpdate('cascade');
  		});
      Schema::table('projects', function(Blueprint $table) {
        $table->foreign('university_id')->references('id')->on('universitys')
  						->onDelete('cascade')
  						->onUpdate('cascade');
  		});
      Schema::table('usefuls', function(Blueprint $table) {
        $table->foreign('university_id')->references('id')->on('universitys')
  						->onDelete('cascade')
  						->onUpdate('cascade');
  		});
      Schema::table('problems', function(Blueprint $table) {
        $table->foreign('area_id')->references('id')->on('areas')
  						->onDelete('cascade')
  						->onUpdate('cascade');
  		});
        Schema::table('users', function(Blueprint $table) {
    			$table->foreign('role_id')->references('id')->on('roles')
    						->onDelete('cascade')
    						->onUpdate('cascade');
    		});

        Schema::table('logs', function(Blueprint $table) {
    			$table->foreign('user_id')->references('id')->on('users')
    						->onDelete('cascade')
    						->onUpdate('cascade');
    		});
        Schema::table('researchers', function(Blueprint $table) {
    			$table->foreign('university_id')->references('id')->on('universitys')
    						->onDelete('cascade')
    						->onUpdate('cascade');
    		});
        Schema::table('researchs', function(Blueprint $table) {
          $table->foreign('researcher_id')->references('id')->on('researchers')
    						->onDelete('cascade')
    						->onUpdate('cascade');
    		});
        Schema::table('papers', function(Blueprint $table) {
          $table->foreign('researcher_id')->references('id')->on('researchers')
    						->onDelete('cascade')
    						->onUpdate('cascade');
    		});
        Schema::table('docs', function(Blueprint $table) {
          $table->foreign('research_id')->references('id')->on('researchs')
    						->onDelete('cascade')
    						->onUpdate('cascade');
    		});
        Schema::table('expertlists', function(Blueprint $table) {
          $table->foreign('expert_id')->references('id')->on('experts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
    			$table->foreign('researcher_id')->references('id')->on('researchers')
    						->onDelete('cascade')
    						->onUpdate('cascade');
          $table->foreign('taggroup_id')->references('id')->on('taggroups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

      Schema::table('centers', function(Blueprint $table) {
  				$table->dropForeign('centers_university_id_foreign');
  		});
  		Schema::table('areas', function(Blueprint $table) {
  				$table->dropForeign('areas_center_id_foreign');
  		});
      Schema::table('projects', function(Blueprint $table) {
  				$table->dropForeign('projects_university_id_foreign');
  		});
      Schema::table('usefuls', function(Blueprint $table) {
  				$table->dropForeign('usefuls_university_id_foreign');
  		});
      Schema::table('problems', function(Blueprint $table) {
  				$table->dropForeign('problems_area_id_foreign');
  		});
      Schema::table('users', function(Blueprint $table) {
          $table->dropForeign('users_role_id_foreign');
      });
      Schema::table('logs', function(Blueprint $table) {
          $table->dropForeign('logs_user_id_foreign');
      });
      Schema::table('researchers', function(Blueprint $table) {
          $table->dropForeign('researchers_university_id_foreign');
      });
      Schema::table('researchs', function(Blueprint $table) {
        $table->dropForeign('researchs_researcher_id_foreign');
      });
      Schema::table('papers', function(Blueprint $table) {
        $table->dropForeign('papers_researcher_id_foreign');
      });
      Schema::table('docs', function(Blueprint $table) {
        $table->dropForeign('docs_research_id_foreign');
      });
      Schema::table('expertlists', function(Blueprint $table) {
          $table->dropForeign('expertlists_expert_id_foreign');
          $table->dropForeign('expertlists_researcher_id_foreign');
      });
      Schema::table('expertlists', function(Blueprint $table) {
        $table->dropForeign('expertlists_taggroup_id_foreign');
      });
    }
}
