<?php
/*
 * 百度地图业务封装
 */
//适用于前后台的扩展

class Map{
    /*
     * 跟进地址获取经纬度坐标
     * 建立app/extra/Map.php 用来保存地图参数公共配置
     */
    public static function getLngLat($address){

        if(!$address){
            return '';
        }else{
            $data = [
                'address'   =>  $address,
                'ak'    =>  config('map.ak'),
                'output'    =>  'json',
            ];

            //http://api.map.baidu.com/geocoder/v2/?address=北京市海淀区上地十街10号&output=json&ak=您的ak&callback=showLocation //GET请求
            $url = config('map.baidu_map_url') . config('map.geocoder') . '?' . http_build_query($data);

            /*
             * 发送url获取内容
             *  1.file_get_contents()
             *  2.curl
             */
            $result = doCurl($url);
            $res = json_decode($result, true);
            return $res;
        }
    }



    /*
     * 跟进经纬度或者地址来获取对应的地图场景
     */
    public static function panorama($center){

        if(!$center){
            return '';
        }else{
            $data = [
                'ak'    =>  config('map.ak'),
                'width'    =>  config('map.width'),
                'height'    =>  config('map.height'),
                'fov'    =>  180,
            ];

            $res = Map::getLngLat($center);
            $lng = $res['result']['location']['lng'];
            $lat = $res['result']['location']['lat'];

            //http://api.map.baidu.com/panorama/v2?ak=E4805d16520de693a3fe707cdc962045&width=512&height=256&location=116.313393,40.04778&fov=180
            //http://api.map.baidu.com/panorama/v2?ak=q0d7GGbljpt2lbSAbv0zVYS273GrX3f3&location=116.3084202915,40.057030333459&width=400&height=300&fov=180
            $url = config('map.baidu_map_url') . config('map.panorama') . '?' . 'ak=' . config('map.ak') . '&location=' . $lng . ',' . $lat . '&width=' . config('map.width') . '&height=' . config('map.height') . '&fov=' . $data['fov'];
            /*
             * 发送url获取内容
             *  1.file_get_contents()
             *  2.curl
             */
            $result = doCurl($url);
            return $result;
        }
    }
}














?>