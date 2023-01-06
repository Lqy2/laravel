<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    protected $fillable = ['pid', 'name', 'sort','examine'];
    #获取栏目数据
    public function getTreeList()
    {
        # code...
        $data = $this->orderBy('sort', 'asc')->get()->toArray();
        return $this->getTreeListCheckLeaf($data);
    }
    public function getTreeListCheckLeaf($data, $name = 'isLeaf')
    {
        $data = $this->treeList($data);
        foreach ($data as $k => $v) {
            foreach ($data as $vv) {
                $data[$k][$name] = true;
                if ($v['id'] === $vv['pid']) {
                    $data[$k][$name] = false;
                    break;
                }
            }
        }
        return $data;
    }
    public function treeList($data, $pid = 0, $level = 0, &$tree = [])
    {
        foreach ($data as $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $tree[] = $v;
                $this->treeList($data, $v['id'], $level + 1, $tree);
            }
        }
        return $tree;
    }
    public function content()
    {
        return $this->hasMany('App\Content', 'cid', 'id')->orderBy('id', 'desc')->limit(1);
    }
}
