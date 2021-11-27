<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

/**
 * Class SinhVien
 *
 * @property int $sv_id
 * @property string $sv_ma
 * @property string $sv_ten
 * @property string $sv_namsinh
 * @property string $sv_email
 * @property string $username
 * @property string $password
 * @property int|null $l_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Lop|null $lop
 * @property Collection|MonHoc[] $mon_hocs
 *
 * @package App\Models
 */
class SinhVien extends User
{
	protected $table = 'sinh_vien';
	protected $primaryKey = 'sv_id';

	protected $casts = [
		'l_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'sv_ma',
		'sv_ten',
		'sv_namsinh',
		'sv_email',
		'username',
		'password',
		'l_id'
	];

	public function lop()
	{
		return $this->belongsTo(Lop::class, 'l_id');
	}

	public function mon_hocs()
	{
		return $this->belongsToMany(MonHoc::class, 'mon_hoc_sinh_vien', 'sv_id', 'mh_id')
					->withPivot('id', 'mhsv_diem_1', 'mhsv_diem_2', 'mhsv_diem_phuc_khao_1', 'mhsv_diem_phuc_khao_2', 'mhsv_diemtong', 'mhsv_diemchu', 'pk_id')
					->withTimestamps();
	}
	/**
	 * Get all of the mon for the SinhVien
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function monhocsinhvien()
	{
		return $this->hasMany(MonHocSinhVien::class, 'sv_id' );
	}

	public function xep_loais()
	{
		return $this->hasMany(XepLoai::class, 'sv_id');
	}

	public function xep_loai_hien_tai($nh_id,$hk_id)
	{
		return XepLoai::where('sv_id',$this->attributes['sv_id'])
		->where('hk_id',$hk_id)
		->where('nh_id',$nh_id)
		->first('xl_xeploai');
	}
}
