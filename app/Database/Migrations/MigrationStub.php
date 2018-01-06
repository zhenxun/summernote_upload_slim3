<?php
$namespaceDefinition

use $useClassName;
use Illuminate\Database\Schema\Blueprint;

class $className extends $baseClassName
{

    public function up(){

    	$this->schema->create('', function (Blueprint $table){
    		
    		$table->increments('id')->unique();
    		
    	});

    }

    public function down(){

    	$this->dropTable('');

    }
}
