<?php

Route::get('salam/{name}' , function($name){
	return 'Hello '.$name;
});