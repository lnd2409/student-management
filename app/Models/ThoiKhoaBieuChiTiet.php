<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ThoiKhoaBieuChiTiet
 * 
 * @property Carbon $tkbct_ngay
 * @property int $tkbct_tiet
 * @property int|null $mh_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property MonHoc|null $mon_hoc
 *
 * @package App\Models
 */
class ThoiKhoaBieuChiTiet extends Model
{
	protected $table = 'thoi_khoa_bieu_chi_tiet';
	public $incrementing = false;

	protected $casts = [
		'tkbct_tiet' => 'int',
		'mh_id' => 'int'
	];

	protected $dates = [
		'tkbct_ngay'
	];

	protected $fillable = [
		'tkbct_ngay',
		'tkbct_tiet',
		'mh_id'
	];

	public function mon_hoc()
	{
		return $this->belongsTo(MonHoc::class, 'mh_id');
	}
}
