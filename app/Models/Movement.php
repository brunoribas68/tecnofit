<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Movement
 *
 * @property int $id
 * @property string $name
 *
 * @property Collection|PersonalRecord[] $personal_records
 *
 * @package App\Models
 */
class Movement extends Model
{
    use HasFactory;

    protected $table = 'movement';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function personal_records()
	{
		return $this->hasMany(PersonalRecord::class);
	}
}
