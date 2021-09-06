<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'departments', 'email', 'phone', 'staff_id', 'address'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Scope a query to only include employees based on department name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDepartmentSearch($query, $search)
    {
        $query->where('departments', 'like', '%'.$search.'%');
    }

    /**
     * Scope a query to only include employees based on staff id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfStaffIdSearch($query, $search)
    {
        $query->where('staff_id', '=', $search);
    }

    /**
     * Scope a query to only include employees based on address.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAddressSearch($query, $search)
    {
        $query->where('address', 'like', '%'.$search.'%');
    }
}
