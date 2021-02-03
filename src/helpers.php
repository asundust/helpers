<?php

if (!function_exists('da')) {
    /**
     * dd打印封装 不断点
     * 如果能转成toArray()则转成数组
     *
     * @param mixed $args
     */
    function da(...$args)
    {
        $varDumper = new Symfony\Component\VarDumper\VarDumper;
        foreach ($args as $x) {
            if (method_exists($x, 'toArray')) {
                $x = $x->toArray();
            }
            $varDumper->dump($x);
        }

    }
}

if (!function_exists('dad')) {
    /**
     * dd打印封装 并断点
     * 如果能转成toArray()则转成数组
     *
     * @param mixed $args
     */
    function dad(...$args)
    {
        da(...$args);
        die(1);
    }
}

if (!function_exists('ma')) {
    /**
     * 移动版dd打印封装 不断点
     * 如果能转成toArray()则转成数组
     *
     * @param mixed $args
     */
    function ma(...$args)
    {
        echo '<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">';
        da(...$args);
    }
}

if (!function_exists('mad')) {
    /**
     * 移动版dd打印封装 并断点
     * 如果能转成toArray()则转成数组
     *
     * @param mixed $args
     */
    function mad(...$args)
    {
        ma(...$args);
        die(1);
    }
}

if (!function_exists('money_show')) {
    /**
     * 金额格式化
     *
     * @param int|string $money  金额数
     * @param int        $number 小数位数
     *
     * @return string
     */
    function money_show($money, $number = 2)
    {
        if ($money == null || $money == '') {
            return '0.00';
        }
        return sprintf('%01.' . $number . 'f', $money);
    }
}

if (!function_exists('pluck_to_array')) {
    /**
     * [$id$ => $value$, ...] 转成 [['id' => $id$, 'value' => $value$], ...] 方法
     *
     * @param        $array
     * @param string $value
     * @param string $key
     *
     * @return array
     */
    function pluck_to_array($array, $value = 'value', $key = 'id')
    {
        if (method_exists($array, 'toArray')) {
            $array = $array->toArray();
        }
        $data = [];
        foreach ($array as $k => $v) {
            $data[] = [
                $key => $k,
                $value => $v,
            ];
        }
        return $data;
    }
}

if (!function_exists('ql')) {
    /**
     * @param $message
     */
    function ql($message)
    {
        $handle = fopen(storage_path('logs/log-' . now()->toDateString() . '.log'), 'a');
        fwrite($handle, $message . "\n");
        fclose($handle);
    }
}