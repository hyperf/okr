# OKR系统

这是一个多人协作的实战项目，旨在邀请初学 `Hyperf` 的开发者进行开发，多人 `Review` 的项目。

## 开发规则

- 如何加入

想要加入开发的同学，可以在 `Issue` 中沟通需求，由管理员指定开发者。
开发时，必须拉一个特定分支进行开发（不能使用 main 分支），开发完毕后提交 PR 到主仓，由大家共同 review 后，管理员合并代码。

- 数据库字段修改

使用 Migration 进行数据库字段迁移，小版本修改直接修改当前文件，开发者直接 `fresh` 进行重置。大版本更替，则创建新的 Migration 文件，保证大版本数据库字段一致性。

- 单元测试

每一个功能的增加和修改，必须配备对应的单元测试。

- 提交代码尽量配备博客

每次合并代码后，尽量编写与其对应的文章，发表到 Discussion 模块中

- 使用 RESTful API

[RESTful API](http://www.ruanyifeng.com/blog/2014/05/restful_api.html)

    - GET（SELECT）：从服务器取出资源（一项或多项）。
    - POST（CREATE）：在服务器新建一个资源。
    - PUT（UPDATE）：在服务器更新资源（客户端提供改变后的完整资源）。
    - PATCH（UPDATE）：在服务器更新资源（客户端提供改变的属性）。
    - DELETE（DELETE）：从服务器删除资源。

示例

    - GET /zoos：列出所有动物园
    - POST /zoos：新建一个动物园
    - GET /zoos/ID：获取某个指定动物园的信息
    - PUT /zoos/ID：更新某个指定动物园的信息（提供该动物园的全部信息）
    - PATCH /zoos/ID：更新某个指定动物园的信息（提供该动物园的部分信息）
    - DELETE /zoos/ID：删除某个动物园
    - GET /zoos/ID/animals：列出某个指定动物园的所有动物
    - DELETE /zoos/ID/animals/ID：删除某个指定动物园的指定动物

## 接口列表

### 接口结构

| 字段名  | 类型    | 默认值 | 备注     |
| ------- | ------- | ------ | -------- |
| code    | Integer | 0      | 0成功    |
| data    | Mixed   | null   | 数据集合 |
| message | String  | null   | 错误信息 |

### 用户模块

- 发送注册验证码

POST /user/send-code

入参

| 字段名 | 类型   | 默认值 | 备注 |
| ------ | ------ | ------ | ---- |
| name   | String | 无     | 邮箱 |

- 用户注册

POST /user/register

入参

| 字段名   | 类型    | 默认值 | 备注                    |
| -------- | ------- | ------ | ----------------------- |
| name     | String  | 无     | 邮箱                    |
| username | String  | 无     | 登录名，不填则默认邮箱  |
| nickname | String  | 无     | 昵称                    |
| password | String  | 无     | 密码，前端需要 MD5 处理 |
| gender   | Integer | 无     | 性别 1男 2女            |
