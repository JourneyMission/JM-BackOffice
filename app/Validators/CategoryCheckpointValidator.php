<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CategoryCheckpointValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Category_Checkpoint_name=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Category_Checkpoint_name=>required',
	],
   ];
}
