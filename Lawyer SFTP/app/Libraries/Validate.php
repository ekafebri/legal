<?php

namespace App\Libraries;

class Validate
{
	
	public static function required($request, $validate, $messages = [])
	{
		$errors = $message = [];
		foreach ($validate as $key => $value) {
			if (!$request->hasFile($value) && empty($request->input($value))) {
				if (array_key_exists($value, $messages)) {
					$message[$value] = $messages[$value];
				}
				$errors[$value] = $message[$value] ?? 'parameter '.$value.' tidak boleh kosong';
			} 
		}
		return static::render($errors);
	}

	public static function unique($request, $validate, $messages = [])
	{
		$errors = $message = [];
		foreach ($validate as $value) {
			$key = explode(':', $value);
			$field = $key[0];
			$schema = explode(',', $key[1]);
			$table = $schema[0];
			$column = $schema[1];
			$id = $schema[2] ?? null;
			$exist = \DB::table($table)->where($column, $request->input($field))->first();
			if ($exist && is_null($id)) {
				if (array_key_exists($field, $messages)) {
					$message[$field] = $messages[$field];
				}
				$errors[$field] = $message[$field] ?? 'Data sudah ada';
			}
		}
		return static::render($errors);
	}

	public static function render($errors = [])
	{
		if ($errors) {
			$errors = collect($errors)->prepend(true ,'error')->prepend(0, 'code')->prepend(implode(', ', $errors), 'message');
			return response()->json($errors, 200);
		}
	}
}
