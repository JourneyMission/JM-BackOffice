<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CheckpointPhotoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Checkpoint_ID=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Checkpoint_ID=>required',
	],
   ];
}
