<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function($t)
		{
			$t->increments('id');
			$t->string('permission');
			$t->string('description')->nullable();
			$t->timestamps();	
			$t->softDeletes();
		});

		Schema::create('industry', function($t)
		{
			$t->increments('id');
			$t->string('industry');
			$t->string('description')->nullable();
			$t->timestamps();			
			$t->softDeletes();
		});

		Schema::create('client_status', function($t)
		{
			$t->increments('id');
			$t->string('status');
			$t->string('description')->nullable();
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('clients', function($t)
		{
			$t->increments('id');
			$t->integer('client_status')->unsigned();
			$t->foreign('client_status')->references('id')->on('client_status');
			$t->string('business_name')->unique();
			$t->integer('industry_id')->unsigned();
			$t->foreign('industry_id')->references('id')->on('industry');
			$t->string('website')->nullable();
			$t->string('abn')->nullable();
			$t->string('email');
			$t->string('street_address')->nullable();
			$t->string('city')->nullable();
			$t->string('state')->nullable();
			$t->integer('post_code')->nullable();
			$t->string('country')->nullable();
			$t->timestamps();			
			$t->softDeletes();
		});
		
		Schema::create('user_status', function($t)
		{
			$t->increments('id');
			$t->string('status');
			$t->string('description')->nullable();
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('users', function($t)
		{
			$t->increments('id');
			$t->integer('user_status')->unsigned();
			$t->foreign('user_status')->references('id')->on('user_status');
			$t->integer('client_id')->unsigned();
			$t->foreign('client_id')->references('id')->on('clients');
			$t->integer('permission_id')->unsigned();
			$t->foreign('permission_id')->references('id')->on('permissions');
			$t->string('first_name');
			$t->string('last_name');
			$t->string('business_title')->nullable();
			$t->string('email')->unique();
			$t->string('password', 60);
			$t->string('primary_phone')->nullable();
			$t->string('secondary_phone')->nullable();
			$t->string('ip_address');
			$t->rememberToken();
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('domain_status', function($t)
		{
			$t->increments('id');
			$t->string('status');
			$t->string('decsription')->nullable();
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('domains', function($t)
		{
			$t->increments('id');
			$t->integer('owned_by')->unsigned();
			$t->foreign('owned_by')->references('id')->on('clients');
			$t->string('domain_name')->unique();
			$t->boolean('has_website');
			$t->date('purchase_date');
			$t->date('expiry_date');
			$t->integer('domain_status')->unsigned();
			$t->foreign('domain_status')->references('id')->on('domain_status');
			$t->timestamps();
			$t->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domains', function($t) {
    		$t->dropForeign('domains_owned_by_foreign');
    		$t->dropForeign('domains_domain_status_foreign');
		});
		Schema::drop('domains');
		Schema::drop('domain_status');		

		Schema::table('users', function($t) {
    		$t->dropForeign('users_user_status_foreign');
    		$t->dropForeign('users_client_id_foreign');
    		$t->dropForeign('users_permission_id_foreign');
		});
		Schema::drop('users');
		Schema::drop('user_status');
		
		Schema::table('clients', function($t) {
    		$t->dropForeign('clients_industry_id_foreign');
		});
		Schema::drop('clients');
		Schema::drop('client_status');

		Schema::drop('industry');

		Schema::drop('permissions');
	}

}
