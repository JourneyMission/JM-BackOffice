<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CategoryMissionValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Category_Mission_Name=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Category_Mission_Name=>required',
	],
   ];
}
