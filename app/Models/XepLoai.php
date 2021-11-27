<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class XepLoai
 * 
 * @property int $xl_id
 * @property string $xl_xeploai
 * @property int|null $sv_id
 * @property int|null $hk_id
 * @property int|null $nh_id
 * 
 * @property HocKy|null $hoc_ky
 * @property NamHoc|null $nam_hoc
 * @property SinhVien|null $sinh_vien
 *
 * @package App\Models
 */
class XepLoai extends Model
{
	protected $table = 'xep_loai';
	protected $primaryKey = 'xl_id';
	public $timestamps = false;

	protected $casts = [
		'sv_id' => 'int',
		'hk_id' => 'int',
		'nh_id' => 'int'
	];

	protected $fillable = [
		'xl_xeploai',
		'sv_id',
		'hk_id',
		'nh_id'
	];

	public function hoc_ky()
	{
		return $this->belongsTo(HocKy::class, 'hk_id');
	}

	public function nam_hoc()
	{
		return $this->belongsTo(NamHoc::class, 'nh_id');
	}

	public function sinh_vien()
	{
		return $this->belongsTo(SinhVien::class, 'sv_id');
	}
}
