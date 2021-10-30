<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ThoiKhoaBieu
 *
 * @property int $tkb_id
 * @property Carbon $tkb_ngaybatdau
 * @property Carbon $tkb_ngayketthuc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ThoiKhoaBieu extends Model
{
	protected $table = 'thoi_khoa_bieu';
	protected $primaryKey = 'tkb_id';

	protected $dates = [
		'tkb_ngaybatdau',
		'tkb_ngayketthuc'
	];

	protected $fillable = [
		'tkb_ngaybatdau',
		'tkb_ngayketthuc'
	];
}
