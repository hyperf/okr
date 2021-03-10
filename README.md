# 实战项目 - OKR系统

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
