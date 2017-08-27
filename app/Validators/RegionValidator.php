<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class RegionValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Region_Name=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Region_Name=>required',
	],
   ];
}
