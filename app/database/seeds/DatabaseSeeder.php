<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ConfigsTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('IndustryTableSeeder');
		$this->call('ClientStatusTableSeeder');
		$this->call('ClientsTableSeeder');
		$this->call('UserStatusTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('DomainStatusTableSeeder');
		$this->call('DomainsTableSeeder');
		$this->call('InvoiceStatusTableSeeder');
	}
}

class ConfigsTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

        // Create permisisons
		$configs = [
			[	
	        	'variable' 		=> 	'default_email_name',
	            'value' 		=>	'Up and Above',
	            'description'	=>  'This is the default name that will appear in the recipients inbox list.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
	        [	
	        	'variable' 		=> 	'default_email_address',
	            'value' 		=>	'hello@upandabove.com.au',
	            'description'	=>  'This is the default &quot;from&quot; email address automatically assigned to all outgoing emails when sending from the CRM.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ]
	    ];

	    // Insert group date
		foreach($configs as $config){
			DB::table('configurations')->insert($config);
		}
	}
}

class PermissionsTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

        // Create permisisons
		$permissions = [
			[	
				'id' 			=> 	1,
	        	'permission' 	=> 	'Unverified User',
	            'description' 	=>	'An unverified user is one whose email is either unverified through a social provider (facebook, google, etc.) or whose email has not been provided. (For example, users who sign up with twitter are unverified because Twitter Oath facilities do not provide user emails.)',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	2,
	        	'permission' 	=> 	'Verified User',
	            'description' 	=>	'Verified users are those who have verified their email addresses by signing up to the site using their email, or those who have clciked a verification link after signing up thorugh a social network.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	3,
				'permission' 	=> 	'Junior Staff',
	            'description' 	=> 	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[
				'id' 			=> 	4,
				'permission' 	=> 	'Senior Staff',	            
	            'description' 	=> 	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
	        [	
	        	'id' 			=> 	5,
				'permission' 	=> 	'Administrator',
	            'description' 	=> 	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ]
		];

		// Insert group date
		foreach($permissions as $permission){
			DB::table('permissions')->insert($permission);
		}
    }
}

class IndustryTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

        // Create industries
		$industries = [
          	[ 'industry' => 'Accounting', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Administration and Office Support', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Advertising, Arts and Media', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Banking and Financial Services', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Call Centre and Customer Service', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'CEO and General Management', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Community Services and Development', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Construction', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Consulting and Strategy', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Design and Architecture', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Education and Training', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Engineering', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Farming, Animals and Conservation', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Government and Defence', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Healthcare and Medical', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Hospitality and Tourism', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Human Resources and Recruitment', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Information and Communication Technology', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Insurance and Superannuation', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Legal', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Manufacturing, Transport and Logistics', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Marketing and Communications', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Mining, Resources and Energy', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Real Estate and Property', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Retail and Consumer Products', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Sales', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Science and Technology', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Self Employment', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Sport and Recreation', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Trades and Services', 'created_at' => $now, 'updated_at' => $now ],
          	[ 'industry' => 'Other', 'created_at' => $now, 'updated_at' => $now ]
		];

		// Insert group date
		foreach($industries as $industry){
			DB::table('industry')->insert($industry);
		}
    }
}

class ClientStatusTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

        // Create status'
		$status = [
			[	
				'id' 			=> 	1,
	        	'status' 		=> 	'Active',
	            'description' 	=>	'Client has unrestricted access to their account.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	2,
	        	'status'	 	=> 	'Suspended',
	            'description' 	=>	'Client has been suspended for billing discrepencies or some other noted reason.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	3,
				'status'	 	=> 	'Deactivated',
	            'description' 	=> 	'A Client or Administrator have cancelled this account.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ]
		];

		// Insert user_status data
		foreach($status as $stat){
			DB::table('client_status')->insert($stat);
		}
    }
}

class ClientsTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/testData/clients_table.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('clients')->insert($array);
		}
    }
}

class UserStatusTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

        // Create status'
		$status = [
			[	
				'id' 			=> 	1,
	        	'status' 		=> 	'Active',
	            'description' 	=>	'User has unrestricted access to their account.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	2,
	        	'status'	 	=> 	'Suspended',
	            'description' 	=>	'Client or user has been suspended for billing discrepencies or some other noted reason.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	3,
				'status'	 	=> 	'Deactivated',
	            'description' 	=> 	'A Client or Administrator have cancelled this account.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ]
		];

		// Insert user_status data
		foreach($status as $stat){
			DB::table('user_status')->insert($stat);
		}
    }
}

class UsersTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

        $users = [	
			[
				'user_status'		=> 	1,
				'client_id' 		=> 	1,
				'permission_id' 	=> 	5,
	            'first_name'		=> 	'Nick',
	            'last_name'			=> 	'Law',
	            'business_title'	=>	'Founding Partner',
	            'email' 			=>	'nick@upandabove.com.au',
	            'password'			=> 	Hash::make('nl511988'),
				'primary_phone'	  	=>  '0423640190',
				'ip_address'		=> 	Request::getClientIp(),
	            'created_at'		=> 	$now,            
	            'updated_at'		=> 	$now
	        ]
	    ];

        DB::table('users')->insert($users);

        $jsonData 	= file_get_contents(app_path() . '/database/testData/users_table.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('users')->insert($array);
		}
    }

}

class DomainStatusTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/testData/domain_status_table.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('domain_status')->insert($array);
		}
    }
}

class DomainsTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/testData/domains_table.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('domains')->insert($array);
		}
    }
}

class InvoiceStatusTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

        // Create status'
		$status = [
			[	
				'id' 			=> 	1,
	        	'status' 		=> 	'Draft',
	            'description' 	=>	'User has unrestricted access to their account.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	2,
	        	'status'	 	=> 	'Suspended',
	            'description' 	=>	'Client or user has been suspended for billing discrepencies or some other noted reason.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	3,
				'status'	 	=> 	'Deactivated',
	            'description' 	=> 	'A Client or Administrator have cancelled this account.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ]
		];

		// Insert user_status data
		foreach($status as $stat){
			DB::table('invoice_status')->insert($stat);
		}
    }
}