###屏趣云核心代码模块
http模块使用方法：
```
$response = \Pingqu\Http\HttpHelper::curl('10.8.8.99/v4_1/upload_complete','POST',$params,$header);
$body = $response->getBody();