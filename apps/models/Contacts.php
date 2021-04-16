<?php
namespace apps\models\Contacts;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public static function createpost($data)
	{
		return Contacts::insert($data);
	}
}