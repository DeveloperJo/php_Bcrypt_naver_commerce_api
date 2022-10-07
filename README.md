# php_Bcrypt_naver_commerce_api
네이버 커머스 API에서 인증 토큰 발급을 위한 전자 서명 생성 방법 중, php에 대한 예제

## 사용법
```php
# $secret_key : 네이버 커머스센터 API에서 발급받은 애플리케이션 SECRET
# $client_id : 네이버 커머스센터 API에서 발급받은 애플리케이션 ID
# $timestamp : milliseconds까지 표현된 timestamp
#  - cf ) https://apicenter.commerce.naver.com/ko/basic/getstart/app

$bcrypt = new Bcrypt(4, $secret_key);
$input = $client_id . "_" . $timestamp;
$secret_sign = $bcrypt->hash($input);
```
