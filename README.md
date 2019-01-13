# baidu-map
use cURL to get baidu map's response and load on static page      

#问题

1：当调用静态地图去载入时候，由于要写明地址: &center=''，其中&center中的&cent部分会被转译

2：尝试使用panorama来取代静态地图，但是，&location要求是一个经纬度，并且它不识别一个地址。通过调用getLngLat(),得到百度返回的一个数组样式的字符串
json_decode()失败，explode()失败，除了一点点将经纬度截取出来，目前没想到别的方法

3：在拼接url时候，不要使用http_build_query(),因为出来的部分url内容不符合要求，尽量手动拼接

#备注：                                                                                                                                                        
1.extend目录用于第三方功能d代码管理：alipay，baidu map api等

2.app/extra目录用于对第三方公共配置管理，前后台通用，使用方式：config('file_name.array_key_name')

3.存放在app/extra目录下的配置文件代码前后台通用

4.存放在extend目录下的配置文件代码前后台通用


2019/1/12：
1.加入phpemail封装类
