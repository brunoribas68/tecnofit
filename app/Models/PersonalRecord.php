<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonalRecord
 *
 * @property int $id
 * @property int $user_id
 * @property int $movement_id
 * @property float $value
 * @property Carbon $date
 *
 * @property User $user
 * @property Movement $movement
 *
 * @package App\Models
 */
class PersonalRecord extends Model
{
    use HasFactory;

    protected $table = 'personal_record';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'movement_id' => 'int',
		'value' => 'float',
		'date' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'movement_id',
		'value',
		'date'
	];

	public function user()
	{
		return $this->hasOne(User::class);
	}

	public function movement()
	{
		return $this->belongsTo(Movement::class);
	}
}
