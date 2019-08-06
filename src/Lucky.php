<?php

/**
 * @author jahem<1094080047@qq.com>
 */

namespace Lucky;

class Lucky {

    /**
     * 概率样本
     * @var type 
     */
    protected $prize_arr;

    /**
     * 概率总计
     * @var type 
     */
    protected $arr;

    /**
     * 初始样本和概率总计 （应存储在数据库）
     */
    public function __construct($prize_arr) {
        //外部传入初始样本
        foreach ($prize_arr as $key => $value) {
            $this->prize_arr[$value['id']] = $value;
        }
        foreach ($this->prize_arr as $k => $v) {
            //循环得出概率总计
            $this->arr[$k] = $v['chance'];
        }
    }

    /**
     * 开始概率事件
     * @return type
     */
    public function start() {
        //样本下标
        $prize_id = '';
        //概率数组的总概率精度
        $proSum = array_sum($this->arr);
        //概率数组循环
        foreach ($this->arr as $k => $v) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $v) {
                $prize_id = $k;
                break;
            } else {
                $proSum -= $v;
            }
        }
        //中奖项
        $res = $this->prize_arr[$prize_id];
        return $res;
    }

}
