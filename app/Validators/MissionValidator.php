<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class MissionValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Mission_Destination=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Mission_Destination=>required',
	],
   ];
}
