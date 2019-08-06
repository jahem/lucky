<?php

/**
 * @author jahem<1094080047@qq.com>
 */

namespace Lucky;

class Lucky {

    /**
     * 抽奖数据
     * @var array 
     */
    protected $data;

    /**
     * 总计
     * @var int 
     */
    protected $sum;

    public function __construct(array $data) {
        $this->data = $data; //抽奖数据
        $this->sum = 0; //总计
    }

    /**
     * 初始化
     */
    public function init() {
        //格式化数据
        foreach ($this->data as $value) {
            $this->data[$value['id']] = $value['id'];
            $this->sum = $this->sum + $value["chance"];
        }
    }

    /**
     * 开始
     */
    public function start() {
        //中奖项
        $id = '';
        //概率数组循环
        foreach ($this->arr as $k => $v) {
            $randNum = mt_rand(1, $this->sum);
            if ($randNum <= $v) {
                $id = $k;
                break;
            } else {
                $this->sum -= $v;
            }
        }
        //中奖项
        return $id;
    }

}
