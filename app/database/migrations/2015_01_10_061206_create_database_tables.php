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
		Schema::create('configurations', function($t)
		{
			$t->increments('id');
			$t->string('variable')->unique();
			$t->string('value');
			$t->text('description')->nullable();
			$t->timestamps();
			$t->softDeletes();
		});

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
			$t->text('description')->nullable();
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
			$t->string('phone');
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

		Schema::create('invoice_status', function($t)
		{
			$t->increments('id');
			$t->string('status')->unique();
			$t->string('description')->nullable();
			$t->timestamps();
			$t->softDeletes();
		});		

		Schema::create('invoices', function($t)
		{
			$t->increments('id');
			$t->integer('client_id')->unsigned();
			$t->foreign('client_id')->references('id')->on('clients');
			$t->integer('created_by')->unsigned();
			$t->foreign('created_by')->references('id')->on('users');
			$t->integer('status')->unsigned();
			$t->foreign('status')->references('id')->on('invoice_status');
			$t->date('paid_at')->nullable();
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('product_categories', function($t)
		{
			$t->increments('id');
			$t->string('category');
			$t->string('description');	
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('products', function($t)
		{
			$t->increments('id');
			$t->integer('invoice_id')->unsigned();
			$t->foreign('invoice_id')->references('id')->on('invoices');
			$t->integer('category_id')->unsigned();
			$t->foreign('category_id')->references('id')->on('product_categories');
			$t->string('product');
			$t->string('description');
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('line_items', function($t)
		{
			$t->increments('id');
			$t->integer('invoice_id')->unsigned();
			$t->foreign('invoice_id')->references('id')->on('invoices');
			$t->integer('product_id')->unsigned();
			$t->foreign('product_id')->references('id')->on('products');
			$t->integer('quantity');
			$t->timestamps();
			$t->softDeletes();
		});

		Schema::create('project_status', function($t)
		{
			$t->increments('id');
			$t->string('status')->unique();
			$t->string('description');
			$t->timestamps();
			$t->softDeletes();
		});		

		Schema::create('project_types', function($t)
		{
			$t->increments('id');
			$t->string('type')->unique();
			$t->string('description');
			$t->timestamps();
			$t->softDeletes();
		});	

		Schema::create('projects', function($t)
		{
			$t->increments('id');
			$t->integer('client_id')->unsigned();
			$t->foreign('client_id')->references('id')->on('clients');
			$t->integer('created_by')->unsigned();
			$t->foreign('created_by')->references('id')->on('users');
			$t->integer('project_type')->unsigned();
			$t->foreign('project_type')->references('id')->on('project_types');
			$t->integer('project_status')->unsigned();
			$t->foreign('project_status')->references('id')->on('project_status');
			$t->integer('assigned_to')->unsigned();
			$t->foreign('assigned_to')->references('id')->on('users');
			$t->string('title')->unique();
			$t->timestamps();
			$t->softDeletes();
		});		

		Schema::create('project_comments', function($t)
		{
			$t->increments('id');
			$t->integer('project_id')->unsigned();
			$t->foreign('project_id')->references('id')->on('projects');
			$t->integer('posted_by')->unsigned();
			$t->foreign('posted_by')->references('id')->on('users');
			$t->text('comment');
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

		Schema::table('project_comments', function($t) {
    		$t->dropForeign('project_comments_project_id_foreign');
    		$t->dropForeign('project_comments_posted_by_foreign');
		});

		Schema::drop('project_comments');

		Schema::table('projects', function($t) {
    		$t->dropForeign('projects_client_id_foreign');
    		$t->dropForeign('projects_created_by_foreign');
    		$t->dropForeign('projects_project_type_foreign');
    		$t->dropForeign('projects_project_status_foreign');
    		$t->dropForeign('projects_assigned_to_foreign');
		});

		Schema::drop('projects');

		Schema::drop('project_types');

		Schema::drop('project_status');

		Schema::table('line_items', function($t) {
    		$t->dropForeign('line_items_invoice_id_foreign');
    		$t->dropForeign('line_items_product_id_foreign');
		});
		Schema::drop('line_items');

		Schema::table('products', function($t) {
    		$t->dropForeign('products_invoice_id_foreign');
    		$t->dropForeign('products_category_id_foreign');
		});
		Schema::drop('products');

		Schema::drop('product_categories');

		Schema::table('invoices', function($t) {
			$t->dropForeign('invoices_created_by_foreign');
    		$t->dropForeign('invoices_client_id_foreign');
    		$t->dropForeign('invoices_status_foreign');
		});
		Schema::drop('invoices');

		Schema::drop('invoice_status');

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

		Schema::drop('configurations');
	}

}
