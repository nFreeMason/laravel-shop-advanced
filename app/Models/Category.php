<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','is_directory','level','path'];

    protected $casts = [
        'is_directory' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        // 监听 Category 创建事件，用于初始化 path 和 level 的值
        static::creating(function(Category $category){
            // 如果创建的是一个根类目
            if ( is_null($category->parent_id) ) {
                // 层级高设为 0
                $category->parent_id = 0;
                // 将 path 设为 -
                $category->path = '-';
            }else{
                // 将层级设为父类类目的层级 + 1
                $category->level = $category->parent->level + 1;
                // 将 path 值设为父类目的 path 追加父类目 ID 以及最后跟上一个 - 分隔符
                $category->path = $category->parent->path .$category->parent->id.'-';
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function children()
    {
        return $this->hasMany(self::class,'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // 定一个访问器，获取所有祖先类目 ID 值
    public function getPathIdsAttribute()
    {
        return array_filter(explode('-',trim($this->path,'-')));
    }

    // 定一个访问器，获取所有祖先类目并按层级排序
    public function getAncestorsAttribute()
    {
        return Category::query()
            ->whereIn('id',$this->pathIds)
            ->orderBy('level')
            ->get();
    }

    // 定义一个访问器，获取以 - 为分隔的所有祖先类目名称以及当前类目的名称
    public function getFullNameAttribute()
    {
        return $this->ancestors
                    ->pluck('name')
                    ->push($this->name)
                    ->implode('-');
    }
}
