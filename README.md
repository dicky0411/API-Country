# API-Country
**API-Country** is a simple API that allows you to retrieve country information based on a country code. The API provides details such as the country name, locale, latitude, longitude, and emoji representation.

**API-Country** 是一个简单的 API，允许您根据国家代码检索国家信息。该 API 提供了国家名称、语言环境、纬度、经度和表情符号表示等详细信息。


**API Usage
Endpoint: /{code}
Method: GET
Parameters:
code (required): The country code to look up.

Input: /86

Response:
{
  "country": "China",
  "code": 86,
  "tw": "中國",
  "locale": "CN",
  "zh": "中国",
  "lat": 35.86166,
  "lng": 104.195397,
  "emoji": "🇨🇳"
}